<?php

function env() {
  return conf('env') ?? ENV_DEV;
}

function dev() {
    return (env() == ENV_DEV);
}

function prod() {
  return (env() == ENV_PROD);
}

/* website configuration like db, base url, env, etc. */
function conf($name = null) {
    global $_CONF;
    if($name) {
      return $_CONF[$name] ?? null;
    }
    return $_CONF;
}


/** data is just local request data **/
$_DATA = [];
function data($key = null, $value = null) {
  global $_DATA;
  if(!$key) return $_DATA;
  if($value) {
      $_DATA[$key] = $value;
  }
  return $_DATA[$key] ?? null;
}

/* settings are loaded from settings cache and are handled in settings module
  if conf are technical essentials of website, settings can be altered and have
  such data as default language or theme */
$_SETTINGS = [];
function settings($name = null) {
  global $_SETTINGS;
  if($name) {
    return $_SETTINGS[$name] ?? null;
  }
  return $_SETTINGS;
}


function inspect($data) {
  echo "<pre>";
  print_r($data);
  echo "</pre>";
}