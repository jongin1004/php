<?php
    $file = "1.txt";
    $newfile = "new_1.txt";

    if( !copy($file, $newfile)) {
        echo "카피 실패!";
    }
?>
