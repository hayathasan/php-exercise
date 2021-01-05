<?php
print "\n\n--- static and non-static method ---\n\n";

class Foo{
    public $a = "a";
    public function a(){
        $this->a = "a()\n";
        return $this->a;
    }

    static $b = "b";
    public static function bb(){
        self::$b = "bb\n";
        return self::$b;
    }
    
}

//non-static method called via class instantiation 
$foo = new Foo();
echo "property: $foo->a \n";
echo "menthod: {$foo->a()}";

//static method called with scope resolution operator
echo Foo::bb();

//static method called via class instantiation
echo $foo->bb();


