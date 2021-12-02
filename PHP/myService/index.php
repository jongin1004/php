<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Web Service</title>
</head>
<body>
    <!-- 로그인 후 -->
    <div id="viewType">
        <a href="/me.php" id="meLink">me</a>
        <a href="/all.php" id="allLink">all</a>
    </div>
    <header>
        <div id="myService">My Web Service</div>
        <!-- 로그인 후 -->
        <div id="myName">
            <p>안녕하세요. 최종인 님</p>
            <div id="logoutBox">
                <input type="button" value="로그아웃" id="logoutBtn"/>
            </div>
        </div>
        <!-- 로그인 전 -->
        <div id="loginForm">
            <form action="./login.php" method="POST" name="loginForm">
                <div id="loginEmailArea">
                    <label for="loginEmail">E-Mail</label>
                    <div class="loginInputBox">
                        <input type="email" name="email" id="loginEmail" placeholder="이메일" />
                    </div>                    
                </div>
                <div id="loginPwArea">
                    <label for="loginPw">Password</label>
                    <div class="loginInputBox">
                        <input type="password" name="userPw" id="loginPw" placeholder="비밀번호 8자 이상 입력" />
                    </div>                    
                </div>
                <div class="loginSubmitBox">
                    <input type="submit" value="로그인" id="loginSubmit">
                </div>
            </form>
        </div>
    </header>

    <!-- container -->
    

    
</body>
</html>