<?php    
    $stamp = imagecreatefrompng("text.png");
    $im = imagecreatefrompng("original.png"); //이미지의 식별자 등록

    $marge_right = 20;
    $marge_bottom = 20;
    $sx = imagesx($stamp);
    $sy = imagesy($stamp);

    imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, $sx, $sy);
    
    header("Content-type: image/png");
    imagepng($im); //png 형식으로 표시한다 
    imagedestroy($im); // $im 식별자를 삭제함 (자원 확보)    
?>