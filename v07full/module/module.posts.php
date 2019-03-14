<?php class posts extends masterclass {



	


	function gettables() {
		return [
			'posts' => [
				'fields' => [								
					'title' 	=> [ DB_STRING, WIDGET_TEXT ],
					'url'		=> [ DB_STRING, WIDGET_TEXT],
					'img'		=> [ null, WIDGET_FILE, 'path' => 'posts/' . $this->id],
					'tags'		=> [ DB_TEXT, WIDGET_TEXT],
					'shorttext' => [ DB_TEXT, WIDGET_TEXTAREA],						
					'text' 		=> [ DB_BLOB, WIDGET_MARKDOWN],	
					'created' 	=> [ DB_DATE, WIDGET_INFO ],
					'updated'	=> [ DB_DATE, WIDGET_INFO ],
					'active'	=> [DB_BOOL, WIDGET_CHECKBOX],
				],
			],
		];
	}

	function extend() {
		$this->description = 'Main content module';
	}	

	function view($id = null) { 
		$res = parent:: view((int)$id);
		$this->title = $res['title'];
		$this->tpl = 'view';
		
		return $res;
	}

	
	/**
	 * Routing
	 * posts - default module so dont show
	 * {contenttype|tag}/{page} (?s=search) - search is not but COULD be implemented
	 * news/1 or #test/1
	 */


	function post($id = null) {
		return $this->view($id);
	}

	function items() {
		// create query
		$query =  q($this->cl)
					-> select('id, title, shorttext, url, active')
					-> order('updated DESC');

		// admin visibility			
		if(!superAdmin()) {
			$query->where(qEq('active',1));
		}

		$pathlen = 0;
		// tag
		if($this->path[0]== 'tag') { $pathlen++;
		//if(strpos('#', $this->path[$pathlen])) { echo 'ok';
			$tag = urldecode($this->path[$pathlen]);
			$query->where(qLike('tags', $tag));	
			$pathlen++;
			$this->title = '#' . $tag;
		} 

		// page
		$page = @(int)$this->path[$pathlen];
		if($page > 0) {
			$page--;
		}
		$perpage = $this->perpage;

		$result = $query
			-> limit($page * $perpage, $perpage )
			-> run();

		return $result;	
	}


	function upimgurl() {
		$imgUrl = $this->request['img'];
		$path = 'img/' . uniqid();
		uploadImageFromUrl($imgUrl,  $path);
		echo getImg($path); die();
	}

	function upimg() {
		$file  = $this->files['img'];
		if(!$file) {
			return;
		}
		
		$type = explode('/', $file['type'])[1];
		$path =  'img/' . uniqid() . '.' . $type;
		fm()->fupload('img', BASEFMDIR . $path);
		
		echo BASEFMURL .$path;
		die();
	}

	function save() {
		if(!superAdmin()) return;
  		$this->parse = FALSE;
		$form = $this->post['form'];
		$imgUrl = $form['img_url']; 
		unset($form['img_url']);
		if(empty($form['url'])) {
			$form['url'] = rus2url($form['title']);
		}
		$form['updated'] = null;
		$ret = parent :: saveDB($form); 

  		if($this->files['img']) {
  			uploadImage($this->files['img'], 'posts/' . $this->id, [1200, 600]);
		} elseif($imgUrl) {
			uploadImageFromUrl($imgUrl,  'posts/' . $this->id, [1200, 600]);
		}
  		return json_encode($ret);
	}

	function admin() {
		$this->tpl = 'items';
		return parent::admin();
	}

}
