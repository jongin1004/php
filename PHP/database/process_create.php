<?php
    $conn = mysqli_connect('localhost', 'root', '1004', 'phpexam');
    $sql = "INSERT INTO topic (title, description, created) VALUE ('{$_POST['title']}', '{$_POST['description']}', NOW());";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "저장하는 과정에서 문제 발생";
        //error_log()에 들어가는 내용은 아파치 error로그에 저장되서 사용자에겐 보이지 않음
        error_log(mysqli_error($conn)); 
    } else {
        echo "저장에 성공했습니다.<a href='./index.html'>돌아가기</a>";
    }
?>  