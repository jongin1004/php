<?php
  include "../data/db_info.php";
  include "../data/password.php";
  require_once('./lib/passwordcheck.php');

  $id = $_POST['id'];
  $gender = $_POST['gender'];
  $name = $_POST['name'];
  $brithday = $_POST['birthday'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password_code = password_hash($_POST['password'],PASSWORD_DEFAULT);

  $id_hangle_check = preg_match('/[^a-z 0-9]/u',$id);
  if($id_hangle_check == 1){
    echo "<script>alert('아이디는 영문으로만 작성해주세요.'); location.href='../register.php';</script>";
    exit;
  }


  if($id == null || $password == null || $gender == null || $name == null ||
  $brithday == null || $email == null  ){
    echo "<script>alert('모두 기입해 주세요.'); location.href='../register.php';</script>";
    exit;
  }

  password_check($password);

  $id_check = "select * from login_team where id = '$id'";
  $result =  $mysqli ->query($id_check);
   if($result->num_rows ==1 ) {
     echo "<script>alert('이미 존재하는 아이디입니다.'); location.href='../register.php';</script>";
     exit;
   } else {
     echo "good";
   }

   $query = "insert into login_team (id,password,gender,name,email,brithday)
           values('$id','$password_code','$gender','$name','$email','$brithday')";
   $execute = $mysqli ->query($query);
   if($execute) {
     echo "<script>alert('회원가입이 완료되었습니다.'); location.href='../login.php';</script>";
   }   else{
       echo "error occured"."<br>";
       echo $mysqli->error;
     }

 ?>
