<?php
/**
 * Functions to handle base logic of engine - model, view, controller, templates, files, etc
 */


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
 * Function to include model
 */
function model($name = '') {
  if(strpos($name, '/') === false) {
    $path = $name . '/' . $name;
  } else {
    $path = $name;
    $name = explode('/', $path)[1];
  }
  $return = mf($path . MODEL_EXT);
  if($return) {
    require_once($return);
    $name .= 'Model';
    $return = new $name();
  }
  return $return;
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
  return obfile($return, $data);
}

function obfile($path, $data) {
  if(!file_exists($path)) return false;

  foreach ($data as $k =>$v) {
    $$k=$v;
  }
  ob_start();
  include($_url);
  $content = ob_get_contents();
  ob_end_clean();

  return $content;
}


function tpl($path, $data){
    $theme = (settings('theme') != '' ? settings('theme') : DEFTHEME);
    $path = THEME_FOLDER . $theme . '/tpl/' . $path . TPL_EXT;
    return obfile($path, $data);
}
