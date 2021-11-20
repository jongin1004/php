<?php
    $file = '1.txt';

    if(is_writeable($file)) {
        file_put_contents($file, "put contents");
    } else {
        echo "파일 쓰기 권환이 없음";
    }
?>