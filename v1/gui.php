<?php

/**
 *
 */
function attr($array, $key, $tpl = null, $alt = ''){
    if(empty($tpl)) { $tpl = ' ' . $key . '="{key}"'; }
    return !empty($array[$key]) ? str_replace('{key}', $array[$key], $tpl) : $alt;
}

function check($val, $tpl,  $alt ='') {
    return !empty($val) ? str_replace('{key}', $val, $tpl) : $alt;
}

/**
 * @param $attributes
 * - click
 * - class
 * - id
 * - data - array of data
 * @return string
 */
function attrs($attributes) {
    $return = '';
    $return .= attr($attributes,'onclick');
    $return .= attr($attributes,'class');
    $return .= attr($attributes,'id');
    if(!empty($attributes['data'])) {
        $return .= addData($attributes['data']);
    }
    return $return;
}

/**
 * @param $data
 * @return string
 */
function addData($data) {
    $return = '';
    if(!empty($data['data'])) {
        if(is_array($data['data'])) {
            foreach($data['data'] as $k =>$v) {
                $return .= ' data-' . $k . '="' . $v . '"';
            }
        }
    }
    return $return;
}

/**
 * @param $styles
 * @return string
 */
function addStyles($styles) {
    if(empty($styles) || !is_array($styles)) {
        return '';
    }
    $return = '';

    foreach($styles as $k =>$v){
        $return .= "$k:$v";
    }

    return " style=\"$return\"";
}

function tag($tag, $text, $attrs = []) {
    $attrs = attrs($attrs);
    return "<{$tag}{$attrs}>$text</$tag>";
}

function h1($text, $attrs = []) { return tag('h1', $text, $attrs); }
function h2($text, $attrs = []) { return tag('h2', $text, $attrs); }
function h3($text, $attrs = []) { return tag('h3', $text, $attrs); }
function h4($text, $attrs = []) { return tag('h4', $text, $attrs); }
function h5($text, $attrs = []) { return tag('h5', $text, $attrs);}
function h6($text, $attrs = []) { return tag('h6', $text, $attrs); }
function b($text, $attrs = []) { return tag('b', $text, $attrs); }
function i($text, $attrs = []) { return tag('i', $text, $attrs); }
function u($text, $attrs = []) { return tag('u', $text, $attrs); }
function s($text, $attrs = []) { return tag('s', $text, $attrs); }
function p($text, $attrs = []) {  return tag('p', $text, $attrs); }
function div($text, $attrs = []) { return tag('div', $text, $attrs); }
function block($text) { return '<div class="block">' . $text . '</div>'; }
function img($img, $attrs = []) {
    $attrs['src'] = $img;
    $attrs = attrs($attrs)
            . attr($attrs, 'title');
    return "<img$attrs />";
}


function T($text) {
    return $text;
}


function icon($class) {
    return '<i class="icon ' . $class . '"></i>';
}

/**
 * [
 * 	url
 * 	text
 *  icon
 *  class
 * onclick
 * ]
 */
function btn($data = []){
    if(!empty($data['url']) && !empty($data['id'])) {
        $data['url'] = str_replace('{id}', $data['id'], $data['url']);
    }
    $data['text'] = (!empty($data['icon']) ? icon($data['icon']) : '') . (!empty($data['text']) ? T(@$data['text']) : '');
    $data = addClass($data, 'btn');
    return a($data);
}

function addClass($data, $class) {
    $data['class'] = empty($data['class']) ? $class : $data['class'] . ' ' . $class;
    return $data;
}


function navBtns() {
    return  btn([
        'icon' => 'fas fa-laptop',
        'class' => 'cp',
        'onclick' => 'alert(\'cp\')'
    ]).
    btn([
        'icon' => 'fas fa-home',
        'class' => 'home',
        'href' => BASE_URL
    ]) .
    btn([
        'icon' => 'fas fa-bars',
        'class' => 'toggleMenu',
        'onclick' => 'toggleMenu()'
    ]);

}

function popupbtn($popupid, $text = '', $data = []) {
    $data['onclick'] = "popup('$popupid')";
    $data['text'] = $text;
    return btn(
        $data
    );
}

function topBtns($btns) {
    $return = '<div class="btns">';
    foreach($btns as $btn) {
        $return .= btn($btn);
    }
    $return .= '</div>';
    return $return;
}

function closeBtn($id) {
    return [
        'class' => 'nobtn',
        'icon' => 'far fa-times-circle',
        'onclick' => 'closepopup(\'' . $id . '\')'
    ];
}

function  popup($id, $content) {
    $content = '<div class="cover" id="' . $id . '">
        <div class="popup">' . topbtns([closebtn($id)])
        . $content .
    '</div></div>';
    return $content;
}


/**
 * @param $data
 * href
 * rel
 * onclick
 * class
 * text
 * data - array
 */
function a($data) {
    $attr = attrs($data)
          . attr($data, 'href')//, null,'javascript:void(0);')
          . attr($data, 'rel');
    $text = d($data,'text');
    return "<a$attr>$text</a>";
}


function d($data, $key) {
    return $data[$key] ?? '';
}

/**
 * @param $data
 *  - class
 *  - text
 *  - w
 *  - h
 *  - bg
 *  - btns - array buttons
 *  - a - array a
 * @return string
 */
function box($data){
    $data = addClass($data, 'box');
    $attrs = attrs($data);
    $text = attr($data,'text', '<div class="text">{key}</div>');

    if(!empty($data['a'])) {
        $a = $data['a'];
        $a['text'] = $text;
        $a['class'] = 'boxlink';
        $text = a($a);
    }
    /** Styles */
    $style = '';
    $style .= attr($data ,'w',  'width:{key}px;');
    $style .= attr($data ,'h',  'height:{key}px;');
    $style .= attr($data,'bg','background-image: url(\'{key}\');');
    $style = check($style, ' style="{key}"');

    $return =  "<div{$attrs}{$style}>"
            . topBtns(d($data,'btns'))
            . $text
            . '</div>';



    return $return;
}

/**
 * Shadowbox. Extends box. Additional parameters:
 * - link
 * @param $data
 */
function sbox($data) {
    $a = $data['a'] ?? [];
    $a['href'] = $data['link'] ?? '';
    $a['rel'] = 'shadowbox';
    $data['a'] = $a;
    return box($data);
}