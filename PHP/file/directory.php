<?php
    //현재 디렉토리
    echo dirname(__FILE__);
    echo "<br>";
    echo __DIR__;
    echo "<br>";
    echo getcwd();
    echo "<br>";
    chdir('../'); //현재 디렉토리 변경   
    echo getcwd();
    echo "<br>";

    //디렉토리 파일 탐색
    $dir = "./";
    $files1 = scandir($dir);
    $files2 = scandir($dir, 1);

    print_r($files1);
    print_r($files2);


    mkdir("1/2/3/4", 0700, true);
?>