<?php
    $conn = mysqli_connect('localhost', 'root', '1004', 'phpexam');
    $sql = "SELECT * FROM topic;";
    $result = mysqli_query($conn, $sql);
    //mysqli_fetch 는 array나 objectt등 원하는 타입으로 가져올 수 있음

    while ($row = mysqli_fetch_array($result)) {
        echo "<h1>".$row['title']."</h1>";
        echo $row['description'];
    }
?>