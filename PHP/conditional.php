<?php
    if(true) {
        echo "true";
    }
    echo "<br>";

    if(false) {
        echo "false";
    } else if (true) {
        echo "else if 1";
    } else if (true) {   // else if는 전에 if문이나 else if문이 false일 경우(실행되지 않을 경우)만 해석을 한다. -> 현재 위의 else if문이 true로 실행 됐기 때문에, 이 부분은 해석이 되지않고 if문이 종료
        echo "else if 2";
    } else {
        echo "else";
    }
?>