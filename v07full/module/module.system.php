<?php class system extends masterclass {



	protected $settings = [				
		'deflang' 	=> 'en',
		'sitename'	=> 'Sitename',
		'theme'		=> 'maestro',
		'defmodule'	=> 'pages',
	];

	protected $labels = [
		'system' => 'Settings'
	];

	function gettables() {
		return [
			'system' => [
				'fields' => [
					'name' 		=> [ 'string', 'text', ],
					'value' 	=> [ 'string', 'text', ],
					'permanent'	=> [ 'bool', 'checkbox', ]
				],
				'idx' => [
					'name' => [ 'name' ],
				]
			],
		];
	}

	function logout() {
		global $_SESSION, $_RIGHTS;
		unset($_SESSION['user']);
		unset($_RIGHTS);
		echo json_encode(array('message' => T('logout success'), 'status' => 'success', 'redirect' => BASE_URL));  die();
	}




	function saveAll($data) {
		foreach($data as $k => $v) {
			$this->set($k, $v);
		}
	}

	function set($key, $value) {
		$this->id = q($this)->select('id')->where(qEq('name',$key))->run(MySQL::DBCELL);
		$this->saveDB(array('name' => $key, 'value' => $value));
		$this->cache();
	}

	function save() {
		if(!superAdmin()) return;
		$ret = parent:: save();
		$this->cache();
		return $ret;
	}

	function delete() {
		if(!superAdmin()) return;
		parent::delete();
		$this->cache();
	}

	function extend() {
		$this->description = 'Core module for setting up global settings';
		/*$this->buttons = array(
			'admin' => array( 'add' => 'fa-plus', 'langs' => 'languages', 'themes' => 'themes' ),
			'table' => array( 'item/{id}' => 'edit',  'view/{id}' => 'view', ),
		); */
	}

	function cache($data = NULL) {
		$cache 	= array();
		$data 	= q($this->cl)->qlist()->limit(0,10000)->run();;
		foreach($data as $row){
			$cache[$row['name']] = $row['value'];
		}
		cache($this->className, $cache);
	}

	function login() { 
		if(superAdmin()) redirect(BASE_URL);

		if($this->post) {
			$this->ajax = true;
			if(md5($_POST['pass']) == ADM_PASS){
				session('user', true);
				setRights('admin');
				echo json_encode(array('message' => T('success'), 'status' => 'success', 'redirect' => BASE_URL));  die();
			}
			echo json_encode(array('message' => T('wrong pass'), 'status' => 'error', 'redirect' => BASE_URL));  die();
		}
	}


	function langs() {


	}

}
