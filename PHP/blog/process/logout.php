<?php
    session_start();

    if (!isset($_SESSION['CONN_IS'])) {
        echo "로그인 상태가 아닙니다.";
        exit;
    }

    session_destroy();
    header('Location: ../index.php');
?>