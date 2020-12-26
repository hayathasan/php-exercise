<?php
    $a = 2; echo "a = 2 : $a\n";

    // $b = $a; echo "b = a : $b\n";    //variable assigned
    $b = &$a; echo "b = &a : $b\n";     //variable referenced
    
    $a += 1; echo "a += 1 : $a\n"; echo "b = b : $b\n";

    echo "\nargc:\n";
    print_r($argc); 
    
    echo "\n\nargv:\n"; 
    print_r($argv);


    function global_fn1 () {
        global $a, $b; 
        echo "\n\nglobal_fn1: ".($a+$b)."\n";       
    }

    global_fn1();

    function global_fn2 () {
        echo "\n\nglobal_fn2: ".($GLOBALS['a'] + $GLOBALS['b'])."\n";       
    }

    global_fn2();

    echo "Static Variable:\n";
    function static_var(){
        static $aa = 0; echo "$aa\n\n"; $aa++;        
    }

    foreach([1,2,3] as $i){
        static_var();
    }


?>