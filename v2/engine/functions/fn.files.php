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
function c($name) {
  if(strpos($name, '/') === false) {
    $name = $name . '/' . $name;
  }
  $return = mf($name . CONTROLLER_EXT);
  if($return) {
    require_once($return);
    $return = new $name();
  }
  return $return;
}


function view($view, $data, $class = '') {
  $return = mf($class '/' . $view . VIEW_EXT);
  if(!$return) {
    $return = BASE_PATH . 'engine/view/'  . $view . VIEW_EXT;
    if(!file_exists($return)) {
      return null;
    }
  }
  $return = obfile($return, $data);
  return $return;  
}


function obfile($path, $data) {


}
