<?php

abstract class AbstractController {

      /** Form fields */
      var $formFields = [];
      
      /** List headers */
      var $listHeaders = [];

      /**
       * Default values of a new item
       */
      var $defvalues = []; 
      


      var $model;
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
        $this->cl = str_replace('Controller', '', get_class($this));
        $this->model = model(strtolower($this->cl));

        if($this->model()) {
          $this->formFields = $this->model()->fields();
        }

        $this->setFormFields();
        $this->setListHeaders();
        $this->setDefvalues();
      }


      function setFormFields($data = null) {         
        if($data == null) {
          $result = [];
          foreach($this->model()->fields() as $key => $field) {
            $row = [              
                'key' => $key,
                'text' => T($key),
                'type' => getDefaultWidget($this->model()->getFieldType($field)), 
                'options' => $field['options'] ?? null,

            ]; 
            $result[$key] = $row; 
          }  
          $this->formFields = $result;
        }
      }

      function setListHeaders($data = null) {         
        if($data == null) {
          $result = [];
          if($this->model()) {
          foreach($this->model()->fields() as $key => $field) {
            $row = [
                'text' => $key,
                'value' => $key 
            ]; 
            $result[] = $row; 
          }  
        }
          $this->listHeaders = $result;
          $this->listHeaders[] = [
            'text' => T('actions'),
            'value' => 'actions'
          ];
        }
      }

      function setDefvalues() {
        $data = [];
        foreach($this->formFields as $key => $smth) {
          $data[$key] = null;
        }
        $this->defvalues = $data;
      }

      function handleRequest() {
          //echo "handling request in controller"; die();

          $this->parse = (api() ? P_JSON : P_FULL);

          $action = $this->getAction() . 'Action';
          if(!api()) {
            $this->prepareSiteTemplate();
          }

          if(method_exists($this, $action)) {
            $content = $this->$action();
          } else {
            $this->error(T('wrong url'));
          }
           
          if(!api()) {
            $content = $this->render($content);
          }    

          return $content;
      }

      function prepareSiteTemplate() {
        data('title', T($this->cl)); 
        data('wrap', true);
      }

      function render($content) { // echo $content; return;
        if(!$content){
          redirect();
        }
        return tpl('index', ['content' => $content]);
      }


      function view($view, $data = []) { 
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


    public function model() {
      return $this->model;
    }

    abstract function getAction();
}
