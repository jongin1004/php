<?php
    $conn = mysqli_connect("localhost", "root", "1004", "phpexam");
    $getBoard_sql = "SELECT * FROM boards ORDER BY id DESC";
    $getBoard = mysqli_query($conn, $getBoard_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Kosugi&family=Roboto+Mono:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
    <!-- font-family: 'Kosugi', sans-serif; -->
    <script src="main.js" defer></script>    
    <title>Document</title>
</head>
<body>
    <div class="header">
        <div class="logo">
            <i class="far fa-clipboard"></i>
            <span class="logo_name">blog</span>
        </div>
        <ul class="menu">
            <li><a href="./">main</a></li>
            <li><a href="list.php">list</a></li>
            <li><a href="create.html">create</a></li>
        </ul>
    </div>

    <div class="container">        
        <div class="content">
            <div class="title">blog</div>
            <hr>
            <div class="board_list">                
                <?php 
                    while ($row = mysqli_fetch_array($getBoard)) { ?>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?=htmlspecialchars($row['title'])?></h5>                                                                
                                <a href="./detail.php?id=<?=$row['id']?>" class="btn btn-primary">상세보기</a>
                            </div>
                        </div>
                        <br>
                <?php } ?>                
            </div>
        </div>        
    </div>
</body>
</html>