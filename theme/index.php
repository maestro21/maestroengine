<?php
include('functions.php');
include('gui.php');
buildCss();
echo tpl('main', [
    'title' => 'Hello World',
    'content' => 'basic content'
]);