<?php
    $conn = mysqli_connect("localhost", "root", "1004", "phpexam");
    $sql = "DELETE FROM boards WHERE id = {$_GET['id']}";        
    if (mysqli_query($conn, $sql)) {
        header("Location: ./");    
    } else {
        echo mysqli_error($conn);
    }
?>