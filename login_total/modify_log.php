<?php
  include "../data/db_info.php";

  $id =$_POST['id'];
  $new_pass = password_hash($_POST['new_pass'],PASSWORD_DEFAULT);

  if($id == null || $new_pass ==null){
    echo "fill out all!";
    echo "<a href=\"modify.html\">back to page</a>";
    exit();
  } else {
    echo "good"."<br>";
  }

  $check = "select * from login_data2 where id = '$id'";
  $result = $mysqli -> query($check);
  if($result -> num_rows == 1){
    echo "수정할 수 있습니다"."<br>";
  } else {
    echo "아이디가 존재하지 않습니다";
    exit();
  }

  $modify = "update login_data2 set password='$new_pass'  where id ='$id'";
  $execute = $mysqli -> query($modify);
  if($execute){
    echo "수정 성공 ^_^";
    echo "<a href=\"register.html\">Back to page</a>";
  } else {
    echo "error occured"."<br>";
    echo $mysqli->error;
  }

 ?>
