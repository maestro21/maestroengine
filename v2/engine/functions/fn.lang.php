<?php


function deflang() {
  return DEFLANG;
}

/**
 * gets language by abbr; if abbr not set - get current lang
 */
function lang($abbr = null){
  $langs = langs();
  return $langs[$abbr] ?? $langs[session('lang')] ?? $langs[DEFLANG];
}

function langs() {
  return ['en' => 'English'];
  return settings('langs');
}
