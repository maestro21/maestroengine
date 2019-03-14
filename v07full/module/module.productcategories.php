<?php class productcategories extends masterclass  {

  function gettables() {
		return
    [
        'productcategories' => [
        'fields' => [
          'name'  =>  ['string', 'slug'],
          //'logo' => [ null, 'file', 'path' => 'productcategories/logo'],
          'img' => [ null, 'file', 'path' => 'productcategories/img'],
        ],
      ]
    ];
	}


  function extend() {
      $this->description = 'Product categories';
  }


  function save() {
		$this->parse = FALSE;
		$form = $this->post['form'];
		$ret = parent :: saveDB($form);
		if($this->files['logo']) {
			uploadImage($this->files['logo'], 'productcategories/logo/' . $this->id, [100, 29], null, 1);
    }
    /*
    if($this->files['img']) {
      uploadImage($this->files['img'], 'productcategories/img/' . $this->id, [170, 270]);
    } */
		return json_encode($ret);
	}

  function tags() {
    return $this->items();
  }
}
