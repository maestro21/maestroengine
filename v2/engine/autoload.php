<?php
session_name("engine");
session_start();

define('BASE_PATH', dirname(dirname(__FILE__)) . '/');
define('BASE_URL', $settings['base_url']);

define('CONTROLLER_FRONT_EXT', '.controller.front.php');
