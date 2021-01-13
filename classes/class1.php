<?php
class Class1 {
    static $staticVar = 'Static Value';
    function class1Method1(){
        self::$staticVar = 'New Static Value';
        return self::$staticVar; 
    }
}
