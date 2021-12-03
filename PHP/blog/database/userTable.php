<?php
    require_once('./db_connect.php');

    $sql = "CREATE TABLE users ( ";
    $sql .= "ID int AUTO_INCREMENT PRIMARY KEY, ";
    $sql .= "NAME VARCHAR(20) NOT NULL, ";
    $sql .= "EMAIL VARCHAR(50) NOT NULL UNIQUE, ";
    $sql .= "PASSWORD VARCHAR(255) NOT NULL, ";
    $sql .= "BIRTHDAY VARCHAR(30) NOT NULL, ";
    $sql .= "GENDER enum('m','w','x') default 'x', ";
    $sql .= "CREATED_AT TIMESTAMP NOT NULL )";

    echo $sql;
    if (!$dbConnect->query($sql)) {
        echo mysqli_error($dbConnect);
    }
    
?>