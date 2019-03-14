<?php


class contactform extends masterclass {


    function gettables() {
		return [
			'contactform' => [
				'fields' => [
					'name' 		=> [ 'string', 'text', 'required' => true ],
					'email' 	=> [ 'string', 'email', 'required' => true  ],
                    'text'	    => [ 'text', 'textarea', 'required' => true ],
                    'sent'      => [ 'date', 'hidden'],
				],
			],
		];
	}


    function extend() {
		$this->description = 'Module for contact form';
		$this->defmethod = 'add';
		$this->rights['items'] = 'admin';
	}



}