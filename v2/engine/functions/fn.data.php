<?php



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



function rows2keyvalues($data) {
    $_data = [];
    foreach($data as $row) {
        $_data[$row['key']] = $row['value'];
    }
    return $_data;
  }

function keyvalues2rows($data) {
    $_data = [];
    foreach($data as $key => $value) {
        $_data[] = [
            'key' => $key,
            'value' => $value,
        ];
    }
    return $_data;
}