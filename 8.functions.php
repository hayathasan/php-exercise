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


print "\n\n--- function with default parameter ---\n\n";


