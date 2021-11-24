<?php
    $conn = mysqli_connect("localhost", "root", "1004", "phpexam");
    $sql = "INSERT INTO boards (title, description, created_at) VALUE ('{$_POST['title']}', '{$_POST['description']}', NOW());";    
    if (mysqli_query($conn, $sql)) {
        header("Location: ./");    
    } else {
        echo mysqli_error($conn);
    }
?>