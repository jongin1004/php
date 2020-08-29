<?php
  include_once "./db/db.php";

  $sql = mq("SELECT * FROM member");
  

  $numView = 50;

  $totalRecord = $sql->num_rows;
  //페이지 수
  $numPage = ceil($totalRecord / $numView);

  for($i = 1; $i <= $numPage; $i++){?>
    <a href="./7_67.php?page=<?=$i?>" style="text-decoration:none">
      <?=$i?>
    </a>
  <?php } ?>
