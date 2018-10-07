<?php

define('ENV_DEV', 'dev');
define('ENV_PROD', 'prod');

/** Path **/
define('ENGINE_PATH', BASE_PATH . 'engine/');
define('FRONT_PATH', BASE_PATH . 'front/');
define('THEME_PATH', BASE_PATH . 'themes/');
define('DATA_PATH', BASE_PATH . 'data/');
define('UPLOAD_PATH', DATA_PATH . 'up/');

/** URLs **/
define('BASE_URL', $_CONF['base_url']);
define('EXT_URL', BASE_URL . 'ext/');
define('THEME_URL', BASE_URL . 'themes/');
define('DATA_URL', BASE_URL . 'data/');
define('UPLOAD_URL', DATA_URL . 'up/');


/** Extensions **/
define('CONTROLLER_EXT', '.controller.php');
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


define('DATA_INT', 'int');
define('DATA_FLOT', 'float');
define('DATA_TEXT', 'text');
define('DATA_BOOL', 'bool');
define('DATA_ARRAY', 'array');




define('DEFLANG', $_CONF['deflang'] ?? 'en');
define('DEFCONTROLLER', $_CONF['defcontroller'] ?? 'pages');
define('DEFTHEME', $_CONF['deftheme'] ?? 'maestro');