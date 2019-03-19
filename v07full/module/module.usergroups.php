<?php

class usergroups extends masterclass {

    function gettables() {
		return [
			'usergroups' => [
				'fields' => [
					'name' 		=> [ 'string', WIDGET_TEXT],
                    'rights'	=> [ 'text', WIDGET_CHECKBOXES, 'notInTable' => 1, 'options' => $this->rights()],
                    'users'     => [ null, WIDGET_SEARCHSELECT, 'notInTable' => 1]
				]
            ],
            'users_to_groups' => [
                'fields' => [
                    'user_id' => [DB_INT],
                    'group_id' => [DB_INT]
                ],
            ],
		];
	}


	function rights(){
		$this->title = T('rights');
		return implode(',', cache('rights'));
	}


	function saverights() {
		$rights = explode(',', str_replace(' ', '', $this->post['rights']));
		cache('rights',$rights);
		echo json_encode(['message' => T('saved'), 'status' => 'success']);  die();
	}	

}