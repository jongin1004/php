<?php
  include "../data/db.php";
  include "../data/password.php";

  if($_POST['id'] == null || $_POST['password'] == null) {
    echo "<script>alert('아이디와 비밀번호를 모두 작성해주세요.'); location.href='../login.php';</script>";
    exit;
  }

  $password = $_POST['password'];
  $sql = mq("select * from login_team where id='".$_POST['id']."'");
  $member = $sql -> fetch_array();
  $hash_pw = $member['password'];
  // echo $password."<br>";
  // echo $hash_pw;
  $sql2 = mq("select * from login_team where id='".$_POST['id']."'");
  $member2 = $sql2 -> fetch_array();
  $rank = $member2['rank'];

  if(password_verify($password, $hash_pw)){
    $_SESSION['id'] = $member["id"];
    $_SESSION['password'] = $member["password"];

    if($rank == "member") {
      echo "<script>alert('로그인 되었습니다.'); location.href='../member_home.php';</script>";
    } else {
      echo "<script>alert('로그인 되었습니다.'); location.href='../manager_home.php';</script>";
    }
  } else {
    echo "<script>alert('아이디 또는 비밀번호를 정확히 입력해주세요.'); location.href='../login.php';</script>";

  }

 ?>
