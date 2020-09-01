<?php

  include_once "./db/db.php";

  $linkNum = (int) $_GET['linkNum'];

  if($linkNum == 0){
    exit;
  }
  $sql = mq("select * from linkClickCount");
  $result = $sql -> fetch_array();

  $sql2 = "update linkClickCount set linkClickCountID = {$result['linkClickCountID']}+1 where linkNum = {$linkNum}";
  
  
  $query = mq("{$sql2}");
?>
