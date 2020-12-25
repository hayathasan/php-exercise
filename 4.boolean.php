<?php

    $a = 2;
    echo "a = 2 : $a\n";
    
    $b = &$a;
    echo "b = &a : $b\n";
    
    $a += 1;
    echo "a += 1 : $a\n";
    echo "b = b : $b\n";

?>