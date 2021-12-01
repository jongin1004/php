<?php    
    $conn = mysqli_connect("localhost", "root", "1004", "phpexam");
    $getBoard_sql = "SELECT * FROM boards WHERE id = {$_GET['id']}";    
    $getBoard = mysqli_query($conn, $getBoard_sql);
    $getComment_sql = "SELECT * FROM comments WHERE boardId = {$_GET['id']}";    
    $getComment = mysqli_query($conn, $getComment_sql);
    $boardRow = mysqli_fetch_array($getBoard);         
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
            <div class="button_container">
                <a href="./modify.php?id=<?=$boardRow['id']?>" class="btn btn-primary">수정</a>
                <a href="./delete.php?id=<?=$boardRow['id']?>" class="btn btn-danger">삭제</a>
            </div>

            <div class="board_list">                
                <div class="board_header">
                    <div class="title"><?=htmlspecialchars($boardRow['title'])?></div>
                    <div class="created"><?=htmlspecialchars($boardRow['created_at'])?></div>
                </div>                
                <br>
                <div class="description"><?=$boardRow['description']?></div>
            </div>
            <hr>            
            <p>댓글작성</p>
            <form action="./comment_process.php" method="POST">
                <input type="hidden" name="id" value="<?=$boardRow['id']?>">
                <input type="text" class="form-control" name="comment">
                <input type="submit" class="btn btn-primary mt-2ss" value="작성">
            </form>
            <hr>
            <p>댓글</p>
            <?php
            while ($commentRow = mysqli_fetch_array($getComment)) { ?>
                <div class="card">
                    <div class="card-body">
                        <div class="card-title"><?=$commentRow['comment']?></div>                         
                        <a href="./comment_delete.php?id=<?=$commentRow['id']?>&boardId=<?=$boardRow['id']?>" class="btn btn-danger">삭제</a>
                    </div>
                </div>
            <?php } ?>            
        </div>                     
    </div>
</body>
</html>