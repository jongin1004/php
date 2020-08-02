<?php
  rename('./content/'.$_POST['oldtitle'],'./content/'.$_POST['title']);
  file_put_contents('./content/'.$_POST['title'],$_POST['description']);
  header('Location: ./index.php?id='.$_POST['title']);
 ?>
