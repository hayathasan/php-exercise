<?php

print "\n\n--- autoload class ---\n\n";

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

echo Class1::$staticVar . "\n";
echo $class1->class1Method1() . "\n";
echo $class2->class2Method1() . "\n";




