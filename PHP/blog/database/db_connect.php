<?php
    $host = "localhost";
    $user = "root";
    $pwd = "1004";
    $dbName = "phpexam";
    $dbConnect = new mysqli($host, $user, $pwd, $dbName);
    $dbConnect->set_charset('utf8');
    
    if(mysqli_connect_errno()){
        echo '데이터베이스 접속 실패';
        echo mysqli_connect_error();
    }
?>