<?php

abstract class AbstractController {

      /** Form fields */
      var $formFields = [];
      
      /** List headers */
      var $listHeaders = [];

      /**
       * Default values of a new item
       */
      var $defValues = []; 
      


      var $model;
      var $cl = '';
      var $path = '';
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


      function __construct($path = null) {
        $this->cl = str_replace('Controller', '', get_class($this));
        $this->path = $path ?? $this->cl;
        $this->model = model(strtolower($path));

        $this->setFormFields();
        $this->setListHeaders();
        $this->setDefvalues();

        $this->extend();
      }

      function extend(){}

      function applyData($target, $data,  $replace = false) {
        if($data != null) {
          if($replace) {
            $target = $data;
          } else {
            $target = array_replace_recursive($target, $data);
          }
        }
        return $target;
      }

      function setFormFields($data = null, $replace = false) {      
        if(!$this->formFields) {
          $this->formFields = [];
          if($this->model()) {
            foreach($this->model()->fields() as $key => $field) {
                $row = [              
                  'key' => $key,
                  'text' => T($key),
                  'type' => getDefaultWidget($this->model()->getFieldType($field)), 
                  'options' => $field['options'] ?? null,
                ];
                $this->formFields[$key] = $row;   
            }
          }
        }

        $this->formFields = $this->applyData( $this->formFields, $data, $replace);
        return  $this->formFields;
      }

      function setListHeaders($data = null, $replace = false) {  
        if(!$this->listHeaders) {
          $this->listHeaders = [];
          if($this->model()) {
            foreach($this->model()->fields() as $key => $field) {
              $row = [
                  'text' => $key,
                  'value' => $key 
              ]; 
              $this->listHeaders[] = $row;  
            }
          }
        }
        $this->listHeaders = $this->applyData($this->listHeaders, $data, $replace);
        $this->listHeaders[] = [
          'text' => T('actions'),
          'value' => 'actions'
        ];
        return $this->listHeaders;
      }

      function setDefvalues($data = null, $replace = false) {
        if(!$this->defValues) {
          $this->defValues = [];
          foreach($this->formFields as $key => $smth) {
            $this->defValues[$key] = null;
          }
        }
        $this->defValues = $this->applyData( $this->defValues, $data, $replace);
        return $this->defValues;
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

    var $endpoint;
    public function endpoint($endpoint = null) {
      if($endpoint) {
        $this->endpoint = $endpoint;
      }

      if(!$this->endpoint) {
        $path = explode('/',$this->path);
        if($path[0] == $path[1]) {
          $this->endpoint = $path[0];
        } else { 
          $this->endpoint = $this->path;
        }
      }
       
      return $this->endpoint;
    }
}
