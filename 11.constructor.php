<?php
class BaseClass {
    function __construct(){
        print "This is Parent Contructor \n";
    }
}

class SubClass extends BaseClass {
    function __construct(){
        parent::__construct();
        print "This is SubClass Constructor \n";
    }
}

$baseClass = new BaseClass();
$subClass = new SubClass();