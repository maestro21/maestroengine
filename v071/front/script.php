<?php 


include('../autoload.php');
getGlobals();
setVar('lang',$_GET['lang']);
getLabels();


ob_start();
$tp = '../' . tpath() . 'script.js.php';
if(file_exists($tp)){
	include($tp);
}


$js = dir_list('js');
foreach($js as $file) {
	include('js/' . $file); 
}



