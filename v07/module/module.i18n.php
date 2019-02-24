<?php 
class i18n extends masterclass {

	protected $labels = [
		'i18n' => 'Translations',
	];


	function gettables() {}


	function extend() {
		$this->description = 'Core module for internationalization';

		$this->options = [
			'type' => [
				1 => WIDGET_TEXT,
				2 => WIDGET_TEXTAREA,
				3 => WIDGET_KEYVALUES
			],
		];


		/* fields */
	}


	function items() {}
	function del() {}
	function add() {}
	function edit() {}

	/**
		Admin method for class data listing
		@return array() or FALSE;
	**/
	public function admin() {
		$this->checkRights('admin');
		$this->fields = [];
		$langs = getLangs();
		foreach($langs as $lang) {
			$this->fields[$lang['abbr']] = [ 'string', 'textarea'];
			$this->data[$lang['abbr']] = file_get_contents(BASE_PATH . 'data/i18n/' . $lang['abbr'] . '.txt');
		}
		return $this->data;
	}


	public function save() {
		$this->checkRights('save');
		$this->ajax =true;
		$data = array();
		$langs = getLangs();
		foreach($this->post['form']['fields'] as $lang => $data) {
			file_put_contents(BASE_PATH . 'data/i18n/' . $lang . '.txt', $data);
		}

		echo json_encode(array('message' => T('saved'), 'status' => 'success'));	die();
	}


}
