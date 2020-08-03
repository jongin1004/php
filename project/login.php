<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
      .login{
        text-align:center;
        width:360px;
        margin:0 auto;
      }
    </style>
  </head>
  <body>
    <div class = "login">
      <h1>Login</h1>
      <form action="./login/login_ok.php" method="post">
        <fieldset>
          <legend>Login</legend>
          <table cellspacing="0">
            <tr>
              <td>  <pre>         ID : </pre></td>
              <td><input type="text" name="id" placeholder="id"></td>
            </tr>
            <tr>
              <td>password : </td>
              <td><input type="password" name="password"></td>
              <td><input type="submit" name="submit" value="Login"></td>
            </tr>
          </table>
            <button type="button" onclick="location.href='./register.php'">회원가입</button>
            <button type="button" onclick="location.href='./modify.php'">계정찾기</button>
        </fieldset>

      </form>
  </body>
</html>
