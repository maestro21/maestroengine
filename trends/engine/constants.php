<?php

define('ENV_DEV', 'dev');
define('ENV_PROD', 'prod');
define('ENV', ENV_DEV);

/** Path **/
define('ENGINE_PATH', BASE_PATH . 'engine/');
define('MODULE_PATH', BASE_PATH . 'modules/');
define('FRONT_PATH', BASE_PATH . 'front/');
define('THEME_PATH', BASE_PATH . 'themes/');
define('DATA_PATH', BASE_PATH . 'data/');
define('UPLOAD_PATH', DATA_PATH . 'up/');

/** URLs **/
define('BASE_URL', $_CONF->getBaseUrl());
define('EXT_URL', BASE_URL . 'ext/');
define('THEME_URL', BASE_URL . 'themes/');
define('DATA_URL', BASE_URL . 'data/');
define('UPLOAD_URL', DATA_URL . 'up/');
define('API_URL', BASE_URL . 'api/');
define('FRONT_URL', BASE_URL . 'front/');

/** Extensions **/
define('CONTROLLER_EXT', 'Controller.php');
define('TPL_EXT', '.tpl.php');
define('VIEW_EXT', '.view.php');
define('MODEL_EXT', 'Model.php');
define('CACHE_EXT', '.cache.php');

define('POST', 'POST');
define('GET', 'GET');
define('DELETE', 'DELETE');
define('PUT', 'PUT');

define('P_FULL', 'FULL');
define('P_TPL', 'TPL');
define('P_JSON', 'JSON');
define('P_RAW', 'RAW');


define('DEFLANG', $_CONF->getDefLang());
define('DEFCONTROLLER', $_CONF->getDefController());
define('DEFTHEME', $_CONF->getDefTheme());


/** data types */


define('DATA_INT', 'int');
define('DATA_FLOAT', 'float');
define('DATA_STRING','string');
define('DATA_TEXT', 'text');
define('DATA_BOOL', 'bool');
define('DATA_ARRAY', 'array');
define('DATA_TIME', 'time');
define('DATA_BLOB','blob');

define('WIDGET_TEXT', 'text');
define('WIDGET_TEXTAREA', 'textarea');
define('WIDGET_NUMBER', 'number');
define('WIDGET_CHECKBOX', 'checkbox');
define('WIDGET_SELECT', 'select');


/** database settings **/
define('HOST_SERVER', $_CONF->getDbc()->getDbHost());
define('HOST_NAME', $_CONF->getDbc()->getDbUsername());
define('HOST_PASS',  $_CONF->getDbc()->getDbPass());
define('HOST_DB',  $_CONF->getDbc()->getDbName());
define('DB_TYPE','mysql');
define('HOST_DRIVER', DB_TYPE . ':dbname=' . HOST_DB . ";host=" . HOST_SERVER);

/* database dump */
define('MYSQL_BIN_PATH', 'C:/xampp/mysql/bin/');
define('MYSQLDUMP_PATH', MYSQL_BIN_PATH . 'mysqldump.exe'); //mysqldump if it is already defined
define('MYSQL_PATH', MYSQL_BIN_PATH . 'mysql.exe'); //mysql if it is already defined
define('DUMP_ONE_FILE', TRUE); // defines if we want to dump only in one filename or want to dump each time in new file
define('DUMP_DIR', 'data/db/dump/');
define('DUMP_FILE', DUMP_DIR . 'last.sql');