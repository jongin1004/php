<?php

  class hello{

    //생성자
    function __construct($param){
      echo $param;
    }

  }

  //인스턴스 생성
  $people = new hello('say hello');
?>
