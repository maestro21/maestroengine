<?php
class products extends masterclass  {

  function gettables() {
		return
		[
			'products' => [
				'fields' => [
					'category'	      =>	  [ 'int', 'select', 'default' => 0],
          'img'             =>    [ null, 'file', 'path' => 'products'],
					'name' 			      => 	  [ 'array', 'multistring', 'search' => TRUE ],
          'description'		  => 	  [ 'array', 'multitext', 'search' => TRUE ],
          'price'           =>    [ 'float', 'text', 'search' => TRUE]
				],
			]
		];
	}


  function category() {
    $this->title = q('productcategories')->select('name')->where(qEq('id', $this->id))->run(DBCELL);
    $items = q('products')->qlist()->where(qEq('category', $this->id))->run();
    return $items;
  }

  function extend() {
      M('pages')->view(getLang() . '/products');
      //G('bgimg', BASE_URL . G('product_bg'));
      $this->description = 'Products';
      $this->options['category'] = $this->getCategories();
  }

  function getCategories() {
    $categories = [];
    $tmp = q('productcategories')->qlist()->run();
    foreach($tmp as $row) {
      $categories[$row['id']] = $row['name'];
    }
    return $categories;
  }


  function admin() {
    $data = parent::admin();
    unset($this->fields['img']);
    unset($this->fields['description']);
    $this->fields['name'][1] = 'text';
    $this->fields['type'][1] = 'text';
    $return = [];
    foreach($data as $row) {
      unset($row['img']);
      unset($row['description']);
      $row['name'] = unserialize($row['name'])['en'];
      $row['type'] = unserialize($row['type'])['en'];
      $return[] = $row;
    }
    return $return;
  }

  function add($data = null) {
    if($data == null) {
      $data = [
        'category' => $this->id
      ];      
      $this->id = null;
    }
    return parent::add($data);
  }

  function view() {
    $data = parent::view();
    $this->title = unserialize($data['name'])[getlang()];
    return $data;
  }

  function save() {
    if(!superAdmin()) return;
		$this->parse = FALSE;
		$form = $this->post['form'];
		$ret = parent :: saveDB($form);
		if($this->files['img']) {
			uploadImage($this->files['img'], 'products/' . $this->id, [400,600], [
        'path' => 'products/thumb/' . $this->id,
        'x' => 100,
        'y' => 150
      ]);
      //createThumb('products/' . $this->id, ['x' => 150, 'y' => 630]);
		}
		return json_encode($ret);
	}

}
