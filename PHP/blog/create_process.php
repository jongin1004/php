<?php
    $conn = mysqli_connect("localhost", "root", "1004", "phpexam");
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);    

    $sql = "INSERT INTO boards (title, description, created_at) VALUE ('{$title}', '{$description}', NOW());";    
    if (mysqli_query($conn, $sql)) {
        header("Location: ./");    
    } else {
        echo mysqli_error($conn);
    }
?>