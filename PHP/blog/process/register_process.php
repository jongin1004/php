<?php
    require_once('../database/db_connect.php');
    require_once('../process/register_validate.php');


    $sql = "INSERT INTO users (NAME, EMAIL, PASSWORD, BIRTHDAY, GENDER, CREATED_AT) ";
    $sql .= "VALUES ('{$userName}', '{$userEmail}', '{$userPw}', '{$userBirthday}', '{$userGender}', NOW())";
    ;

    if ($dbConnect->query($sql)) {
        header("Location: ../login.php");
    } else {
        echo mysqli_error($dbConnect);
    }
?>