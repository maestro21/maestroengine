<?php
class controller {

    var $model = '';
    var $cl = '';
    var $defaultAction = '';

    function __construct() {
      $this->cl = self::class;
      //$this->model = model($this->cl);
      $this->defaultAction = 'index';

    }



    function handleRequest() {
        $return = false;
        echo "handling request in controller"; die();  
        $method = $this->method() . 'Action';
        if(method_exists($this, $method)) {
          $content = $this->$method();
        }

        if(path(0) != 'api') {
          $content = $this->render($content);
        }
        return $content;
    }


    function render($content) {
      if(!$content){
        redirect();
      }
      return tpl('index', ['content' => $content]);
    }


    function view($tpl, $data) {
      return view($this->cl . '/' . $view, $data);
    }


  public function error($error = null) {
    return [
      'status' => 'error',
      'error' => $error ?? T('error')
    ];
  }


    /** Front actions **/

    function listAction() {
       $data = $this->model->list();
       return $this->view('list', $data);
    }

    function viewAction() {
      $data = $this->model->get(id());
      return $this->view('view', $data);
    }

    function formAction() {
      $data = $this->model->get(id());
      return $this->view('form', $data);
    }


    /** Api actions **/

    function saveAction() {
        // if(!can('admin')) return false;
        $data = $this->model->save(post('form'), id());
        return json($data);
    }

    function delAction() {
      // if(!can('admin')) return false;
      $data = $this->model->del(id());
      return json($data);
    }

}
