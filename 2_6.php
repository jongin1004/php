<?php
  class User {
    protected $name = "jongin";
    protected $age;

    public function __construct($name, $age)
    {
      $this->name = $name;
      $this->age  = $age;
    }
  }

  // extends를 이용해서 상속을 받는다
  class Customer extends User {
    private $balance;

    public function __construct($name, $age, $balance)
    {
      // parent::를 이용해서, 부모 클래스에 접근
      // $name, $age는 User클래스의 생성자에서 초기화하고 있기 때문에 부모 클래스를 사용
      parent::__construct($name, $age);
      $this->balance = $balance;
    }

    public function pay($amount)
    {
      // name속성은 User클래스의 속성값이지만,
      // protected로 접근이 선언되어있기 때문에, 상속받은 Customer에서도 접근이 가능하다.      
      return "$this->name paid $$amount";
    }

    public function __get($property)
    {
      if (property_exists($this, $property)) {
        return $this->$property;
      }
    }
  }

  $customer = new Customer("jongin2", 29, 100);

  echo $customer->pay(100);
  echo "<br>";
  echo $customer->__get("balance");