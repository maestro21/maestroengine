<?php 

function tabs($tabs) {
    $return = '<v-tabs>';

    foreach($tabs as $key => $value) {
        $return .= '<v-tab :key="' . $key . '">' . t($key) . '</v-tab>' .
            '<v-tab-item :key="' . $key . '">' . $value . '</v-tab-item>';
    }

    $return .= '</v-tabs>';

    return $return;
}