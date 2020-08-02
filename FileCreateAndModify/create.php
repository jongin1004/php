<?php
  require_once('./lib/print.php');
  require_once('./view/top.php');
 ?>

  <a href="create.php">create</a>
  <form action="create_post.php" method="post">
    <p><input type="text" name="title" placeholder="title"></p>
    <p><textarea name="description" placeholder="description"></textarea></p>
    <p><input type="submit" name="submit" value="create"></p>
  </form>
  </body>

</html>
