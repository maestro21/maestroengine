<?php

class ModulesModel extends CacheModel {

    function extend() {
        $this->fields = [
           'name' => DATA_TEXT,
           'description' => DATA_TEXT,
           'status' => DATA_INT,
        ];

        $this->key = null;
    }

    function save($data) {
        parent::save($data);     

        $_data = datafilter($data, [
            'active' => true,
        ]);

        $_data = rows2keyvalues($_data, null, 'name');

        cache('admmenu', $_data);
    }

}
