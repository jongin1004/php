<?php
  //PASSWORD에 대문자/소문자/숫자/특수문자가 입력되었는지 확인하고
  // 하나라도 빠지게되면 가입할 수 없도록 만들어주는 함수다
  function password_check($password){
  $password_num_check = preg_match('/[0-9]/u',$password);
  $password_smallstring_check = preg_match('/[a-z]/u',$password);
  $password_bigstring_check = preg_match('/[A-Z]/u',$password);
  $password_special_check = preg_match('/[\~\!\@\#\$\%\^\&\*]/u',$password);

  if($password_num_check == 1 && $password_smallstring_check == 1 && $password_bigstring_check ==1
      && $password_special_check ==1){
        echo "ok!"."<br>";
      } else {
    echo "<script>alert('영문 대소문자,숫자,특수문자 섞어서 만들어주세요.'); history.back();</script>";
    exit;
  }
}
 ?>
