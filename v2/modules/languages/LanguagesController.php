<?php

class LanguagesController extends FormController {


    function i18nAction() {
        $data = model('languages/i18n')->list(); 
        return $this->view('edittable', [
            'headers' => $this->listFields,
            'newItem' => $this->defvalues,
            'data' => $data,
            'endpoint' => API_URL . $this->cl . 'i18n/'
        ]);
    }

}
