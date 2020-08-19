<?php
// 쿼리문을 이용해서 fetch_array 한 값의 결과문을 배열화 하주는 부분
 function get_array($result){
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
 ?>
