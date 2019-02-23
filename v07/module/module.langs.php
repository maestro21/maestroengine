<?php


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
					'flag'	=> [ null, WIDGET_SELECT_IMG],
					'abbr' 	=> [ 'string', 'text', 'search' => TRUE ],
					'name' 	=> [ 'string', 'text', 'null' => TRUE  ],
					'pos'	=> [ 'int', 'text',  'null' => TRUE, 'table' => false  ],
					'active'=> [ 'bool', 'checkbox', 'null' => TRUE ],
				],
				'idx' => [
					'abbr' => [ 'abbr' ],
				]
			],
		];
	}

	public function extend() {
		$this->options['flag'] = $this->getLanguages();
		$this->options['deflangs'] = $this->getLanguages('getEuroLanguages');		

		setVar('sort_langs','pos_ASC');

		$this->addBtn('admin', [
			'url' => '#',
			'id' => 'showAddLangDialog',
			'icon' => 'fas fa-plus-circle',
			'text' => 'Add existing lang',
		]);
	
		$this->addPosBtns();
	}

	// todo: check api localy and on ws

	function getLanguages($option ='') { 
        $content = json_decode(file_get_contents(G('flag_api_url')  . 'api.php?do=' . $option), true); 
        foreach($content as $k => $row) {
			if(empty($option)) {
				$content[$k] = [
					'value' => $k,
					'text' => $row,
					'img' => G('flag_api_url')  . 'flags/' . $k
				];
			} else {
				$content[$k]['img'] = G('flag_api_url')  . 'flags/' . $row['img'];
			}
        }
        return $content;
    }

	public function adddeflang() { 
		$lang = $this->post['lang'];
		foreach($this->options['deflangs'] as $row) {
			if($row['value'] === $lang) {
				file_put_contents(BASE_PATH . 'front/img/langs/' . $lang . '.png', file_get_contents($row['img'])); 
				$this->saveDB([
					'abbr' => $lang,
					'name' => $row['text'],
					'active' => 1
				]);
				$this->cache();
				die();
			}
		}
	}

	    /** Save element **/
	public function save() {  //die();
		if(!superAdmin()) return;
		$this->parse = FALSE;
		if($this->post['form']['flag']) {
			$this->saveflag($this->post['form']['flag'], $this->post['form']['abbr']);
			unset($this->post['form']['flag']);
		}
		$ret = $this->saveDB($this->post['form']);
		$this->cache();
		return json_encode($ret);
	}

	public function saveflag($flag, $abbr) {  
		file_put_contents(BASE_PATH . 'front/img/langs/' . $abbr . '.png', file_get_contents(G('flag_api_url') . 'flags/' . $flag));
	}

	public function delflag() {
		unlink(BASE_PATH . 'front/img/langs/' . $this->path[2]. '.png');
		echo json_encode(array('redirect' => 'self', 'status' => 'success', 'timeout' => 1));
		die();
	}
	
		/** Caches data **/
	public function cache($data = null) {
		if(!$data)  $data = q($this->cl)->qlist()->order('pos ASC')->run();
		cache($this->className, $data);
	}

}
