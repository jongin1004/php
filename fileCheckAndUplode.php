<?php
  function fileCheckAndUplode(){

  // 임시저장된 정보
  $myTempFile = $_FILES['file']['tmp_name'];

  // 파일 타입 및 확장자 구하기
  $fileTypeExtension = explode("/", $_FILES['file']['type']);

  // 파일 타입
  $fileType = $fileTypeExtension[0];
  // 파일 확장자
  $extension = $fileTypeExtension[1];

  //확장자가 jpg, bmp, gif, png가 아닐때
  if(!($extension == 'jpeg' || $extension == 'bmp' || $extension == 'gif' || $extension == 'png')){     
      echo "<script>alert('허용하는 확장자는 jpg, bmp, gif, png 입니다.'); history.back();</script>";
      return;
  }

  //이미지 파일이 맞는지 확인
  if ($fileType != 'image') {
    echo "<script>alert('이미지 파일이 아닙니다.'); history.back();</script>";
    return;
  }

  //저장할 파일명 생성
  $makingFileName = "user".time().rand(1,99999)."."."{$extension}";

  //move_uploaded_file에 넣기 위해 경로와 함께 생성한 파일명 대입
  $myFile = "../review_imgs/{$makingFileName}";
  $dir = "../review_imgs/";

  //디렉토리 존재 여부 확인
  if(!(is_dir($dir))){
    echo "<script>alert('해당 폴더를 열지 못했습니다.'); history.back();</script>";
    return;
  }

  //디렉토리 열기
  if(opendir($dir) == true){
    $checkFile = true;
    //디렉토리 읽기
    while(($readFile = readdir($opendir)) != false){
      //해당 파일이 있다면 변수 checkFile에 false를 대입
      if($makingFileName == $readFile){
        $checkFile = false;
        echo "해당 파일명은 이미 사용되고 있습니다.";
        break;
      }
    }
    if($checkFile == true){
      // 임시 저장된 파일을 우리가 저장할 장소 및 파일명으로 옮김
      $imageUpload = move_uploaded_file($myTempFile,$myFile);

      //업로드 성공 여부 확인
      if($imageUpload == true){
        echo '중복된 파일명이 없어 정상적으로 업로드 되었습니다. ';             
      } else {              
        echo "<script>alert('파일 업로드에 실패했습니다.'); history.back();</script>";
      }
    }
  }

  return $makingFileName;
  }
?>