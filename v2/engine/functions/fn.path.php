<?php
/**
 * Path functions
 * lang/module/function/id/
 */

 function route() {
     global $_SERVER, $_PATH;
     $vars = explode('?', $_SERVER['REQUEST_URI']);
     $path = trim(str_replace(HOST_FOLDER, '', $vars[0]), '/');
     $_PATH = explode('/', $path);
 }


$_PATH = [];
function path($key = null) {
    global $_PATH;
    if($key !== null) {
        if (isset($_PATH[$key])) return $_PATH[$key];
        return NULL;
    }
    return $_PATH;
}

$_lang = deflang();
function lang() {
    return path(0);
}

function module() {
    return path(1);
}

function action() {
    return path(2);
}

function id() {
  return path(3);
}
