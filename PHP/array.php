<?php
    $class = array("ddd","asd");
    $class2 = ["ccc", "dddd"];
    var_dump($class);
    echo "<br>";
    var_dump($class2);

    echo "<br>============<br>";

    $num_list = [1, 2, 3, 4, 5];
    array_push($num_list, 6); //배열 맨 뒤에 요소 삽입
    array_unshift($num_list, 0); //배열 맨 앞에 요소 삽입
    array_shift($num_list); //배열 맨 앞에 요소 삭제
    array_pop($num_list); // 배열 맨 뒤의 요소 삭제
    rsort($num_list); // 내림차순으로 정렬
    //sort($num_list) // 오름차순으로 정렬
    var_dump($num_list);

    echo "<br>============<br>";

    //$associative_array = array("name"=>"jongin", "password"=>"1234", "test"=>4);
    $associative_array = [];
    $associative_array["name"] = "jongin";
    $associative_array["password"] = "1234";
    echo $associative_array['name'];

    echo "<br>============<br>";

    foreach ($associative_array as $key => $value) {
        echo "key : {$key}, value : {$value}<br>";
    }

?>
