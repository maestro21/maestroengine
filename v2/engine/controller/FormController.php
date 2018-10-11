<?php

class FormController extends AbstractController {


    function getAction() {
      if(method() == POST) {
        return 'save';
      }
      return 'index';
    }

    function indexAction() { 
        $data = $this->model()->list(); 
        return $this->view('edittable', [
            'headers' => $this->listFields,
            'newItem' => $this->defvalues,
            'data' => $data,
            'endpoint' => API_URL . $this->cl
        ]);
    }

    function saveAction() {
        // foreach row [id] => row
        $this->model->save(post('data'));
    }

}
