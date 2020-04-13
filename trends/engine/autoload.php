<?php
session_name("engine");
session_start();
define('BASE_PATH', dirname(dirname(__FILE__)) . '/');

function dir_list($directory) {
    $files = array_diff(scandir($directory), array('..', '.'));
    return $files;
}

$loadList = [
    'classes/Config',
    'classes/DBConfig',
    '../conf',
    'constants',
    'classes/Singleton',
    'db/autoload',
    'classes/ModelField',
    'classes/Model',
    'classes/Repository',
    'classes/Controller',
    'classes/ApiController',
    'classes/SystemController'
];

foreach($loadList as $item) {
    include BASE_PATH . 'engine/' . $item . '.php';
}


/* include functions */
$files = dir_list(ENGINE_PATH . 'functions');
foreach($files as $file) {
    $path  = ENGINE_PATH . 'functions/' . $file;
    if(is_file($path)) {
        require_once($path);
    }
}

$_MODELS = [];

/* include business logic  */
$dirs = dir_list(MODULE_PATH);
foreach($dirs as $dir) {
    if(is_dir(MODULE_PATH . $dir)) {
        $files = dir_list(MODULE_PATH . $dir);
        foreach($files as $file) {
            $path  = MODULE_PATH . $dir . '/' . $file;
            $class = unext($file);
            if(is_file($path)) {
                require_once($path);

                if(is_model($class)){
                    $_MODELS[] = $class;
                }
            }
        }
    }
}
