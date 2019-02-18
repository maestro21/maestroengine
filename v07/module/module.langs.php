<?php
const FLAGAPI = 'http://www.webstudio-maestro.ch/langselect/';

class langs extends masterclass {

	protected $labels = [
		'langs' => 'Languages',
	];

	protected $settings = [
		'flag_api_url' =>  'http://www.webstudio-maestro.ch/langselect/',
		'flag_default' => 'united-states-of-america.png',
		'deflang' => 'en',
	];

	protected $defdata = [
		[	
			'abbr' 	=> 'en',
			'name' => 'English',
			'pos' => 1,
			'active' => 1,
		]		
	];

	function install() {	
		parent::install();
		getGlobals();
		$this->cache();
		$this->saveflag(G('flag_default'), 'en');
		
	}


	function gettables() {
		return
		[
			'langs' => [
				'fields' => [
					'flag'	=> [ null, 'select'],
					'abbr' 	=> [ 'string', 'text', 'search' => TRUE ],
					'name' 	=> [ 'string', 'text', 'null' => TRUE  ],
					'pos'	=> [ 'int', 'text',  'null' => TRUE  ],
					'active'=> [ 'bool', 'checkbox', 'null' => TRUE ],
				],
				'idx' => [
					'abbr' => [ 'abbr' ],
				]
			],
		];
	}

	public function extend() {
		$this->options['flag'] = json_decode(file_get_contents(FLAGAPI . 'api.php'));
	}

	    /** Save element **/
	public function save() {  //die();
		if(!superAdmin()) return;
		$this->parse = FALSE;
		$this->saveflag($this->post['form']['flag'], $this->post['form']['abbr']);
		unset($this->post['form']['flag']);
		$ret = $this->saveDB($this->post['form']);
		$this->cache();
		return json_encode($ret);
	}

	public function saveflag($flag, $abbr) {  
		file_put_contents(BASE_PATH . 'front/img/langs/' . $abbr . '.png', file_get_contents(G('flag_api_url') . 'flags/' . $flag));
	}

	public function delflag() {
		unlink(BASE_PATH . 'front/img/langs/' . $this->path[2]. '.png');
		echo json_encode(array('redirect' => 'self', 'status' => 'ok', 'timeout' => 1));
		die();
	}
	
		/** Caches data **/
	public function cache($data = null) {
		if(!$data)  $data = q($this->cl)->qlist()->order('pos ASC')->run();
		cache($this->className, $data);
	}
}
