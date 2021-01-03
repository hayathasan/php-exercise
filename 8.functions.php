<?php
print "\n\n--- function within function ---\n\n";


// bar(); //bar do not exists yet
foo(); //foo exists in global scope

function foo(){
    echo "foo()\n";
    function bar(){
        echo "bar()\n";
    }
}

bar(); //bar exist now


print "\n\n--- function parameter by ref ---\n\n";

$str = "some";

function fn_with_ref(&$string){
    return $string .= " value\n";
}

echo fn_with_ref($str);
echo "$str";


print "\n\n--- function with default parameter ---\n\n";

function fn_with_def_prm($food = "biriani", $foodmaker = "sultan's dine"){
    echo "I always love to eat $foodmaker $food\n";
}

fn_with_def_prm();
fn_with_def_prm("kacchi");

function fn_with_def_prm1($foodmaker, $food = "biriani"){
    echo "I always love to eat $foodmaker$food\n";
}

fn_with_def_prm1('');
fn_with_def_prm1("sultan's dine ");
fn_with_def_prm1("sultan's dine ", "kacchi");


print "\n\n--- function with [...token] parameter ---\n\n";


function numsum(...$nums){
    $cc = 0;
    foreach($nums as $c){
        $cc += $c;
    }
    return "$cc\n";
}
echo numsum(1,2,3,4);


function makeName1($name){
    list($fname,$mname,$lname) = $name;
    echo "$fname $mname $lname\n";
}
function makeName2($fname, $mname, $lname){
    echo "$fname $mname $lname\n";
}

makeName1(["hayat","md","hasan"]);
makeName2(...["hayat","md","hasan"]);


print "\n\n--- variable function ---\n\n";

function var_function($prm = "some param"){
    if($prm != ''){
        echo "variable function executed with $prm\n";
    }
}

$somefunction = "var_function";
$somefunction();
$somefunction("some new param");


print "\n\n--- variable function within obj method ---\n\n";

class Foo{
    static function var_function1() {
        $someother_fn = "var_function2";
        self::$someother_fn();
    }
    function var_function2(){
        echo "var_function2() called\n";
    }
}

$var_newfn = "var_function1";
Foo::$var_newfn();


print "\n\n--- built-in functions ---\n\n";


var_dump(get_extension_funcs('mysqli'));
var_dump(get_loaded_extensions());


print "\n\n--- anonymous functions ---\n\n";

$greet = function($name){
    printf("Hello %s\r\n",$name);
    echo "Hello $name \n";
};

$greet("World");
$greet("Hayat");

print "\n\n--- Inherited Variables functions ---\n\n";

$msg = "Hello";

$fn = function() use ($msg){
    echo "$msg\n";
};

$fn();
