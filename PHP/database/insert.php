<?php
    $conn = mysqli_connect("localhost", "root", "1004", "phpexam");
    $sql = "INSERT INTO topic (title, description, created) VALUE ('MySQL', 'MySQL is ...', NOW());";
    //mysqli_query()는 SELECT,SHOW, DESCRIPBE query를 사용했을 때는 성공했을 때 = mysqli_result라는 객체로 리턴
    //그 외의 query문에 대해서는 성공하면, TRUE를 리턴
    // 실패하면 FALSE를 리턴 한다. -> if문을 이용해서 처리해줄 수 있음 
    if ( !mysqli_query($conn, $sql)) {
        echo mysqli_error($conn); // mysql에서 무슨 에러가 발생했는지를 리턴해줌 
        //mysqli_error에 대한 출력값은 echo로 외부에 노출하면 안됨. 주요정보가 나타나기 때문 (개발할 떄에는 가능하다.)
    }
?>