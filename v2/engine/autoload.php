<?php
session_name("engine");
session_start();
define('BASE_PATH', dirname(dirname(__FILE__)) . '/');
require_once(BASE_PATH . 'conf.php');

require_once('constants.php');

define('ENV', ENV_DEV);

function dir_list($directory) {
    $files = array_diff(scandir($directory), array('..', '.'));
    return $files;
}


$dirs = [ 'model', 'functions', 'controller'];
foreach($dirs as $dir) {
    $files = dir_list(ENGINE_PATH . $dir);
    foreach($files as $file) {
        $path  = ENGINE_PATH . $dir . '/' . $file;
        if(file_exists($path)) require_once($path);
    }
}
