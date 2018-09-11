<?php
/**
 * Path functions
 * ({lang}?api)/module/function/id/
 */

 function route() {
      global $_PATH;
     $vars = explode('?', server('REQUEST_URI'));
     $folders = explode('://', BASE_URL);
     $folders = str_replace(server('HTTP_HOST'),'', $folders[1]);
     $path = trim(str_replace($folders, '', $vars[0]), '/');
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


function module() {
    return path(1);
}

function action() {
    return path(2);
}

function id() {
  return path(3);
}
