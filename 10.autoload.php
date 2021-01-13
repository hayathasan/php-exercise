<?php
function __autoload($class){
    $dirs = [
        'classes/',
        'modules/classes/'
    ];

    foreach($dirs as $dir){
        if(file_exists($dir.$class.'.php')){
            require_once($dir.$class.'.php');
            return;
        }
    }
}

