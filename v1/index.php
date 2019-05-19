<?php
include('gui.php');
include('settings.php');
include('menu.php');

$q = trim(trim($_GET['q'] ?? ''), '/');

$lang = explode('/', $q)[0];
if(!in_array($lang, $langs)) $lang = $deflang;


$menu = $menu[$lang];
$page = str_replace($lang . '/', '', $q);
$title = $menu[$page] ?? $menu[''] ?? '';
if(!empty($title)) $title .= ' - ';
$title .= $sitename;

$page =  str_replace('/','_', $q);
if(!file_exists('pages/' . $page . '.php')) $page = $lang;


include 'tpl.main.php';
