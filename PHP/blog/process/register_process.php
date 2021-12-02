<?php
    require_once('../database/db_connect.php');

    
    $userName = $dbConnect->real_escape_string($_POST['name']);
    $userEmail = $dbConnect->real_escape_string($_POST['email']);
    $userPw = $dbConnect->real_escape_string($_POST['password']);
    $userBirthday = $dbConnect->real_escape_string($_POST['birthday']);
    $userGender = $dbConnect->real_escape_string($_POST['gender']);

    // 이름 검증
    $namePattern = '/^[가-힣]+$/';
    if(!preg_match($namePattern, $userName, $res)) {
        echo "이름 검증 실패";
        exit;
    } else {
        echo "이름 검증 성공";
    }

    // 이메일 검증
    $emailPattern = '/^[a-zA-Z0-9]+@[a-zA-Z\-]+\.[\.a-zA-Z]+$/';
    if(!preg_match($emailPattern, $userEmail, $res)) {
        echo "이메일 검증 실패";
        exit;
    } else {
        echo "이메일 검증 성공";
    }
    
    // 패스워드 검증
    $pwPattern = '/^[a-zA-Z0-9!@#$%^&*_]{8,}$/';
    if(!preg_match($pwPattern, $userPw, $res)) {
        echo "패스워드 검증 실패";
        exit;
    } else {
        echo "패스워드 검증 성공";
    }

    // 생일 검증
    if ($userBirthday == null) {
        echo "생일 검증 실패";
        exit;
    } else {
        // 미래를 선택했을 경우는 제외
        if (strtotime(date($userBirthday)) - time() > 0) {
            echo "날짜를 다시 선택해주세요.";
            exit;
        } else {
            echo "생일 검증 성공";
        }
    }

    // 성별 검증
    if ($userGender != 'm' && $userGender != 'w') {
        echo "성별 검증 실패";
    } else {
        echo "성별 검증 성공";
    }
    
?>