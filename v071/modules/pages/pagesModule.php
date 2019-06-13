<?php class pagesModule extends masterclass {

	protected $labels = [
		'pages' => 'Pages',
	];

	protected $defdata = [
		[	
			'pid' => 0,
			'url' 	=> 'en',
			'fullurl' => 'en',
			'name' => 'Welcome page',
			'content' => 'Welcome to your newly created website! Powered by Maestro Engine v7',
			'status' => 2,
		],
		[	
			'pid' => 1,
			'url' 	=> 'about',
			'fullurl' => 'en/about',
			'name' => 'About us',
			'content' => 'About us page',
			'status' => 2,
		],
		[	
			'pid' => 1,
			'url' 	=> 'contacts',
			'fullurl' => 'en/contacts',
			'name' => 'Contact us',
			'content' => 'Contact us page',
			'status' => 2,
		],
	];


	function gettables() {
		return
		[
			'pages' => [
				'fields' => [
					'pid'		=>	[ 'int', 'select', 'default' => 0, 'null' => false],
					'bg'		=>  [ null, 'file'],
					'name' 		=> 	[ 'string', 'text', 'search' => TRUE ],
					'url'		=>	[ 'string',	'text' ],
					'fullurl'	=>  [ 'string', 'info' ],
					'type'		=>	[ 'int', 'select' ],
					'content' 	=> 	[ 'blob', WIDGET_MARKDOWN, 'search' => TRUE ],
					'status'	=>	[ 'int', 'select' ],
					'pos'		=> [ 'int', 'text',  'null' => TRUE  ],
				],
			],
		];
	}

	function extend() {
		$this->description = 'Core module for creating website pages';
		$this->defmethod = 'view';

		$this->options = [
			'pid' => $this->getPidOptions(),
			'status' => [
				0 => 'hidden',
				1 => 'visible',
				2 => 'in_menu',
			],
			'type' => [
				1 => 'page',
				2 => 'redirect'
			],
		];

	}

	function install() {
		if(!canInstall()) return;
		parent :: install();
		$this->cache();
	}

	function validate() {}


	function del($id = NULL) {
		if(!superAdmin()) return;
		$ret = parent::del($id = NULL);
		$this->cache();
		return $ret;
	}

	function save() {
		if(!superAdmin()) return;
		$this->parse = FALSE;
		$form = $this->post['form'];
		unset($form['bg']);
		$form['fullurl'] = $this->getFullUrl($form['pid'], $form['url']);
		$ret = parent :: saveDB($form);
		if($this->files['bg']) {
			uploadImage($this->files['bg'], 'bg/' . $this->id);
		}
		$this->cache();
		return json_encode($ret);
	}

	function getPageTree($options = null) {
		$q = q()	->select('id, pid, name, url, fullurl')
					->from($this->className)
					->order('pid ASC, pos ASC');
		if(@$options['id'] > 0) {
			$q->where('id != ' . $options['id']);
		}
		if(@$options['status']) {
			$q->where('status >= ' . $options['status']);
		}
		$tree = $q->run();
		$T = new tree($tree);
		return $T;
	}

	function cache($data = NULL) {

		$T = $this->getPageTree([ 'status' => 1]);
		cache($this->className, $T->treeList);

		$T = $this->getPageTree([ 'status' => 2]);
		cache('menu', $T->treeList);

		$T = $this->getPageTree(); 
		cache($this->className . 'options', $T->options);
	}

	function getPidOptions() {
		if($this->method == 'edit') {
			$T = $this->getPageTree([ 'id' => (int)$this->id ]);
			return $T->options;
		}
		return cache($this->className . 'options');
	}

	function getFullUrl($id, $url) {
		if($id > 0) {
			$T = $this->getPageTree();
			$ret = array_reverse($T->getFullUrl($id));
			$ret[] = $url;
			$ret = implode('/', $ret);
		} else {
			$ret = $url;
		}
		return $ret;
	}

	function admin() {
		if(!superAdmin()) return;
		$T = $this->getPageTree();
		$ret = $T->drawTree($this->className . '/adm');
		return $ret;
	}


	function menu($tpl = 'menu'){
		$this->parse = false;
		$tree = cache('menu');
		foreach($tree as $lang => $topmenu) {
			if($topmenu['url'] == getLang()) {
				// show home button
				/*$homeButton = [
					'fullurl' => $topmenu['url'],
					'name' => '',
					'class' => 'fa fa-home',
				];
				$leafs = array_merge([$homeButton], $topmenu['children']);*/
				$leafs = $topmenu['children'];
				$T = new tree();
				$ret = $T->drawTree($this->className . '/' . $tpl, $leafs);
				return $ret;
			}
		}
		return FALSE;
	}

	function getSubMenu($id = 0) {
		$submenu = q()	->select('id, pid, name, url, fullurl')
						->from($this->className)
						->where(qeq('pid',$id))
						->where('status > 0 ')
					->run();
		return $submenu;
	}

	function edit($id = null) {
		if(NULL == $id) $id = $this->id;
		$this->checkBG($id);
		return $this->add(q($this->cl)->qget($id)->run());
	}


	function view($path = NULL, $def = false) {
        if($path == null) {
            $path = $this->path;
        } else {
            $path = explode('/',$path);
        }
		$url  = implode('/', $path); if(empty($url)) $url = getLang();
		$page = q()	->select()
					->from($this->className)
					->where("fullurl='$url'")
					->run();

		/* if empty url then get top page of default language */
		if(empty($page)) {
            if(!$def) return null;
			$page = q()
				->select()
				->from($this->className)
				->where(qEq('fullurl',getLang()))
				->run();
		}
		// error page
		if(!isset($page[0])) {
			return $this->notFound();
		}

		$page = $page[0];
		$this->title = ($page['pid'] < 1 ? '<img src=' . BASE_URL . tpath() . 'img/logo.png>' : $page['name']);

		$this->checkBG($page['id']);
		if($page['type'] == 2) redirect(strip_tags($page['content']), 0, true);
		return $page;
	}

	function notFound() {
		return array(
			'name' => T('404 page not found'),
			'content' => '',
		);
	}

	function checkBg($id) {
			$bg = getImg('bg', $id);
			if($bg) {
					G('bgimg', $bg . '?v=' . rand());
			}
	}

}
