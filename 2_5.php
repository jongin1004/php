<?php
  class User {
    private $name;
    private $age;

    public function __construct($name, $age) {
      $this->name = $name;
      $this->age  = $age;
    }

    public function getName()
    {
      return $this->name;
    }

    public function setName($name)
    {
      $this->name = $name;
    }

    // __get MAGIC METHOD
    public function __get($property)
    {
      if (property_exists($this, $property)) {
        return $this->$property;
      }
    }

    public function __set($property, $value)
    {
      if (property_exists($this, $property)) {
        $this->$property = $value;
      }
    }
  }


  $user1 = new User("jongin", 29);

  // $user1->setName("jongin2");
  $user1->__set("name", "jongin2");
  echo $user1->__get("name");

  // echo $user1->name;
  // echo "<br>";