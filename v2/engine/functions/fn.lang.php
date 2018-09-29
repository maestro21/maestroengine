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

/**
 * gets language by abbr; if abbr not set - get current lang
 */
function getlang($abbr = null){
  $langs = langs();
  return $langs[$abbr] ?? $langs[session('lang')] ?? $langs[DEFLANG];
}

function langs() {
  return [
    'en' => [
      'abbr' => 'en',
      'name' => 'English'
    ]
  ];
  return settings('langs');
}


function t($text) {
  return $text;
}
