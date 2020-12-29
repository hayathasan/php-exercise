<?php
//normal constant
define("foo","This is normal constant\n\n");
echo foo;


//class constant
class classConstant {
    const FOO_CLASS = "This is class constant\n\n";    
}

$class_constant = classConstant::FOO_CLASS;
echo $class_constant;
?>