<?php 
    $a = 0;    
    while($a < 10) {
        echo $a;
        echo "<br>";
        $a += 1;
    }

    echo "-------------<br>";

    for($i = 0; $i < 10; $i ++) {
        echo "hello world{$i}<br>";        
    }

    echo "-------------<br>";

    for($i = 0; $i < 10; $i ++) {
        if($i === 4) {
            continue;
        } else if ($i === 7) {
            break;
        }        

        echo "hello world{$i}<br>";        
    }
    
?> 