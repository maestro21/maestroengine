<?php

class usergroups extends masterclass {

    function gettables() {
		return [
			'usergroups' => [
				'fields' => [
					'name' 		=> [ 'string', WIDGET_TEXT],
                    'rights'	=> [ 'array', WIDGET_CHECKBOXES, 'notInTable' => 1, 'options' => $this->getRightsOptions()],
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

    function getRightsOptions() {
        $rights = cache('rights');
        return array_combine($rights, $rights);
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

    function getGroupOptions() {
        $res = q($this->cl)->select('name, id')->run(DBALL);
        $ret = [];
        foreach($res as $row) {
            $ret[$row['id']] = $row['name'];
        }
        return $ret;
    }

}