<?php
session_name("engine");
session_start();
define('ENV_DEV', 'dev');
define('ENV_PROD', 'prod');




define('BASE_PATH', dirname(dirname(__FILE__)) . '/');
define('ENGINE_PATH', BASE_PATH . 'engine/');

require_once(BASE_PATH . 'settings.php');

define('ENV', $_SETTINGS['env']);

define('BASE_URL', $_SETTINGS['base_url']);

define('DEFLANG', $_SETTINGS['deflang'] ?? 'en');
define('DEFCONTROLLER', $_SETTINGS['defcontroller'] ?? 'pages');

define('CONTROLLER_EXT', '.controller.php');

define('POST', 'POST');
define('GET', 'GET');
define('DELETE', 'DELETE');
define('PUT', 'PUT');

define('P_FULL', 'FULL');
define('P_TPL', 'TPL');
define('P_JSON', 'JSON');
define('P_RAW', 'RAW');

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
