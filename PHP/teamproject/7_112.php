<?php
  session_start();
  //현재 시간에서 세션 생성 시간을 빼서 차이를 구함
  $time = time() - (int) $_SESSION['id']['generation'];
  //차이의 값이 세션 유지시간 보다 크다면 세션을 삭제
  echo "세션이 생성된 후 {$time}초가 지났습니다.<br />";
  if($time > $_SESSION['id']['duration']){
      session_destroy();
  }

  //세션 존재 여부 확인
  if(isset($_SESSION['id'])){
    echo "세션이 존재합니다. 값 : {$_SESSION['id']['value']} ";
  }
  else{
    echo "세션이 존재하지 않습니다.";
  }
?>
