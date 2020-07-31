  <meta charset="utf-8" />
<?php
  include "../data/db_info.php";
  include "../data/password.php";

  $id = $_POST['id'];
  $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
  $gender = $_POST['gender'];
  $name = $_POST['name'];
  $brithday = $_POST['brithday'];
  $email = $_POST['email'];

  if($id == null || $password == null || $gender == null || $name == null ||
  $brithday == null || $email == null)
  {
    echo "Fill it all out.!";
    echo "<a href=\"register.html\">Back to page</a>";
    exit();
  } else {
    echo "good"."<br>";
  }

  $check ="select * from login_data2 where id = '$id'";
  $result = $mysqli ->query($check);
  if($result ->num_rows ==1){
    echo "This id is already being used";
    echo "<a href=\"register.html\">Back to page</a>";
    exit();
  } else {
    echo "Okay";
  }

  $query = "insert into login_data2 (id,password,gender,name,brithday,email)
          values('$id','$password','$gender','$name','$brithday','$email')";
  $execute = $mysqli->query($query);
  if($execute){
    echo "Sign up successfully";
    echo "<a href=\"register.html\">Back to page</a>";
    echo "<script>alert('회원가입이 완료되었습니다.'); location.href='../index.html';</script>";

  }
  else{
    echo "error occured"."<br>";
    echo $mysqli->error;
  }
  ?>
