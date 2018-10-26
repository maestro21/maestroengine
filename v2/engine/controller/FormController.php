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
            'headers' => $this->listHeaders,
            'newItem' => $this->defValues,
            'form'  => $this->formFields,
            'data' => $data,
            'endpoint' => API_URL . $this->endpoint()
        ]);
    }

    function saveAction() {
        $this->model->save(post('data'));
        return json(msg('saved'));
    }

}
