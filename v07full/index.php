<?php 
define('ENV', 'dev');

if(ENV === 'dev') {
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	ini_set('log_errors', '1');
} else {
	error_reporting(0);
	ini_set('display_errors', '0');
	ini_set('log_errors', '0');
}

include('autoload.php');
try {
	/** uncomment if you want to make your website completely private **/
	/** if(!checkLogged()) redirect(BASE_URL . 'login.php'); /**/

	G('bgimg', BASE_URL . G('bgimg'));
	$_PATH = route();

	$class = dispatch();

	/** output **/
	if($class->ajax)
		echo $class->output;
	else
		echo tpl('main', array(
			'title' => $class->title,
			'content' 	=> $class->output,
			'class'		=> $class
			)
		);

} catch(Throwable $t) {
	if(ENV === 'dev') {
		echo $t->getMessage();
		debug_print_backtrace() ;
		die();
	} else {
		include('error.php');
	}
}
