<?php class system extends masterclass {

	// MOVING TO CACHE

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
                    'name'         => [ 'string', 'text', ],
                    'value'     => [ 'string', 'text', ],
                    'deletable'    => [ 'bool', 'checkbox', ]
                ],
                'idx' => [
                    'name' => [ 'name' ],
                ]
            ],
        ];
    }


	function saveAll($data){
		if(!is_array($data) && sizeof($data) === 0) return;

		$cache = cache($this->className) ?? [];
		foreach($data as $key => $value) {
			$cache[$key] =   ['name' => $key, 'value' => $value, 'permanent' => 1];
		} 
		$this->cache($cache);
	}

	function set($key, $value) {
		$cache = cache($this->className) ?? [];
		$cache[$key] = array('name' => $key, 'value' => $value, 'permanent' => 1);
		$this->cache($cache);
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

	/*
	function cache($data = NULL) {
		$cache 	= array();
		$data 	= q($this->cl)->qlist()->limit(0,10000)->run();;
		foreach($data as $row){
			$cache[$row['name']] = $row['value'];
		}
		cache($this->className, $cache);
	} */

	function login() {
		if(superAdmin()) redirect(BASE_URL);

		if($this->post) {
			$this->ajax = true;
			if(md5($_POST['pass']) == ADM_PASS){;
				session('user', true);
				echo json_encode(array('message' => T('success'), 'status' => 'ok', 'redirect' => BASE_URL));  die();
			}
			echo json_encode(array('message' => T('wrong pass'), 'status' => 'error', 'redirect' => BASE_URL));  die();
		}
	}

	
	function logout() {
		global $_SESSION;
		unset($_SESSION['user']);
		redirect(BASE_URL);
}


	function langs() {


	}

}
