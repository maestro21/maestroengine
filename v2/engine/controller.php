<?php

class controller {

  $model = '';
  $cl = '';


  function __construct() {
    $this->cl = self::class;
    $this->model = model($this->cl);
  }



  function render($tpl, $data) {
    $content = tpl($this->cl . '/' . $tpl, ['data' => $data]);
    return tpl('main', ['content' => $content, 'class' => $this->cl]);
  }


  /** Actions **/

  function list() {
     $data = $this->model->list();
     return $this->render('list', $data);
  }

  function view() {
      $data = $this->model->get();
      return $this->render('view', $data);
  }

  function form() {
    if(id()) {
      $data = $this->model->get(id());
    }
    return $this->render('form', $data ?? []);
  }

  function save() {
      return json($this->model->save(post('form')));
  }

  function del() {
    return json($this->model->del());
  }

}


function c($name) {
  return new {$name . 'controller'}();
}
