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

