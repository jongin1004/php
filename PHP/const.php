<?php
    define('TITLE', 'PHP basic'); //define 함수는 TITLE을 key값으로, 'PHP basic을 value로 하는 상수를 만듦
    echo TITLE; //상수는 대부분 대문자로 정의하는 것이 약속
    define('TITLE', 'hello'); //error 발생 - TITLE을 이미 상수라서 값을 변경할 수 없기 때문에 
?>