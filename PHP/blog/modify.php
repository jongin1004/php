<?php
    $conn = mysqli_connect("localhost", "root", "1004", "phpexam");
    $getBoard_sql = "SELECT * FROM boards WHERE id = {$_GET['id']}";    
    $getBoard = mysqli_query($conn, $getBoard_sql);
    $row = mysqli_fetch_array($getBoard); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script src="https://kit.fontawesome.com/1877f468c8.js" crossorigin="anonymous"></script>    
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
            <h1>Modify</h1>            
            <form action="./modify_process.php" method="POST">
                <input type="hidden" name="id" value="<?=$row['id']?>">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?=$row['title']?>">
                </div>
                <div class="mb-3">
                    <label for="summernote" class="form-label">description</label>
                    <textarea class="summernote" id="description" name="description" rows="18"><?=$row['description']?></textarea>                 
                </div>                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>    

    <script>
        $('.summernote').summernote({                        
            height: 200
        });
    </script>
</body>
</html>