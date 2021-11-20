<?php
    // "/"는 구분자로써 PHP의 정규표현식은 구부자로 시작해서 구분자로 끝나야한다.
    // 보통은 "/"를 구분자로 사용하지만, 알파벳과 백슬러쉬, 공백이 아닌 문자도 사용가능 (#, +, % 등등) 
    // 사용이유는 정규표현식 부분과 아닌부분을 구분해주기 위함이다. 
    // "i"는 대소문자 구분을 안하겠다는 의미고, 패턴을 수정해주는 부분
    // 그 밖에도, "m"- 멀티라인, 여러줄에서 다중으로 선택하고 싶은 경우
    if (preg_match("/php/i", "PHP is the web scription language of choice.")) {
        echo "A match was found.<br>";        
    } else {
        echo "A match was not found.<br>";
    }


    // \b는 단어의 경계를 의미한다. "\bweb"은 web 앞에 빈 칸이 있어야함을 가르킴
    // "\bweb\b"는 web 양쪽에 빈 칸이 있어야한다. -> 다른 문자와 결합된 형태가 아닌 web 단독으로 이루어진 문자가 있는지 확인
    if (preg_match("/\bweb\b/i", "PHP is the web scription language of choice.")) {
        echo "A match was found.<br>";        
    } else {
        echo "A match was not found.<br>";
    }

    //web과 site가 결합된 website이므로 검색되지 않음 
    if (preg_match("/\bweb\b/i", "PHP is the website scription language of choice.")) {
        echo "A match was found.<br>";        
    } else {
        echo "A match was not found.<br>";
    }

    $subject = 'coding everbody http://naver.com jongin@naver.com 010-1234-5678';
    //$match는 따로 선언해주지 않아도 된다. 또한 이름도 match가 아니여도 된다.
    //preg_match()를 통해 검색된 단어를 match라는 변수에 array로 결과를 넘겨준다.
    preg_match('~(http://\w+\.\w+)\s(\w+@\w+\.\w+)~', $subject, $match); 
    // "/"로 구분자를 하지 않은 이유는 http://에서 //와 겹치기 때문
    // "\w"가 의미하는 것은 문자를 의미한다. 
    // "+"는 한개가 아닌, 여러개를 선택
    // "." -> "\." -> "."는 아무 문자나 다 선택하는 것, 근데 그렇게 하는 것 보다는, "\."를 이용해서 URL의 "."임을 정확하게 명시
    // "\s" 공백
    // "()" ()로 묶인 부분은 독립된 데이터로 추출해낼 수 있다. 배열에서 하나의 원소가 아닌, 여러개의 원소로 받을 수 있음 
    echo "homepage :".$match[1];
    echo "<br>";
    echo "email :".$match[2];
    echo "<br>";

    preg_match("@^(?:http://)?([^/]+)@i", "http://www.php.net/index.html", $matches);
    // "^" 경계를 의미해서,문자열의 시작 지점을 의미한다. "^http" http로 시작하는 부분을 검색한다.
    // "?" 0~1, ()?로 사용될 경우 ()부분이 있다면, 1개만 나오도록
    //"?:" ()안에서 ?:가 쓰일 경우에는, ()부분에 검색된 내용은 $matches 결과에 포함시키지 않겠다는 의미
    // "[^]" 대괄호 안에서의 ^는 not을 의미한다. "^/"는 /가 아닌 나머지를 가르키게 됨
    print_r($matches);
    echo "<br>";
    $host = $matches[1];

    preg_match("/[^.]+\.[^.]+$/", $host, $matches);    
    // "$" 는 문자열의 끝을 의미 
    // "[^.]"  대괄호 안에서의 "."는 모든 문자를 가르키는 것이 아닌 그냥 "." 즉 "\."과 같은 의미
    echo "domain name is : {$matches[0]}\n";
    echo "<br>";

    $str = 'foobar: 2008';
    preg_match("/(?P<name>\w+):\s(?P<digit>\d+)/", $str, $matches);
    // "\d" 숫자를 의미 
    // "?P<ooo>" $matches에 검색결과를 저장할 때, 특정 index로 저장할 수 있음 "?P<name>"으로하면 "name"인덱스로 저장이됨
    print_r($matches);
?> 