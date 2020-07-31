<?php
  include "db_info.php";

  $id = $_POST['id'];
  $password = $_POST['password'];
  $gender = $_POST['gender'];
  $name = $_POST['name'];
  $brithday = $_POST['brithday'];
  $email = $_POST['email'];

  if ($id == null || $password == null || $gender == null || $name == null ||
  $brithday == null || $email == null )
  {
    echo "Fill it all out.!";
    echo "<a href=\"register.html\">back to register</a>";
    exit();
  } else {
    echo "good"."<br>";
  }

   $check = "select * from login_data where id='$id'";
   $result = $mysqli -> query($check);
   if($result ->num_rows ==1){
     echo "This ID is already being used";
     echo  "<a href=\"register.html\">back to register</a>";
     exit();
   } else {
     echo " good job"."<br>";
   }

  $input = "insert into login_data(id,password,gender,name,brithday,email)
              values('$id','$password','$gender','$name','$brithday','$email')";
  $excute = $mysqli -> query($input);
  if($excute) {
    echo "Membership registration is complete.";
    echo  "<a href=\"register.html\">back to register</a>";
    //header("location:login.php");
  } else {
    echo "error occured"."<br>";
    echo $mysqli->error;
  }
 ?>
