<?php
    $conn = mysqli_connect("localhost", "root", "1004", "phpexam");
    $sql = "INSERT INTO topic (title, description, created) VALUE ('MySQL', 'MySQL is ...', NOW());";
    mysqli_query($conn, $sql);
?>