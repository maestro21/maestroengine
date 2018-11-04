<?php


function deflang() {
  return DEFLANG;
}

/**
 * gets current language abbreviation
 */
function lang() {
  return getlang()['abbr'] ?? deflang();
}

function languages($abbr = true) {
  $_langs = cache('languages'); 
  if(!$abbr) { return $_langs; }
  $langs = [];
  foreach($_langs as $lang) {
    if($lang['active'] === true) {
      $langs[$lang['abbr']] = $lang;
    }
  } 
  return $langs;
}

function langselect($abbr = false) {
  $_langs = languages($abbr);
  $langs = [];
  foreach($_langs as $k => $row) {
    $langs[$k] = [
      'text' => '',
      'img' => UPLOAD_URL . 'langs/' .  $row['abbr'] . '.png',
      'value' => $row['abbr']
    ];
  }
  return $langs;
}

/**
 * gets language by abbr; if abbr not set - get current lang
 */
function getlang($abbr = null){
  $langs = languages();
  return $langs[$abbr] ?? $langs[session('lang')] ?? $langs[DEFLANG];
}

function langs() {
  return cache('langs');
}


function t($text) {
  return $text;
}


