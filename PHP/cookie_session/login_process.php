<?php
    session_start();
    $id = 'jongin';
    $pwd = '1111';
    if(!empty($_POST['id']) && !empty($_POST['pwd'])){
        if($_POST['id'] == $id && $_POST['pwd'] == $pwd){
            $_SESSION['is_login'] = true;
            $_SESSION['nickname'] = '종인';
            header('Location: ./session_.php');
            exit;
        }
    }
    echo '로그인 하지 못했습니다.';
?>