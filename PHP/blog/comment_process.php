<?php
    $conn = mysqli_connect("localhost", "root", "1004", "phpexam");
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);    
    
    $sql = "INSERT INTO comments (comment, boardId, created_at) VALUE ('{$comment}', '{$id}', NOW());";      

    if (mysqli_query($conn, $sql)) {
        header("Location: ./detail.php?id={$id}");    
    } else {
        echo mysqli_error($conn);
    }
?>