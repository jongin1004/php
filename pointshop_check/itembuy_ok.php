<?php
include "../../common/db.php";

if(!isset($_SESSION['id'])){
  echo "<script>alert('로그인 후에 이용해주세요'); location.href='../../login_page/login.php';</script>";
} else {
  $mem_id = $_SESSION['id'];
}
$sql = mq("select * from members where id = '$mem_id' ");
$result = $sql -> fetch_array();

$mem_no = $result['mem_no'];
$mem_point = $result['point'];
$item_no = $_POST['item_no'];
$price = $_POST['item_price'];
$buied_item_num = $result['buied_item_num'];

//상품 가격과 회원의 point를 비교해서 구매할 수 있을지  없을지 판단
if($mem_point < $price){
 if($buied_item_num == null){
  $sql2 = mq("update members set buied_item_num = '".$item_no."' where mem_no = '".$mem_no."'");
  echo "<script>alert('구매가 완료 되었습니다. 구매한 아이템은 마이페이지에서 확인 가능합니다.'); history.back();</script>";
 } else {
  // 불러온 데이터 값에 뒤에  "," 와 현재 페이지의 item_no를 붙혀서 다시 저장한다.
  $buied_item_num.= ",".$item_no;
  $sql2 = mq("update members set buied_item_num = '".$buied_item_num."' where mem_no = '".$mem_no."'");
  echo "<script>alert('구매가 완료 되었습니다. 구매한 아이템은 마이페이지에서 확인 가능합니다.'); history.back();</script>";
 } 
}else {
  echo "<script>alert('포인트가 부족합니다.'); history.back();</script>";
}

?>