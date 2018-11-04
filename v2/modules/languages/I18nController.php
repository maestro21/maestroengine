<?php

class I18nController extends FormController {


    function extend() {
        $this->setFormFields([
            'value' => [
                'type' => WIDGET_MULTILANG
            ]
        ]);
    }

    function saveAction() {
        $this->model->save(post('data'));
        return json(msg('saved'));
    }

}
