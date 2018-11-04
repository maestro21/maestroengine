<?php

class LanguagesModel extends CacheModel {

    function extend() {
        $this->fields = [
           'img' => DATA_TEXT,
           'abbr' => DATA_TEXT,
           'name' => DATA_TEXT,
           'active' => DATA_BOOL,
        ];

        $this->key = null;
    }

    function save($data) {
        parent::save($data);     
        foreach($data as $row) {
            $content = file_get_contents(S('lang_url') . 'flags/' . $row['img']);
            $uppath = UPLOAD_PATH . 'langs/' . $row['abbr'] . '.png'; 
            file_put_contents($uppath, $content);
        }


        $_data = datafilter($data, [
            'active' => true,
        ]);

        $_data = rows2keyvalues($_data, 'abbr', 'name');

        cache('langs', $_data);
    }

}
