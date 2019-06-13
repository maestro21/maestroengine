<?php
require_once("db/db." . DB_TYPE . ".class.php");

/** Masterclass which contains core functionality and is extended by other classes.
It is abstract class and MUST be extendend when writing new modules. It is done on puprose so that developer won't mess up
which classes he has and which is not. Previously, Masterclass acted like default class and concrete module could be created without
creating class for it. At first sight it gives versatility, but actually it messed out making hard to keep in mind which modules exist
in project. Main reason of abstraction is implementation of function getTables() which declares database structure of a module.
Previously it was done in txt files. Now it is required to create a class even if it don't have any specific functionality different from
default one at all. Creating empty class with just SQL table assignment takes just few minutes and saves you much more time.
As of dynamic assignment of class based on URL, i.e. if you want that `politics`, `sport`, `games` would actually point to module `blog` with
specific ids, you can do it whether in module `pages` or in site mapping **/
abstract class masterclass{

	protected $defdata = [];
	protected $settings;
	protected $labels = [];


	/** default field for a field type in table **/
	const FIELDTYPE = 1;

	/** variable to store dynamically all class fields **/
  	public $params = array();

	/** setter for dynamic variables **/
	public function __set($name, $value) {
        $this->params[$name] = $value;
    }

	/** getter for dynamic variables **/
	public function &__get($name)
    {
        if (array_key_exists($name, $this->params)) {
            return $this->params[$name];
        }
		return NULL;
	}

	/** Module description **/
	public $description = '';

	/** overrides __construct **/
  	function __construct($className = ''){
  		global $_GET, $_POST, $_SESSION, $_PATH, $_FILES, $_REQUEST , $_DB;

		/** Global arrays **/
  		$this->params['get'] 		= & $_GET;
		$this->params['request'] 	= & $_REQUEST;
  		$this->params['post'] 		= & $_POST;
		$this->params['session'] 	= & $_SESSION;
		$this->params['path'] 		= & $_PATH;
		$this->params['files'] 		= & $_FILES;

		/** Class routing parameters **/
		$this->cl = $this->className = ($className != '' ? $className : get_class($this));
		$this->defmethod = 'items';
		$this->method 	= (method_exists($this, @$this->path[1]) ? $this->path[1] : $this->defmethod);
		$this->id 		= (isset($this->post['id']) ? $this->post['id'] : @$this->path[2]);
		$this->page 	= (int)@$this->path[2];
		$this->search 	= @$this->path[3];

		/** Class data parameters **/
		$this->perpage 	= 20000;
		$this->tables	= $this->gettables();
		$this->options	= array();
		$this->parse	= TRUE;
		$this->ajax		= (isset($this->get['ajax']));
		$this->data		= NULL;
		$this->fields 	= @$this->tables[$this->cl]['fields'];
		$this->rights 	= array(
			'admin' => 'admin',
			'add'	=> 'admin',
			'edit'	=> 'admin',
			'save'	=> 'admin',
			'del'	=> 'admin',
		);

		$settings = str_replace('Module', 'Settings', $this->cl);
		$this->settings = new $settings();

		/** Class template parameters **/
		$this->title 	= ($this->id != '' ? T($this->cl) . ' #' . $this->id : T($this->cl));
		$this->buttons = array(
			'admin' => array( [
				'text' => 'add',
				'icon' => 'fas fa-plus',
				'url' => 'add'
			] ),
			//'view'  => array( 'items' => 'list', 'item/'.$this->id => 'edit' ),
			'table' => [
				[
					'class' => 'icon',
					'url' => 'edit/{id}',
					'icon' => 'fas fa-edit'
				],
				[
					'class' => 'icon',
					'url' => 'del/{id}',
					'icon' => 'fas fa-trash'
				]
			]
		);

		/** Calls virtual method for class extension in child classes **/
		$this->extend();
  	}


	 function addbtn($branch, $button) {
		 $this->buttons[$branch][] = $button;
	 } 

	 


	function addPosBtns(){
		
		$prefix = BASE_URL . $this->cl . '/changepos/{id}/';

		$this->addBtn('table', [
			'url' => 'javascript:call(\'' . $prefix . 'up\')',
			'icon' => 'fas fa-arrow-up',
		]);

		$this->addBtn('table', [
			'url' => 'javascript:call(\'' . $prefix . 'down\')',
			'icon' => 'fas fa-arrow-down',
		]);
	}

	abstract function getTables();


	/**
		Returns information about fields of a table
		@param $table - name of a table
		@return NULL | array();
	**/
	public function getFields($table = NULL) {
		if(NULL == $table) $table = self::cl;
		if(isset($this->tables[$table])) {
			return $this->tables[$table]['fields'];
		}
		return NULL;
	}


	public function getDescription() {
		return $this->description;
	}

	/**
		Admin method for class data listing
		@return array() or FALSE;
	**/
	public function admin() { //die('111');
		$this->checkRights('admin');		
		return $this->items();
	}

	/**
		Default method for class data listing
		@return array() or FALSE;
	**/
  	public function items() {
		$this->checkRights('items');
		$page 			= @(int)$this->path[2];
		$oQuery 		= q($this->cl)->qlist('*', $page, $this->perpage);
		$oCountQuery 	= q($this->cl)->qcount();

		/* Applying search **/
		if($this->search != ''){
			foreach($this->fields as $k => $v){
				if($v['search']) {
					$oQuery->where(dbEq($k,$v));
					$oCountQuery->where(dbEq($k,$v));
				}
			}
		}
		$this->pageCount = ceil($oCountQuery->run() / $this->perpage);

		/** Applying sort filter **/
		$filter = explode("_", getVar('sort_' . $this->cl));
		if(isset($this->fields[$filter[0]]) && ($filter[1]=='ASC' || $filter[1] == 'DESC')) {
			$oQuery->order($filter[0] . ' ' . $filter[1]);
		}

		return $oQuery->run();
  	}


	/** Opens form for adding new element **/
	public function add($data = NULL) {
		$this->checkRights('add');
		$this->tpl = 'addedit';
		return array('data' => $data, 'fields' =>$this->fields, 'options'=> $this->options);
	}


	public function checkRights($rights) { 
		if(!isset($this->rights[$rights])) return true;
		if(!hasRights($this->rights[$rights])) {
			redirect(BASE_URL); 
		}
	}

	/** Retrieves data of a single element for edit **/
    public function edit($id = NULL) {
		$this->checkRights('edit');
		if(NULL == $id) $id = $this->id;
		return $this->add(q($this->cl)->qget($id)->run());

    }

	/** Retrieves data of a single element for view **/
    public function view($id = NULL) {
		$this->checkRights('view');
		if(NULL == $id) $id = $this->id;
		return q($this->cl)->qget($id)->run();
    }


    /** Save element **/
    public function save() {  //die();
		$this->checkRights('save');
		$this->parse = FALSE;
		$ret = $this->saveDB($this->post['form']);
		return json_encode($ret);
	}

	function saveDB($data) { //debug_print_backtrace();
		$this->checkRights('save');
		/* preprocess data */
		$f = $this->fields;
		foreach($this->fields as $k => $v) {
			if($v[0] == null) continue;
			$data[$k] = sqlFormat($v[0], @$data[$k]);
		}
		/* Determines query type;
		Update if element exists, insert if it`s a new element **/
		if($this->id > 0) {
			$oQuery = q($this->cl)->qedit($data, qEq('id',$this->id));
		} else {
			$oQuery = q($this->cl)->qadd($data);
		}
		/** Executing query, retrieving id, returning result **/
		$oQuery->run();
		if($this->id < 1) {
			$this->id = DBinsertId();
		}
		return array('redirect' => BASE_URL . $this->cl . '/edit/' . $this->id, 'id' => $this->id, 'status' => 'success', 'message' => T('saved'));
	}



    /** Delete element **/
    public function del($id = NULL) {
		$this->checkRights('del');
		if(NULL == $id) $id = $this->id;
		q($this->cl)->qdel($id)->run();
		$this->parse = FALSE;
		return json_encode(array('redirect' => 'self', 'status' => 'success', 'timeout' => 1));
    }


	/** Renders class output **/
	public function parse() {
		if(isset($this->data['data'])) $this->data = $this->data['data'];
		$this->params['data'] = $this->data;
		return tpl( $this->className . '/' . $this->tpl , $this->params);
    }


    /** Class installation method **/
    public function install() { 
		if(!canInstall()) return;

		// create db tables
		install($this->getTables());
		
		// add data
		$this->saveall($this->defdata);

		// add settings
		if($this->settings) { 
			M('system')->saveAll($this->settings);
		}
		
		// add text labels
		if($this->labels) {
			M('i18n')->addLabels($this->labels);
		}
	}

	public function saveAll($data) {
		if(!is_array($data) || sizeof($data) === 0) return;

		foreach($data as $el) {
			$this->id = 0;
			$this->saveDB($el);
		}
	}

	/** Class uninstallation method **/
    public function uninstall() {
		uninstall(array_reverse($this->tables));
		q()->update('modules')->where(qEq('name',$this->className));
		cacherm($this->className);
	}


	/** Virtual method for class extension **/
	public function extend(){}


	/** Caches data **/
	public function cache($data = null) {
		if(!$data)  $data = q($this->cl)->qlist()->run();
		cache($this->className, $data);
	}



	public function changepos($items = null) {
		$pos = $this->path[3];
		$id  = $this->path[2];

		$items = $items ?? q($this)->qlist()->order('pos ASC')->run();
		
		foreach($items as $k => $item) {
			if($item['id'] == $id) { 
				if($pos == 'up' && $k > 0) {
					$tmp = $items[$k-1];
					$items[$k-1] = $items[$k];
					$items[$k] = $tmp;
					break;
				}

				if($pos == 'down' && $k > 0) {
					$tmp = $items[$k+1];
					$items[$k+1] = $items[$k];
					$items[$k] = $tmp;
					break;
				}
			}
		}
		
		foreach($items as $k => $item) {
			q($this)->qedit(['pos' => $k], qEq('id', $item['id']))->run();
		}

		echo json_encode(array('redirect' => 'self', 'status' => 'success', 'timeout' => 1));
		die();	
	}

}

/**
	Function for calling any class and method. ANY method and class MUST be called via this function rather than using direct class&method calls
	@mixed 	module - module to call. REQUIRED
	@string	method - method to call. REQUIRED
	@array	params - module parameters like parse, id, className, data, etc.
	@mixed	data 	 - data to pass to method
**/
function call($module, $method, $params = null) {
	/** checking module **/
	if(!isset($module)) return FALSE;
	if(is_a($module, 'masterclass')) {
		$M = $module;
	} else {
		$M = M($module);
		if(!$M) return FALSE;
	}

	/** checking method **/

	if(!method_exists($M, $method)) {
		$method = $M->method = $M->defmethod;
	}

	/** TODO: IMPLEMENT RIGHTS CHECK **/

	$M->tpl = $method;

	/** FINALLY - CALLING METHOD **/

	$M->data = (isset($params) ? $M->$method($params) : $M->$method());

	/** parsing output if needed **/
	if($M->parse) {
		$M->data = $M->parse();
	}
	return $M->data;

}

/** TREE **/
require_once('class.tree.php');
