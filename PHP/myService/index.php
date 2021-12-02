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
    <div id="container">
        <section id="introSite">
            <div id="siteComment">
                저의 웹서비스에 어서 오세요.
            </div>
            <div id="signUpBtn">
                <p>가입하기</p>
            </div>
        </section>
        <section id="signup">
            <div id="signupCenter">
                <form action="./database/myMember.php" method="POST" id="signUpForm">
                    <div class="row">
                        <div class="inputBox">
                            <input type="text" name="userName" id="userName" placeholder="이름">
                        </div>
                    </div>
                    <div class="row">
                        <div class="inputBox">
                            <input type="email" name="userEmail" id="userEmail" placeholder="이메일">
                        </div>
                    </div>
                    <div class="row">
                        <div class="inputBox">
                            <input type="password" name="userPw" id="userPw" placeholder="비밀번호">
                        </div>
                    </div>
                    <div class="row">
                        <label>생일</label>
                        <div class="selectBox">
                            <select name="birthYear" id="birthYear">
                                <option value="">연도</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                            </select>                            
                        </div>

                        <div class="selectBox">
                            <select name="birthMonth" id="birthMonth">
                                <option value="">월</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                            </select>                            
                        </div>

                        <div class="selectBox">
                            <select name="birthDay" id="birthDay">
                                <option value="">일</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                            </select>                            
                        </div>
                    </div>
                    
                    <div class="row genderRow">
                        <div id="genderLabel">
                            <label for="gW" id="gMW">여성</label>
                            <label for="gM" id="gMM">남성</label>
                        </div>
                        <input type="radio" name="gender" id="gW" class="gender" value="w">
                        <input type="radio" name="gender" id="gM" class="gender" value="m">
                    </div>
                    <div class="row">
                        <p id="valueError"></p>
                    </div>

                    <div class="row">
                        <div class="submitBox">
                            <input type="submit" value="가입하기" id="signUpSubmit">
                        </div>
                    </div>
                    <input type="hidden" name="mode" value="save">
                </form>

                <div id="goToLoginBtn">
                    <p>로그인하기</p>
                </div>
            </div>
        </section>                   
    </div>

    <footer>
        <p>My Web Serivce</p>
    </footer>
</body>
</html>