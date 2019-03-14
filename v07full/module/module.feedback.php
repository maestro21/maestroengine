<?php


class feedback extends masterclass {


    function gettables() {
		return [
			'feedback' => [
				'fields' => [
					'name' 		=> [ 'string', 'text', 'required' => true ],
                    'text'	    => [ 'text', 'textarea', 'required' => true ],
                    'visible'   => [ 'bool', 'hidden'],
                    'sent'      => [ 'date', 'hidden'],
				],
			],
		];
	}


    function extend() {
		$this->description = 'Module for feedback form';
		$this->defmethod = 'items';

		$url = BASE_URL . $this->cl . '/showhide/{id}';
		$this->addBtn('table', [
			'class' => 'icon',
			'url' => 'javascript:call(\'' . $url . '\')',
			'icon' => 'fas fa-eye-slash',
		]);
		$this->rights['add'] = null;
	}



	public function showhide() {
		q($this->cl)->qSwitch('visible', $this->id)->run();
		echo json_encode(array('redirect' => 'self', 'status' => 'success', 'timeout' => 1)); die();
	}

}