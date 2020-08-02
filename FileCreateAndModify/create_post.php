<?php
  file_put_contents('content/'.$_POST['title'], $_POST['description']);
  header('Location: ./index.php?id='.$_POST['title']);
 ?>
