<?php
// 댓글 작성 기능 부분을 함수화 시킴
function commentWrite($i, $mem_no, $comment, $genre, $kategorie){
  switch($i){
    case 1 :
    $string = "<form action=\"../page/review/check/comment_ok.php\" method=\"post\">
    <input type=\"hidden\" name=\"mem_no\" value=\"$mem_no\">
    <input type=\"hidden\" name=\"review_no\" value=\"$comment\">
    <textarea name=\"comment\" rows=\"10\" cols=\"40\"></textarea>
    <input type=\"submit\" name=\"submit\" value=\"댓글\">
    </form>";
    return $string;
    break;

    case 2 :
    $string = "<form action=\"../login/check/comment_ok.php\" method=\"post\">
    <input type=\"hidden\" name=\"mem_no\" value=\"$mem_no\">
    <input type=\"hidden\" name=\"review_no\" value=\"$comment\">
    <input type=\"hidden\" name=\"genre\" value=\"$genre\">
    <textarea name=\"comment\" rows=\"10\" cols=\"40\"></textarea>
    <input type=\"submit\" name=\"submit\" value=\"댓글\">
    </form>";
    return $string;
    break;

    case 3 :
    $string = "<form action=\"../login/check/comment_ok.php\" method=\"post\">
    <input type=\"hidden\" name=\"mem_no\" value=\"$mem_no\">
    <input type=\"hidden\" name=\"review_no\" value=\"$comment\">
    <input type=\"hidden\" name=\"kategorie\" value=\"$kategorie\">
    <textarea name=\"comment\" rows=\"10\" cols=\"40\"></textarea>
    <input type=\"submit\" name=\"submit\" value=\"댓글\">
    </form>";
    return $string;
    break;

  case 4 :
  $string = "<form action=\"../login/check/comment_ok.php\" method=\"post\">
  <input type=\"hidden\" name=\"mem_no\" value=\"$mem_no\">
  <input type=\"hidden\" name=\"review_no\" value=\"$comment\">
  <input type=\"hidden\" name=\"genre\" value=\"$genre\">
  <input type=\"hidden\" name=\"kategorie\" value=\"$kategorie\">
  <textarea name=\"comment\" rows=\"10\" cols=\"40\"></textarea>
  <input type=\"submit\" name=\"submit\" value=\"댓글\">
  </form>";
  return $string;
  break;
  }
}
 ?>
