<?php

abstract class AbstractController {


      var $model = '';
      var $cl = '';
      var $defaultAction = 'index';
      var $allowedActions = ['view', 'list', 'edit', 'add'];


      /**
       * Rendering mode:
       * P_FULL - will output template and site template
       * P_TPL  - will output template
       * P_JSON - will output json encoded data
       * P_RAW  - will output raw data
       */
      public $parse = P_FULL;


      function __construct() {
        $this->cl = self::class;
      }


      function handleRequest() {
          //echo "handling request in controller"; die();

          $this->parse = (api() ? P_JSON : P_FULL);

          $action = $this->getAction() . 'Action';

          if(method_exists($this, $action)) {
            $content = $this->$action();
          } else {
            $this->error(T('wrong url'));
          }

          $content = $this->render($content);

          return $content;
      }


      function render($content) { // echo $content; return;
        if(!$content){
          redirect();
        }
        return tpl('index', ['content' => $content]);
      }


      function view($tpl, $data) {
        return view($this->cl . '/' . $view, $data);
      }


    public function error($error = null) {

      if(api()) {
        return [
          'status' => 'error',
          'error' => $error ?? T('error')
        ];
      }

      if(dev()) {
        echo $error; die();
      } else {
        redirect(BASE_URL);
      }
    }

    abstract function getAction();
}
