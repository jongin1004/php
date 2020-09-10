<?php
  class get{
    // 쿼리문을 이용해서 fetch_array 한 값의 결과문을 배열화 하주는 부분
    function get_array_review($result){
      $array = array(
        'review_no' => $result['review_no'],
        'id' => $result['id'],
        'title' => $result['title'],
        'description' => $result['description'],
        'mem_no' => $result['memberNum'],
        'genre' => $result['genre'],
        'file' => $result['file'],
        'kategorie' => $result['kategorie'],
        'review_date' => $result['review_date'],
        'genre_title' => $result['genre_title'],
        'view_count' => $result['view_count'],
        'country' => $result['country']);
   
        return $array;
    }

    // 쿼리문을 이용해서 fetch_array 한 값의 결과문을 배열화 하주는 부분
    function get_array_user($result){
      $array = array(
        'mem_no' => $result['mem_no'],
        'id' => $result['id'],
        'password' => $result['password'],
        'gender' => $result['gender'],
        'name' => $result['name'],
        'birthday' => $result['birthday'],
        'email' => $result['email'],
        'country' => $result['country'],
        'rank' => $result['rank']);

        return $array;
    }

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
          <div class=\"review_title\" style=\"width:350px\">       
             <a type=\"button\" href=\"review_read.php?review_no=".$fillarray['review_no']."\" target=\"_top\">".$fillarray['title']."</a>
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

    function get_content_title(){

      $string =
          "<div class=\"review_review_no\" style=\"width:50px\">
          no.
          </div>
          <div class=\"review_country\" style=\"width:50px\">
          country
          </div>
          <div class=\"review_genre\" style=\"width:100px\">
          genre
          </div>
          <div class=\"review_kategorie\" style=\"width:50px\">
          kategorie
          </div>
          <div class=\"genre_title\" style=\"width:200px\">
          genre_title
          </div>
          <div class=\"review_title\" style=\"width:350px\">       
          title
          </div>
          <div class=\"review_user\" style=\"width:100px\">
          id
          </div>
          <div class=\"review_date\" style=\"width:200px\">
          review_date
          </div>
          <div class=\"view_count\" style=\"width:50px\">
          view_count
          </div>";
      
          return $string;
    }
    
    // 댓글 작성 기능 부분을 함수화 시킴
    function get_commentWrite($mem_no, $comment){
        
      $string = "<form action=\"../page/review/check/comment_ok.php\" method=\"post\">
        <input type=\"hidden\" name=\"mem_no\" value=\"$mem_no\">
        <input type=\"hidden\" name=\"review_no\" value=\"$comment\">
        <textarea name=\"comment\" rows=\"5\" cols=\"150\"></textarea>
        <input type=\"submit\" name=\"submit\" value=\"댓글\">
        </form>";
        return $string;
    }
  }
?>
