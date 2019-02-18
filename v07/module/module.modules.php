<?php class modules extends masterclass {

	private $systemModules = array('i18n', 'modules', 'system',   'langs', 'pages'  );

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
		$this->install(); 
		$modules = $this->systemModules; //[ ]$this->getModules();
		foreach($modules as $module) {
			if($module != $this->className) M($module)->install();
		} 
		$this->admin();
		q()->update($this->cl)->set('status', 2)->run();
		cache($this->className, q($this)->qlist()->run());
	}


	function getModules() {
		if(!superAdmin()) return;
		$modules = scandir(CLASS_FOLDER);
		unset($modules[0]);
		unset($modules[1]);
		foreach($modules as $k => $module) {
			$name = str_replace('module.','',str_replace('.php','', $module));
			$modules[$k] = [
				'name' => $name,
				'description' => M($name)->description
			];
		}
		return $modules;
	}

	function admin() {
		//redirect(BASE_URL);
		if(!superAdmin()) return;
		if(hasRight($this->rights['admin'])) {
		
			$modules = $this->getModules(); 
			
			/** running through modules; if module is not in db - adding it**/
			foreach($modules as $k => $module) {
				$dbdata = q($this)->select()->where(qEq('name', $module['name']))->run(mysql::DBROW); 
				$module['status'] = $dbdata['status'] ?? 0;				
				$this->id = $dbdata['id'] ?? 0;
				$this->saveDB($module);
				$module['id'] = $this->id;
				$modules[$k] = $module;
			}
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
