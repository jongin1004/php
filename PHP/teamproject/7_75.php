<?php

  $pattern = '/^(010)-[0-9]{4}-[0-9]{4}$/';
  $myname ="010-6230-1141";

  echo preg_match($pattern, $myname, $matches);
  
?>
