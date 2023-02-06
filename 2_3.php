<?php
  // 클래스 정의 
  class User {
    // 속성
    public $name;

    // 메소드
    public function sayHello()
    {
      return "$this->name Says hello";
    }
  }

  // 인스턴트화 user 객체를 만들기 
  $user1 = new User();
  $user1->name ="jongin";

  var_dump($user1->sayHello());

  // 새로운 유저 생성
  $user2 = new User();

  echo "<br>";

  $user2->name = "jeaho";
  echo $user2->name;