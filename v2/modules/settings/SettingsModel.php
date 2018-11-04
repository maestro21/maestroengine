<?php

class SettingsModel extends CacheModel {

    function extend() {
        $this->rows2keyvalues = true;    

        $this->fields = [
           'key' => DATA_TEXT,
           'value' => DATA_TEXT
        ];   

        $this->key = 'key';
        $this->encode = true;
    }

}