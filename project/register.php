<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
    .register{
        text-align:center;
        width:360px;
        margin:0 auto;
    }
    </style>
  </head>
  <body>

    <div class="register">
      <h1>회원가입</h1>
      <fieldset>
        <legend>register</legend>
        <table>
          <form action="./login/register_ok.php" method="post">
            <tr>
              <td>ID  </td>
              <td><input type="text" name="id" placeholder="id"></td>
            </tr>
            <tr>
              <td>Password  </td>
              <td><input type="password" name="password"></td>
            </tr>
            <tr>
              <td>gender</td>
              <td>남성 <input type="radio" name="gender" value="male">
                  여성 <input type="radio" name="gender" value="female"></td>

            </tr>
            <tr>
              <td>이름 </td>
              <td><input type="text" name="name" placeholder="name"></td>
            </tr>
            <tr>
              <td>birthday</td>
              <td><input type="date" name="birthday"></td>
            </tr>
            <tr>
              <td>email</td>
              <td><input type="email" name="email"></td>
            </tr>
            <tr>
              <td></td>
              <td><input type="submit" name="submit" value="register"></td>
            </tr>
          </form>
        </table>
      </fieldset>

    </div>

  </body>
</html>
