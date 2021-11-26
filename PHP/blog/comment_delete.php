<?php
    $conn = mysqli_connect("localhost", "root", "1004", "phpexam");
    $sql = "DELETE FROM comments WHERE id = {$_GET['id']}";
    if (mysqli_query($conn, $sql)) {
        header("Location: ./detail.php?id={$_GET['boardId']}");
    
    } else {
        echo mysqli_error($conn);
    }
?>