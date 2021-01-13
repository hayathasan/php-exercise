<?php
spl_autoload_register(function ($class){
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
});

$class1 = new Class1();
$class2 = new Class2();


