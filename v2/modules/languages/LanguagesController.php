<?php

class LanguagesController extends FormController {


    function indexAction() { 
        $languages =  $this->listAction();

        $i18n = c('languages/i18n')->indexAction();
          
        return $this->view('index', [ 'tabs' => [
            'languages' => $languages,
            'i18n' => $i18n,
        ]]);
    }

    function listAction() {
        return $this->view('edittable', [
            'headers' => $this->listHeaders,
            'newItem' => $this->defValues,
            'form'  => $this->formFields,
            'data' => $this->model()->list(),
            'endpoint' => API_URL . $this->cl
        ]);
    }

}
