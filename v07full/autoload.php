<?php
error_reporting(1);
ini_set("memory_limit", "30M");
session_name("engine");
session_start();

require_once('settings.php');
require_once(BASE_PATH . "engine/functions/functions.php");
require_once(BASE_PATH . "engine/db/db.query.class.php");
require_once(BASE_PATH . "engine/db/db." . DB_TYPE . ".class.php");
require_once(BASE_PATH . "engine/db/db." . DB_TYPE . ".functions.php");
require_once(BASE_PATH . 'engine/class.masterclass.php');
require_once(BASE_PATH . 'engine/class.filemanager.php');
require_once(BASE_PATH . 'external/php_image_magician.php');
require_once(BASE_PATH . 'external/Parsedown.php');

//installationCheck();


getGlobals();
getLabels();

DBbackup();

$_SESSION['headerlinks'] = array();
