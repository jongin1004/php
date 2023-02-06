<?php
  class User {
    public $name;
    public $age;

    // 인스턴스가 생성되는 경우 자동으로 실행
    public function __construct($name, $age)
    {
      echo "Class " . __CLASS__ . " instantiated";
      echo "<br>";
      $this->name = $name;
      $this->age  = $age;
    }

    public function sayHello() 
    {
      return "$this->name Says Hello";
    }

    // 아무도 참조하지 않는 경우에 실행된다.
    // 데이터베이스의 연결을 종료하는데 사용한다. 
    public function __destruct()
    {
      echo "$this->name, destructor";
    }
  }


  $user1 = new User("jongin", 29);

  echo $user1->name;

  echo "<br>";

  echo $user1->age;

  echo "<br>";

  $user2 = new User("jeaho", 30);

  echo $user2->name;

  echo "<br>";

  echo $user2->age;

  echo "<br>";