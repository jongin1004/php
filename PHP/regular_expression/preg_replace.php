<?php
    $string = 'April 15, 2003';
    $pattern = '/(\w+) (\d+), (\d+)/i';
    $replacement = '${1} 1, $3';
    // $1 = April, $2 = 15, $3 = 2003
    echo preg_replace($pattern , $replacement, $string);
    echo "<br>";

    $string = "The quick brown fox jump";
    $patterns = [];
    $patterns[0] = "/quick/";
    $patterns[1] = "/brown/";
    $patterns[2] = "/fox/";

    $replacements = [];
    $replacements[0] = "slow";
    $replacements[1] = "black";
    $replacements[2] = "bear";

    echo preg_replace($patterns , $replacements, $string);
    echo "<br>";

    // "(19|20)" 19 or 20
    // "{1,2}" 1개 or 2개
    // "*" 있을 수도 있고, 없을 수도 있다. "\s*" 공백이 있을 수도 있고, 없을 수도 있다.
    $patterns = ["/(19|20)(\d{2})-(\d{1,2})-(\d{1,2})/", 
                "/^\s*{(\w+)}\s*=/"];
    $replace = ["$3/$4/$1$2", "$$1 ="];

    echo preg_replace($patterns, $replace, "{startDate} = 1994-10-04");
?>