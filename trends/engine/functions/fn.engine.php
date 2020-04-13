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


function unext($path) {
    $path = explode('.', $path);
    return trim($path[0]);
}

function is_model($class) {
    return is_subclass_of(unext($class), 'Model');
}

function is_controller($class) {
    return is_subclass_of(unext($class), 'Controller');
}

function is_repository($class) {
    return is_subclass_of(unext($class), 'Repository');
}

function is_service($class) {
    return is_subclass_of(unext($class), 'Service');
}

function is_includable($class) {
    return is_model($class) || is_controller($class) || is_model($class) || is_service($class);
}

function models() {
    global $_MODELS;
    return $_MODELS;
}

function model($class) {
    if(is_model($class)) {
        return new $class();
    }
}

/**
 * @param string $name
 * @return Singleton|null
 */
function c($name = '') {
  $classname = ucfirst($name) . 'Controller';
  if(class_exists($classname)) {
      /** @var $classname Controller */
      return $classname::getInstance();
  }
  return null;
}

function repo($name) {
    $classname = ucfirst($name) . 'Repository';
    if(class_exists($classname)) {
        /** @var $classname Repository */
        return new $classname($name);
    }
    return new Repository($name);
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