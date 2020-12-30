<?php 
$i = 1;
while($i<=10){
    echo $i++;
}


print "\n\n--- foreach loop with nested array using list() ---\n\n";

$arr = [
    [1,11],
    [2,22],
    [3,33]
];

foreach($arr as list($a,$aa)){
    echo "$a - $aa \n";
}


print "\n\n--- switch ---\n\n";

$a = 0;

switch(true){
    case ($a === true): echo '$a is true'; break;
    case ($a === false): echo '$a is false'; break;
    case ($a === 0): echo '$a is 0'; break;
}


print "\n\n--- requite/include ---\n\n";


echo dirname(__FILE__);
echo "\n";
echo dirname(dirname(__FILE__));