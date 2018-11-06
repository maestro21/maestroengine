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
    $return = new $name($path);
  }
  return $return;
}


function view($view, $data) {
  $view = explode('/', $view);
  if($view[1]) {
    $class = $view[0];
    $view = $view[1];
  } else {
    $view = $view[0];
  }
  
  $return = mf(strtolower($class) . '/view/' . $view . VIEW_EXT);
  if(!$return) {
    $return = FRONT_PATH . 'view/'  . $view . VIEW_EXT; 
    if(!file_exists($return)) { die();
      return null;
    }
  }

  return obfile($return, $data);
}

function obfile($path, $data = []) {
  if(!file_exists($path)) return false;

  foreach ($data as $k =>$v) {
    $$k=$v;
  }
  ob_start();
  include($path);
  $content = ob_get_contents();
  ob_end_clean();

  return $content;
}

/**
 * load all files in dir;
 */
function include_dir($dir) {
  $files = dir_list($dir);
  $content = '';
  foreach($files as $file) {
      $content .= obfile($dir . $file);
  }
  return $content;
}

function include_vues() {
  $dirs = dir_list(BASE_PATH . 'modules/');
  $content = '';
  foreach($dirs as $dir) {
    $path = BASE_PATH . 'modules/' . $dir . '/vue/';
    if(file_exists($path)) {
      $content .= include_dir($path);
    }
  }
  return $content;
}

function theme() {
  return (settings('theme') != '' ? settings('theme') : DEFTHEME);
}

function themepath() {
  return THEME_PATH . theme() . '/';
}

function themeurl() {
  return THEME_URL . theme() . '/';
}

function tpl($tpl, $data = []){
    $path = themepath() . 'tpl/' . $tpl . TPL_EXT;
    if(!file_exists($path)) {
      $path = FRONT_PATH . 'tpl/' . $tpl . TPL_EXT;
    }
    return obfile($path, $data);
}


function msg($text, $type = 'success', $code = 200) {
  return [
    'message' => T($text),
    'type' => $type,
    'code' => $code,
  ];
}