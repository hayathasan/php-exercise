<?php
//normal constant
// define("foo","This is normal constant\n\n"); // This is bad style

// Constant must be uppercase
define('FOO', "This is normal constant.");
echo FOO;

// echo foo;


//class constant
// class classConstant {
//     const FOO_CLASS = "This is class constant\n\n";    
// }

// Class name should be CamelCase
// style guide : https://gist.github.com/ryansechrest/8138375
class ClassConstant {

	const FOO_CLASS = "This is class constant\n\n";
	
}

// $class_constant = classConstant::FOO_CLASS;
$class_constant = ClassConstant::FOO_CLASS;
echo $class_constant;

?>