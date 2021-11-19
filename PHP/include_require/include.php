<?php 
    //include와 require 모두 동일한 기능을 제공해준다. 
    //차이점은 include는 불러오는 파일에 문제가 있을 경우에 warring 에러
    //require은 fatal에러, 즉 require가 더 심각한 에러를 가져옴 
    include 'greeting_ko_ns.php';
    include "greeting_en_ns.php";

    echo language\ko\welcome();
    echo language\en\welcome();
?>