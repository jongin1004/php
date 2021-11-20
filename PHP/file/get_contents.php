<?php
    $file = '1.txt';
    if(is_readable($file)) {
        echo file_get_contents($file);
    } else {
        echo "파일을 읽을 권환이 없음";
    }

    echo "<br>";

    //홈페이지 html을 가져오는 것도 가능 
    $homepage = file_get_contents('https://mail.naver.com/');
    echo $homepage;
?>