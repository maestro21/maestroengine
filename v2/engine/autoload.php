<?php
session_name("engine");
session_start();
define('ENV_DEV', 'dev');
define('ENV_PROD', 'prod');



/** Path **/
define('BASE_PATH', dirname(dirname(__FILE__)) . '/');
define('ENGINE_PATH', BASE_PATH . 'engine/');
define('FRONT_PATH', BASE_PATH . 'front/');
define('THEME_PATH', BASE_PATH . 'themes/');
define('DATA_PATH', BASE_PATH . 'data/');
define('UPLOAD_PATH', DATA_PATH . 'up/');

require_once(BASE_PATH . 'conf.php');

define('ENV', $_CONF['env']);
/** URLs **/
define('BASE_URL', $_CONF['base_url']);
define('EXT_URL', BASE_URL . 'ext/');
define('THEME_URL', BASE_URL . 'themes/');
define('DATA_URL', BASE_URL . 'data/');
define('UPLOAD_URL', DATA_URL . 'up/');


define('DEFLANG', $_CONF['deflang'] ?? 'en');
define('DEFCONTROLLER', $_CONF['defcontroller'] ?? 'pages');
define('DEFTHEME', $_CONF['deftheme'] ?? 'maestro');
/** Extensions **/
define('CONTROLLER_EXT', '.controller.php');
define('TPL_EXT', '.tpl.php');
define('VIEW_EXT', '.view.php');

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
