<?php
define('BASE_URL', 'http://localhost/maestroengine/theme/');
function obfile($path, $data = []) {
    if(!file_exists($path)) return false;

    foreach ($data as $k =>$v) {
        $$k=$v;
    }
    ob_start();
    include($path);
    $content = ob_get_contents();
    ob_end_clean();

    return $content;
}

function tpl($tpl, $data = []){
    $path = 'tpl/tpl.' . $tpl . '.php';  //var_dump(file_exists($path));
    if(file_exists($path)) {
        return obfile($path, $data);
    }
    return '';
}

function superAdmin() {
    return false;
}




function redirect($to = null, $time = 0, $relative = false){
    if(!empty($to)) {
        $to = str_replace('#','', $to); if($relative) $to = BASE_URL  . '/' . $to;
    } else {
        $to = BASE_URL;
    }
    echo "<html><body><script>setTimeout(\"location.href='$to'\", {$time}000);</script></body></html>";
    if($time==0) die();
}

function buildCss() {
    ob_start();
    include('css/style.css.php');
    $content = ob_get_contents();
    ob_end_clean();
    $content = compileCss($content);
    file_put_contents('style.css', $content);
}




function compileCss($css) {
    require_once('lessc.inc.php');
    $less = new lessc;
    return  $less->compile($css);
}

