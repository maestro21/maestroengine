<?php
class galleries extends masterclass  {


    function gettables() {
  		return
      [
          'galleries' => [
          'fields' => [
            'name'  =>  ['array', 'multistring'],
            'img' => [ null, 'file', 'path' => 'galleries'],
          ],
        ]
      ];
  	}

    function extend() {
        M('pages')->view(getLang() . '/gallery');
        $this->description = 'Galleries';
    }

    function save() {
      if(!superAdmin()) return;
  		$this->parse = FALSE;
  		$form = $this->post['form'];
  		$ret = parent :: saveDB($form);
  		if($this->files['img']) {
  			uploadImage($this->files['img'], 'galleries/' . $this->id, [333, 222]);
  		}
  		return json_encode($ret);
  	}

    function uploadImage() {
      if(!superAdmin()) return;
      $this->parse = FALSE;
      $form = $this->post['form'];
      if($this->files['img']) {
        uploadImage($this->files['img'], 'galleries/' . $this->id . '/' . uniqid());
      }
      return json_encode(['status' => 'ok' , 'message' => T('saved'), 'redirect'=> 'self']);
    }

    function view() {
        $data = parent:: view();
        $this->title = unserialize($data['name'])[getlang()];
        $data['images'] = fm()->dscan(BASEFMDIR . 'galleries/' . $this->id);
        return $data;
    }

    function del() {
      if(!superAdmin()) return;
      fm()->drm(BASEFMDIR . 'galleries/' . $this->id);
      unlink(BASEFMDIR .  'galleries/' . $this->id . '.jpeg');
      parent::del();
    }

    function delimg() {
      $path = BASEFMDIR . 'galleries/' . $this->path[2] . '/' . $this->path[3];
      unlink($path);
      echo json_encode(['status' => 'ok' , 'message' => T('deleted'), 'redirect'=> 'self']); die();
    }

}
