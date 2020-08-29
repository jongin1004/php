<?php

  class people{

    //생성자
    function __construct(){
      echo "인간은 돈을 좋아한다.<br />";
    }

    //말하기
    function speak($word){
      echo $word."라고 말했다<br />";
    }
    
    // 걷기
    function walk($km){
      echo $km."를 걷다<br />";
    }

    //달리기
    function run($km){
      echo $km."를 달리다<br />";
    }

    //소멸자
    function __destruct(){
      echo "힘들다 <br />";
    }
  }

  //인스턴스 생성
  $people = new people;

  //메소드 사용
  $people ->speak('나는 인간이다');

?>
