<?php

function debug($arr,$f=false){
    echo '<hr><pre style="background:silver">'.print_r($arr,1).'</pre><hr>';
    if($f) die;
}
function hr(){
    echo '<hr>';
}
function br(){
    echo '<br>';
}