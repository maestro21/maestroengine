<?php

class LanguagesModel extends CacheModel {

    function extend() {
        $this->fields = [
           'abbr' => DATA_TEXT,
           'name' => DATA_TEXT,
           'active' => DATA_BOOL,
        ];   

        $this->key = null;
    }

    function save($data) {
        parent::save($data);

        $data = rows2keyvalues($data, 'abbr', 'name');

        cache('langs', $data);
    }

}