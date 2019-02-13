<?php

include('autoload.php');

if (!iscli()) die(); 

$action = $argv[1] ?? null;


switch($action) {
    case 'install': 
        reinstall();
        echo "Installation completed";
    break;
}