<?php
    header("Content-type: image/png"); //header는 항상 맨 위에 정의되어야함 (공백도 있어서는 안됨)
    $string = $_GET['text'];
    $im = imagecreatefrompng("button.png"); //이미지의 식별자 등록
    $color = imagecolorallocate($im, 60, 87, 156);
    $px = (imagesx($im) - 7.5 * strlen($string)) / 2;
    $py = (imagesy($im) - 15) / 2;
    imagestring($im, 4, $px, $py, $string, $color); // $im-컨버스, 4 - 폰트, $px/9 - x/y축 위치, $stinrg - 글자, $orange - 색
    imagepng($im); //png 형식으로 표시한다 
    imagedestroy($im); // $im 식별자를 삭제함 (자원 확보)
?>