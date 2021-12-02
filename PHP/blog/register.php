<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Kosugi&family=Roboto+Mono:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">    
    <link rel="stylesheet" href="./css/register.css">    
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
            <li><a href="login.php">login</a></li>
            <li><a href="register.php">register</a></li>
        </ul>
    </div>

    <div class="container">        
        <div class="content">
            <div class="title">register</div>
            <form action="./process/register_process.php" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-Mail</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="비밀번호를 8자 이상">                    
                </div>
                <div class="mb-3">
                    <label for="birthday" class="form-label">birthday</label>
                    <input type="date" class="form-control" id="birthday" name="birthday">                    
                </div>
                <div class="radios mb-3">
                    <label for="gender" class="form-label">gender</label>
                    <div class="raidoBox">
                        <input type="radio" name="gender" value="m" id="gM" />
                        <label class="radio" for="gM">남성</label>
                        
                        <input type="radio" name="gender" value="w" id="gW" />
                        <label class="radio" for="gW">여성</label>
                    </div>                    
                </div>                
                <button type="submit" class="btn btn-primary">register</button>
            </form>
        </div>        
    </div>
</body>
</html>