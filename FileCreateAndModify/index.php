<?php
  require_once('./lib/print.php');
  require_once('./view/top.php');
 ?>

  <a href="create.php">create</a>
  <?php if(isset($_GET['id'])){ ?>
  <a href="modify.php?id=<?=$_GET['id']?>">modify</a>
  <form action="delete_php.php" method="post">
    <input type="hidden" name="id" value="<?=$_GET['id']?>">
    <input type="submit" name="submit" value="delete">

    </form>

  <?php } ?>
  </body>

    <h2>
      <?php
        print_title();
      ?>
    </h2>
    <p>
      <?php
        print_subtitle();
       ?>
    </p>
</html>
