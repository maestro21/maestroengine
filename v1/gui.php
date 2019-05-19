<?php

function T($text) {
    return $text;
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
    $id = @$data['id'] ? ' id="' . @$data['id'] . '"' : '';
    $href = (@$data['url'] ? str_replace('{id}', $id, @$data['url']) : 'javascript:void(0);');
    $text = (@$data['icon'] ? icon(@$data['icon']) : '') . (@$data['text'] ? T(@$data['text']) : '');
    $class = 'btn' . (@$data['class'] ? ' ' . @$data['class'] : '' );
    $onclick = @$data['onclick'] ? ' onclick="' . @$data['onclick'] . '"' : '';
    return sprintf('<a href="%s" class="btn %s"%s%s>%s</a>', $href, $class, $id, $onclick, $text);
}


function icon($class) {
    return '<i class="icon ' . $class . '"></i>';
}


function popupbtn($popupid, $text = '', $data = []) {
    $data['onclick'] = "popup('$popupid')";
    $data['text'] = $text;
    return btn(
        $data
    );
}

function topbtns($btns) {
    $return = '<div class="btns">';
    foreach($btns as $btn) {
        $return .= btn($btn);
    }
    $return .= '</div>';
    return $return;
}

function closebtn($id) {
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


function box($data){
    $class = @$data['class'] ? ' ' . $data['class'] :'';
    $text = $data['text'] ?? null;
    $style = [];

    $w = @$data['w'] ? 'width:' . $data['w'] . 'px;' : null;
    $h = @$data['h'] ?  'height:' . $data['h'] . 'px;' : null;
    $bg = @$data['bg'] ?  'background-image: url(\'' . $data['bg'] . '\');' : null;
    $btns = $data['btns'] ?? null;

    $return =  '<div class="box $class"';
    if($w || $h || $bg) {
        $return .= ' style="' . $w .  $h . $bg . '"';
    }
    $return .= '>';

    if($btns) {
        $return .= topbtns($btns);
    }

    if($text) {
        $return .='<div class="text">' . $text . '</div>';
    }
    $return .= '</div>';

    return $return;
}