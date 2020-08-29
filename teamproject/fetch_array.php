<?php
  include "./db/db.php";

  $memberNum = 1;
  $sql = mq("select * from members where mem_no = {$memberNum}");
  //MYSQLI_ASSOC 는 필드명으로 각 필드의 정보를 분류해 준다.
  //MYSQLI_ASSOC 가 없으면 필드명이랑 인덱스번호로 둘다 분류가 되기때문에 중복이되서 복잡
  $result = $sql -> fetch_array(MYSQLI_ASSOC);

  echo "<pre>";
  var_dump($result);

?>