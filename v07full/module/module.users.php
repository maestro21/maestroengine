<?php 
class users extends masterclass {



    function gettables() {
		return
		[
			'users' => [
				'fields' => [
                    'username'  =>  [ 'string', WIDGET_SLUG],
					'email' 	=> 	[ 'string', WIDGET_EMAIL, 'search' => TRUE ],
                    'pass'		=>	[ 'string',	WIDGET_PASS, 'notInTable' => true],

                    
                    'dob'       =>  [ 'date', WIDGET_DATE],
                    'lang'      =>  [ 'string', WIDGET_LANGS],


                    'name'      =>  [ 'string', WIDGET_TEXT],
                    'surname'   =>  [ 'string', WIDGET_TEXT],
                    'country'   =>  [ 'string', WIDGET_FLAG],
                    'city'      =>  [ 'string', WIDGET_TEXT],
                    'info'      =>  [ 'text', WIDGET_MARKDOWN, 'notInTable' => true]
				],
			],
		];
    }
    
    function extend() {
        $this->addBtn('table', [
			'class' => 'icon',
			'url' => 'usergroups/{id}',
			'icon' => 'fas fa-users',
		]);

    }

    function usergroups() {
        $this->fields = [
            'groups' => [
                'array',
                WIDGET_CHECKBOXES,
                'options' => M('usergroups')->getGroupOptions(),
                'value' =>  $this->getusergroupids($this->id)
            ]
        ];
    }

    function getusergroupids($id){
        return q('users_to_groups')
        ->select('group_id')
        ->where(qEq('user_id', $id))
        ->run(DBCOL);
    }


    function getusergrouprights($id) {
        $rights = []; 
        if($id < 1) return [];
        $usergroups = q('usergroups` `g')
            ->select('rights')
            ->join('users_to_groups','`utg`.`group_id` = `g`.`id`', 'utg')
            ->where(qEq('utg`.`user_id', $id))
            ->run(DBCOL);
         
        foreach($usergroups as $group) {
            $group = unserialize($group);
            $rights = array_merge($rights, $group);
        }  
        return array_unique($rights);  
    }

    function setuserrights($id) {
        $rights = $this->getusergrouprights($id);
        foreach($rights as $right) {
            setRights($right);
        }
    }

    function savegroups() {        
        if($this->id == 0 || !isset($this->post['form']) || !isset($this->post['form']['groups'])) {
            echo json_encode(['status' => 'error' , 'message' => T('error')]); die();
        }
        
        q('users_to_groups')->delete()->where(qEq('user_id',$this->id))->run();
        
        foreach($this->post['form']['groups'] as $group_id) {
            q('users_to_groups')->qsave([
                'user_id' => $this->id,
                'group_id' => $group_id
            ])->run();
        }
        echo json_encode(['status' => 'success' , 'message' => T('success')]); die();
    }

    function loginform(){ }

    function editprofile() {
        return $this->edit();
    }
    function getUser($id) {
        if($id < 1) return;
        $user = q($this->cl)->qget($id)->run(DBROW);
        $user['rights'] = $this->getusergrouprights($id);
        return $user;
    }

    function viewprofile() {
        return $this->view();
    }

    function view() {    
        $user = $this->getUser($this->id);
        $this->title = userName($user);
        $this->tpl = 'view';
        return $user;
    }


    function edit($id = null) {
        if(NULL == $id) $id = $this->id;
        $this->title = ($this->isMyProfile($id) ? T('edit my profile') : T('edit profile') . '#' . $id); 
		return $this->add($this->getUser($this->id));
    }

    function isMyProfile($id = 0) {
        return $this->canEditUser($id) === 2;
    }

    /**
     * Checks if it is your profile or it is another profile
     */
    function canEditUser($id = 0) {
        $me = user(); 
        if($me !== null && $me['id'] > 0 && ($id ==  0 || $id == $me['id'])) { 
            $this->id = $me['id']; 
            return 2;
        }
        $this->checkRights('editusers');
        return 1;
    }

    function delavatar($return = true) {
        $this->canEditUser($this->id);
        $avatars = getImgs('avatars/' . $this->id, '', false);
        foreach($avatars as $avatar) {
            unlink($avatar);
        }
        $avatars = getImgs('avatars/' . $this->id . '_sml','', false);
        foreach($avatars as $avatar) {
            unlink($avatar);
        }
        if($return) {
            echo json_encode(['status' => 'success' , 'message' => T('success')]); die();
        }
    }

    function uploadavatar() {
        $this->canEditUser($this->id);
        $this->parse = FALSE;
        if($this->files['img']) {
            $this->delavatar($return);
            $img = uploadImage($this->files['img'], 'avatars/' . $this->id, [300, 300], [
                'path' => 'avatars/' . $this->id . '_sml',
                'x' => 34,
                'y' => 34
            ]);
            echo json_encode(['status' => 'success' , 'message' => T('success'), 'img' => $img]); die();
        }
        echo json_encode(['status' => 'error' , 'message' => T('error')]); die();
    }

    function register() {
        $data = $this->post['form'];
        if(empty(@$data['username']) 
        || empty(@$data['email'])
        || empty(@$data['pass'])
        || empty(@$data['pass2'])
        || $data['pass'] !== $data['pass2']
        ) {
            echo json_encode(array('message' => T('error_wrong_pass'), 'status' => 'error', 'redirect' => BASE_URL));  die();
        }

        $user =  q()->select('id, username, email, name')
            ->from($this->className)
            ->where('(' . qEq('username', $username) . ' OR ' . qEq('email', $email) . ')')
            ->run(DBCELL);

        if($user) {
            echo json_encode(array('message' => T('error_user_exists'), 'status' => 'error', 'redirect' => BASE_URL));  die();
        }            

        $this->saveDB([
            'username' => $data['username'],
            'email' => $data['email'],
            'pass' => $data['pass'],
        ]);
        $this->login(1);
    }    

    function login($register = false) {
        $data = $this->post['form']; 
        $username = $data['username'] ?? $data['user'] ?? '';
        $email = $data['email'] ?? $data['user'] ?? '';
        $pass = $data['pass'];
        $user =  q()->select('id, username, email, name')
                    ->from($this->className)
                    ->where(qEq('pass', $username) . ' AND (' . qEq('username', $username) . ' OR ' . qEq('email', $email) . ')')
                    ->run(DBROW);
                    
        if(empty($user)) {          
            echo json_encode(array('message' => T('error_wrong_pass'), 'status' => 'error', 'redirect' => BASE_URL));  die();
        }
              
        $this->setuserrights($user['id']);
        session('user', $user);
        $redirecturl = BASE_URL;

        if($register) {
            $redirecturl .= 'users/viewprofile';
        }

        echo json_encode([
            'message' => $register ?  T('register'): T('login'), 
            'status' => 'success', 
            'redirect' => $redirecturl
        ]);  die();
    }

    function recover() {
        echo json_encode(array('message' => T('error_mail_dont_exist'), 'status' => 'error', 'redirect' => BASE_URL));  die();
    }

}

function getAvatar($id){
    $img = getImg('avatars/' . $id . '_sml');
    return $img ? '<img src="'.$img.'" class=avatar_sml align="absmiddle">' : '<i class="fas fa-user"></i>';
}

function userName($user) { 
    $name = $user['name'] . ' ' . $user['surname'];
    if(!empty(trim($name))) return $name;
    if(!empty(trim($user['username']))) return $user['username'];
    if(!empty(trim($user['email']))) return $user['email'];
    return 'user';
}

function userInfo($id) {
    $user = M('users')->getUser($id); 
    return "<a class='userinfo' href='" . BASE_URL . "users/viewprofile/{$id}'>" . getAvatar($id) . ' ' . userName($user) . '</a>';
}