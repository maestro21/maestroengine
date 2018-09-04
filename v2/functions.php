<?php

$_PATH = [];
function route() {
    global $_SERVER, $_PATH;
    $vars = explode('?', $_SERVER['REQUEST_URI']);
    $path = trim(str_replace(HOST_FOLDER, '', $vars[0]), '/');
    $_PATH = explode('/', $path);
}

function path() {}
