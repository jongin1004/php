<?php
  include "../../common/db.php";
  include "../pointshop_lib/fileCheckAndUplode.php";
  
  $name = $_POST['name'];
  $price =$_POST['price'];
  $type =$_POST['type'];

  //사진이 업로드 되었을 때만 작동하도록 
  if($_FILES['file']['type'] != ""){
    //파일이 사진파일인지 확인하고 조건에 충족한다면 지정된 경로에 파일을 저장시킴 
    // 또 저장된 파일이름을 return 시켜서 그 값을 $filename 변수에 저장 (쿼리문에서 insert 할때 파일 이름을 넣어주기 위함)
    $filename =  fileCheckAndUplode();
  } 

  if(isset($_SESSION['id'])){
  $sql = mq("select * from members where id = '".$_SESSION['id']."'"); // 현제 접속중인 유저의 mem_no를 가져와서 review 테이블이 넣어주기 위해서 만든 쿼리문
  $member_no = $sql -> fetch_array();
  } else{
    echo "<script>alert('로그인을 하셔야 게시물 작성이 가능합니다.'); location.href='../../../login/login.php';</script>";
    exit;
  }
  
  if($name == null || $price ==null || $filename == null){
      echo "<script>alert('내용을 모두 기입해주세요.'); history.back();</script>";
      exit;
  }    

  //현재 review_no의 최신를 불러와서 그 다음번호부터  review_no가 차례대로 올 수있도록 해놨다. 
  $sql2 = mq("select item_no from itemshop order by item_no DESC");
  $result2 = $sql2 -> fetch_array();
  $next_no = $result2['item_no'];
  // 최신 review_no를 받아온 값을 기준으로 이어서 review_no 를 해줘야 하기 때문에 auto_increment를 새롭게 초기화 시켜준다.
  $sql3 = mq("ALTER TABLE itemshop AUTO_INCREMENT = {$next_no}");

  $sql4 = mq("insert into itemshop(item_name, item_price, item_type, item_img)
              values('{$name}','{$price}', '{$type}','{$filename}')");  

  // 글쓰기에 성공했다는 알림을 보여준 뒤에 확인을 누르면 다시 게시글 목록으로 보내주기 위함 
  if($sql4){  
      echo "<script>alert('item 등록에 성공했습니다.'); location.href='../pointshop.php';</script>";
  } else {
      echo "<script>alert('item 등록에 실패했습니다.'); history.back();</script>";
  }
 ?>
