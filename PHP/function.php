<?php 
    function numbering() {
        $i = 0;
        while ($i <10) {
            echo $i."<br>";
            $i += 1;
        }
    }

    numbering();
    echo "-----------------<br>";

    function plus($arg1, $arg2) {
        return $arg1 + $arg2;        
    }

    echo plus(10, 20);
    echo "<br>-----------------<br>";


    function localAndGrobal() {
        $a = 0;
    }

    localAndGrobal();
    echo $a; //error -> $a는 function안에서 선언된 변수이기 때문에 지역변수임 
?>