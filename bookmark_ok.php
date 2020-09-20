<?php 
include "../../common/db.php";

if(!isset($_SESSION['id'])){
  echo "<script>alert('로그인 후에 이용해주세요.'); location.href='../../login_page/login.php';</script>";
  exit;
} else {

  $id = $_SESSION['id'];
  $review_no = $_GET['review_no'];
  $sql = mq("select mem_no from members where id = '".$id."'");
  $result = $sql -> fetch_array();
  $mem_no = $result['mem_no'];
}

//즐겨찾기가 하나도 없던 사람은 테이블안에 새로 입력해줘야 하기 때문에 insert into 사용 , 기존에 등록되어 있던 사람은 추가만 해주면 되기때문에 update 사용
$sql = mq("select * from members_bookmark where membersNum ='".$mem_no."'");
$result = $sql -> fetch_array();
//기존에 bookmark table 에 db 정보가 있던 사람
if(!$result == null){
  $sql2 = mq("select * from members_bookmark where reviewNum like '%$review_no%' and membersNum = '".$mem_no."'");
  $result2 = $sql2 -> fetch_array();
  // 현재 즐겨찾기를 누른 사용자가 이미 해당 게시판을 눌렀는지 안눌렀는지를 판단하기 위한 조건 
  if($result2 == null){ 
    //해당 유저의 bookmark 리스트를 불러온다.
    $reviewNum = $result['reviewNum'];
    //불러온 데이터 값에 뒤에  "," 와 현재 페이지의 review_no를 붙혀서 다시 저장한다.
    $reviewNum .= ",".$review_no;
    $sql4 = mq("update members_bookmark set reviewNum = '".$reviewNum."' where membersNum = '".$mem_no."'");
    echo "<script>alert('즐찾되었습니다~'); history.back();</script>";
  } else {
    // 현재 회원이 즐찾한 모든 번호를 string 형태로 가져온다. (db에 이미  스트링 형태로 들어가있음)
    $reviewNum_total = $result2['reviewNum'];
    // explode(); 는 특정 문자를 기준으로 string을 나눠서 배열로 만들어준다. 
    $reviewNum_array = explode(',', $reviewNum_total);
    // array_search(); 는  array안에 해당하는 valude 값을 입력해주면 value값의 index값을 찾아준다.
    $reviewNum_key = array_search($review_no, $reviewNum_array);
    $reviewNum_empty = array_search("", $reviewNum_array);
    //unset(); 는  해당 배열의 index값을 넣어주면  그 index에 해당하는 값은 삭제시켜준다.
    unset($reviewNum_array[$reviewNum_key]);
    unset($reviewNum_array[$reviewNum_empty]);
    var_dump($reviewNum_array);
    //  implode(); 는 특정 문자를 이용해서 배열형태인 값을 일반 string으로 만들어준다.
    $reviewNum_newTotal = implode(',',$reviewNum_array);
    $sql3 = mq("update members_bookmark set reviewNum = '".$reviewNum_newTotal."' where membersNum = '".$mem_no."'");
    echo "<script>alert('즐찾이 취소되었습니다~'); history.back();</script>";
  }
} else {
  $sql2 = mq("insert into members_bookmark(membersNum, reviewNum)values('".$mem_no."', '".$review_no."' )");
  echo "<script>alert('즐찾되었습니다~'); history.back();</script>";
}

?>