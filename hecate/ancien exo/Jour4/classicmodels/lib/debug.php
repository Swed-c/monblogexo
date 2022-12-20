<?php


/*  Fonction de debug d'un tableau */
function debug_table($table){
    echo '<pre>';
    print_r($table);
    echo '</pre>';
}

function d($table){
    debug_table($table);
}

?>