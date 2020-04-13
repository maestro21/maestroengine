<?php

function uid($lenght = 13) {
    // uniqid gives 13 chars, but you could adjust it to your needs.
    if (function_exists("random_bytes")) {
        $bytes = random_bytes(ceil($lenght / 2));
    } elseif (function_exists("openssl_random_pseudo_bytes")) {
        $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
    } else {
        throw new Exception("no cryptographically secure random function available");
    }
    return substr(bin2hex($bytes), 0, $lenght);
}

function json($data) {
    return json_encode($data);
}

function cache($name = '', $_data = null) {
    $path = DATA_PATH . $name . CACHE_EXT;

    if($_data != null) {
        file_put_contents($path, '<?php $data = ' . var_export($_data, TRUE) . ";" ) ;
    }
    
    if(file_exists($path )) { 
        include($path);
        return $data;
    }
    return null;
}



function rows2keyvalues($data, $key = 'key', $value = 'value') {
    $_data = [];
    foreach($data as $row) {
        if($key) {
            $_data[$row[$key]] = $row[$value];
        } else {
            $_data[] = $row[$value];
        }
    }
    return $_data;
  }

function keyvalues2rows($data) {
    if(!$data || !is_array($data)) {
        return [];
    }
    $_data = [];
    foreach($data as $key => $value) {
        $_data[] = [
            'key' => $key,
            'value' => $value,
        ];
    }
    return $_data;
}


function getDefaultWidget($type) {
    switch($type) {
        case DATA_BOOL:
            return WIDGET_CHECKBOX;
        break;
        
        case DATA_INT:
            return WIDGET_NUMBER;
        break;

        default:
            return WIDGET_STRING;
        break;
    }
}

function datafilter($data, $filter = []) {
    $return = $data;
    foreach($data as $index => $row) {
        foreach($filter as $fkey => $fvalue) {
            if(($row[$fkey] ?? null) != $fvalue) {
                unset($return[$index]);
            }    
        }
    }
    return $return;
}

function safestring($string) {
    $string = str_replace(' ', '_', $string);
    return $string;
}