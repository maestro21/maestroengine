<?php class modules extends masterclass {

	private $systemModules = array('modules', 'system',  'i18n', 'langs', 'pages');

	function gettables() {
		return
		[
			'modules' => [
				'fields' => [
					'name' 			=> [ 'string', 'text', 'search' => TRUE ],
					'description' 	=> [ 'text', 'textarea', 'null' => TRUE  ],
					'status' 		=> [ 'int',  NULL, 'null' => TRUE  ], // 0 - not installed, 1 - installed, 2 - active
				],
				'idx' => [
					'name' => [ 'name' ],
				]
			],
		];
	}

	function extend() {
		$this->buttons = [
			'admin' => [
				'reinstall'	=> 'reinstall'
			]
		];
		$this->description = 'Core module for managing other modules';
	}


	function reinstall() { 		
		if(!canInstall()) return;
		foreach($this->getModules() as $module) {
			M($module)->uninstall();
		}

		$this->install();
		$modules = $this->systemModules; //[ ]$this->getModules();
		foreach($modules as $module) {
			if($module != $this->className) M($module)->install();
		}
		$this->admin();
		q()->update($this->cl)->set('status', 2)->run(null, true);
		$this->cache();
	}


	function getModules() {
		if(!superAdmin()) return;
		$modules = scandir(CLASS_FOLDER);
		unset($modules[0]);
		unset($modules[1]);
		foreach($modules as $k => $module) {
			$modules[$k] = str_replace('module.','',str_replace('.php','', $module));
		}
		return $modules;
	}

	function admin() {
		//redirect(BASE_URL);
		if(!superAdmin()) return;
		if(hasRight($this->rights['admin'])) {
			/** getting items from db **/
			$items = q($this)
						->qlist()
						->un('limit')
						->order('status DESC, name ASC')
						->run();
			/** getting real modules from module directory **/
			$modules = array_flip($this->getModules());
			/** running through db and assigning values to modules **/
			foreach($items as $item){
				if(isset($modules[$item['name']])) {
					$modules[$item['name']] = $item;
				} else {
					q($this->cl)->qdel($item['id'])->run();
				}
			}
			/** running through modules; if module is not in db - adding it**/
			foreach($modules as $k => $module) {
				if(!is_array($module)) {
					$item = array(
						'name' 			=> $k,
						'description' 	=> $module['description'],
						'status' 		=> 0,
					);
					/*if(in_array($k, $this->systemModules)) {
						M($k)->install();
						$item['status'] = 2;
					} */
					q($this)->qadd($item)->run();
					$modules[$k] = $item;
				}
			}

			/** once more receiving modules **/
			$modules = 	q($this)
							->qlist()
							->un('limit')
							->order('status DESC, name ASC')
						->run();

			/** writing cache **/
			cache($this->className, $modules);

			return $modules;
		}
		return FALSE;
	}

	function cache($data = NULL) {
		return $this->admin();
	}

	function items() {
		//redirect(BASE_URL);
		return cache($this->className);
	}


	function changestatus() {
		if(!superAdmin()) return;
		$status = $this->get['status'];
		$MName = $this->id;
		q()
			-> update($this->cl)
			-> set('status', $status)
			-> where(qEq('name', $MName))
		-> run();

		switch($status) {
			case 0: M($MName)->uninstall(); break;
			case 1: M($MName)->install(); break;
		}

		$this->parse = false;

		echo json_encode(array('redirect' => 'self', 'status' => 'ok', 'timeout' => 1));
		die();
	}

}
