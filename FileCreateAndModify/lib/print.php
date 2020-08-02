<?php
// 사용자가 script를 용해서 악용하는 것 을 방지하기 위한 보안 작업
// htmlspecialchars 과 strip_tags 를 이용
 function print_list(){
   $list = scandir('./content');
   for($i=2; $i<count($list); $i++){
     $title = htmlspecialchars($list[$i]);
     echo "<li><a href=\"index.php?id=$title\">$title</a></li>";
   }
 }

 //htmlspecialchars 는  html 에서 태그에 사용되는 꺽쇄(</>)를 &li라는 언어로 변경시킴
 function print_title(){
     if(isset($_GET['id'])){
     echo htmlspecialchars($_GET['id']);
   } else{
     echo "welcome php";
   }
  }

  // strip_tags 함수는 html 에서 사용하는 태그를 string 안에서 아예 삭제시켜 버림
  //basename 는 주소에서 파일명만 가져오게 하는 함수이다 그래서 경로를 표시하는 ../
  //같은 것을 삭제시켜버리기 때문에 경로를 따라 파일을 가져오는 것을 불가능하게 만들어줌
  function print_subtitle(){
    if(isset($_GET['id'])){
     $basename = basename($_GET['id']);
     $contents =strip_tags(file_get_contents('./content/'.$basename));
     echo $contents;
   } else {
     echo "hello Jongin";
   }
  }
 ?>
