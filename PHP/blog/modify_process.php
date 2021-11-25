<?php
    $conn = mysqli_connect("localhost", "root", "1004", "phpexam");
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $sql = "UPDATE boards SET title = '{$title}', description = '{$description}' WHERE id = '{$id}'";    
    
    if (mysqli_query($conn, $sql)) {
        header("Location: ./detail.php?id={$id}");    
    } else {
        echo mysqli_error($conn);
    }
?>