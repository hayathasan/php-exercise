<?php
class Class2 {
    private $privateVar = 'Private Value';

    function class2Method1(){
        $this->privateVar = 'New Private Value';
        return $this->privateVar;
    }
}