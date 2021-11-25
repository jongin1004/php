<?php
    $conn = mysqli_connect("localhost", "root", "1004", "phpexam");
    $sql = "UPDATE boards SET title = '{$_POST['title']}', description = '{$_POST['description']}' WHERE id = '{$_POST['id']}'";    
    
    if (mysqli_query($conn, $sql)) {
        header("Location: ./detail.php?id={$_POST['id']}");    
    } else {
        echo mysqli_error($conn);
    }
?>