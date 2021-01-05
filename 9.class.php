<?php
print "\n\n--- static and non-static method ---\n\n";

class Foo{
    private $a = "a";
    public function aa(){
        $this->a = "aa\n";
        echo $this->a;
    }

    static $b = "b";
    public static function bb(){
        self::$b = "bb\n";
        echo self::$b;
    }
}

//non-static method called via class instantiation 
$foo = new Foo();
echo $foo->aa();

//static method called with scope resolution operator
echo Foo::bb();

//static method called via class instantiation
echo $foo->bb();
