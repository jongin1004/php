<?php
    session_start();
    require_once('../database/db_connect.php');    

    $userEmail = $dbConnect->real_escape_string($_POST['email']);
    $userPw = $dbConnect->real_escape_string($_POST['password']);
    
    // 해당 이메일을 가진 유저가 db에 존재하는지 가져
    $sql = "SELECT * FROM users WHERE EMAIL = '{$userEmail}'";
    if (!$res = $dbConnect->query($sql)) {
        echo "쿼리실패";        
        exit;
    }

    // db에 유저가 존재하면 row가 1개가 검색됨, 없을 경우에는 0
    if ($res->num_rows != 1) {
        echo "email주소 또는 비밀번호가 틀렸습니다!";
        exit;
    }

    // hash로 암호화된 DB에 Pw정보와 사용자가 Login에서 입력한 Pw가 일치하는지 검증
    $userRow = $res->fetch_array();
    $verify = password_verify($userPw, $userRow['PASSWORD']);    
    if (!$verify) {                
        $msg = "email주소 또는 비밀번호가 틀렸습니다!";
        $msgEncoded = base64_encode($msg);
        header("location: ../login.php?msg=".$msgEncoded);
        exit;
    }

    $_SESSION['USER_DATA'] = $userRow;
    $_SESSION['CONN_IS'] = 1;
    $_SESSION['USER_ID'] = $userRow['ID'];    
    header('location: ../index.php');
?>