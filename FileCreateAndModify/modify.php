<?php
  require_once('./lib/print.php');
  require_once('./view/top.php');
 ?>

  <a href="create.php">create</a>
  <?php if(isset($_GET['id'])){ ?>
  <a href="modify.php?id=<?=$_GET['id']?>">modify</a>
  <form action="modify_post.php" method="post">
    <input type="hidden" name="oldtitle" value="<?=$_GET['id']?>">
    <p><input type="text" name="title" placeholder="title" value="<?=print_title()?>"></p>
    <p><textarea name="description" placeholder="description"><?=print_subtitle()?></textarea></p>
    <p><input type="submit" name="submit" value="create"></p>
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
