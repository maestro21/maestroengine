<?php

class I18nModel extends CacheModel {

    function extend() {
        $this->fields = [
           'key' => DATA_TEXT,
           'value' => DATA_ARRAY,
        ];   

        $this->key = 'key';
        $this->rows2keyvalues = true;  
    }
}