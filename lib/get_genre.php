<?php
function get_genre(){
 $html_tag = 
    "<nav>
    <ul class=\"nav-container\">
      <li class=\"nav-item\"><a href=\"Japan_review_page.php?genre=영화&page=1\">영화</a></li>
      <li class=\"nav-item\"><a href=\"Japan_review_page.php?genre=드라마&page=1\">드라마</a></li>
      <li class=\"nav-item\"><a href=\"Japan_review_page.php?genre=애니메이션&page=1\">애니메이션</a></li>
      <li class=\"nav-item\"><a href=\"Japan_review_page.php?genre=예능&page=1\">예능</a></li>
    </ul>
  </nav>";
  return $html_tag;
}



?>
