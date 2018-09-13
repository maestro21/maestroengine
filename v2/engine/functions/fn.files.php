<?php

/**
 *  Returns path of module file
 */
function mf($file) {
  $filename = BASE_PATH . 'modules/' . $file;
  if(file_exists($filename)) {
    return $filename;
  }
  return false;
}

/**
 * Function to include controller
 */
function c($name = '') {
  require_once(ENGINE_PATH . '/controller.php');
  if(empty($name)) {
    $name = DEFCONTROLLER;
  }
  if(strpos($name, '/') === false) {
    $path = $name . '/' . $name;
  } else {
    $path = $name;
    $name = explode('/', $path)[1];
  }
  $return = mf($path . CONTROLLER_EXT);
  if($return) {
    require_once($return);
    $name .= 'Controller'; 
    $return = new $name();
  }
  return $return;
}


function view($view, $data, $class = '') {
  $return = mf($class . '/' . $view . VIEW_EXT);
  if(!$return) {
    $return = ENGINE_PATH . 'view/'  . $view . VIEW_EXT;
    if(!file_exists($return)) {
      return null;
    }
  }
  $return = obfile($return, $data);
  return $return;
}


function obfile($path, $data) {


}
