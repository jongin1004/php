<?php
function get_content($fillarray){

$string =
    "<div class=\"review_review_no\" style=\"width:50px\">
    ".$fillarray['review_no']."
    </div>
    <div class=\"review_country\" style=\"width:50px\">
    ".$fillarray['country']."
    </div>
    <div class=\"review_genre\" style=\"width:100px\">
       ".$fillarray['genre']."
    </div>
    <div class=\"review_kategorie\" style=\"width:50px\">
      ".$fillarray['kategorie']."
    </div>
    <div class=\"genre_title\" style=\"width:200px\">
     ".$fillarray['genre_title']."
    </div>
    <div class=\"review_review_no\" style=\"width:400px\">
       <a href=\"japan_review_read.php?review_no=".$fillarray['review_no']."\">".$fillarray['title']."</a>
    </div>
    <div class=\"review_user\" style=\"width:100px\">
      ".$fillarray['id']."
    </div>
    <div class=\"review_date\" style=\"width:200px\">
       ".$fillarray['review_date']."
    </div>
    <div class=\"view_count\" style=\"width:50px\">
      ".$fillarray['view_count']."
    </div>";

    return $string;
  }
  ?>

