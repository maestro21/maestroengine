<?php

class SettingsModel extends CacheModel {

    function extend() {
        $this->fields = [
           'key' => DATA_TEXT,
           'value' => DATA_TEXT
        ];   
    }

}