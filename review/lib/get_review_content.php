<?php
function get_review_content($fillarray){

$string =
  
    "<div class=\"review_imformation_container\" style=\"display:flex; color:darksalmon; font-size:1.5em\">
      <div class=\"\">
        ".$fillarray['country']." > 
      </div>
      <div class=\"\">
        ".$fillarray['genre']." > 
      </div>
      <div class=\"\">
        ".$fillarray['kategorie']." > 
      </div>
      <div class=\"\">
        ".$fillarray['genre_title']."
      </div>
    </div>
    <div class=\"review_title\" style=\"display:flex; font-size:3em\">
      ".$fillarray['title']."
    </div>
    <div class=\"review_user_container\" style=\"display:flex\">
      <div class=\"review_user_id\">
      ".$fillarray['id']."
      </div>
      <div class=\"review_user_rank\">
      등급 : 신
      </div>
    </div>
    <div class=\"review_date_count_container\" style=\"display:flex; margin-bottom:30px; border-bottom:1px solid black;\">
      <div class=\"review_date\">
       ".$fillarray['review_date']."
       </div>
       <div class=\"review_count\">
       조회 ".$fillarray['view_count']."
       </div>
    </div>
    <div class=\"review_file\">
       <img src=\"http://localhost/WebTeamProject/curture_page/page/review/media/".$fillarray['file']."\" width=\"800px\" height=\"500px\">
    </div>
    <div class=\"review_description\" style=\"font-size:1.5em\">
       ".$fillarray['description']."
    </div>";

    return $string;
  }
  ?>

