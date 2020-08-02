<?php
  unlink('content/'.basename($_POST['id']));
  header('Location: ./index.php');
 ?>
