<?php
  include "../../common/db.php";

  $review_no = $_GET['review_no'];
  if($review_no == null){
    echo "<script>alert('존재하지 않는 글입니다'); location.href='../review_read.php';</script>";
  }

  $sql4 = mq("select * from review order by review_no desc");
  $result4 = $sql4 -> fetch_array();

  $sql5 = mq("select * from members_bookmark where reviewNum like '%{$review_no}%'");
  $row = $sql5 -> num_rows;
  for($i=0; $i<$row; $i++){
    $result5 = $sql5 -> fetch_array();
    //
    $mem_no = $result5['membersNum'];
    // 현재 회원이 즐찾한 모든 번호를 string 형태로 가져온다. (db에 이미  스트링 형태로 들어가있음)
    $reviewNum_total = $result5['reviewNum'];
    // explode(); 는 특정 문자를 기준으로 string을 나눠서 배열로 만들어준다. 
    $reviewNum_array = explode(',', $reviewNum_total);
    // array_search(); 는  array안에 해당하는 valude 값을 입력해주면 value값의 index값을 찾아준다.
    $reviewNum_key = array_search($review_no, $reviewNum_array);
    //unset(); 는  해당 배열의 index값을 넣어주면  그 index에 해당하는 값은 삭제시켜준다.
    unset($reviewNum_array[$reviewNum_key]);
    //  implode(); 는 특정 문자를 이용해서 배열형태인 값을 일반 string으로 만들어준다.
    if($review_no != $result4['review_no']){
      for($j=0; $j<count($reviewNum_array); $j++){
        $reviewNum_array[$j]--;
      }
    }
    $reviewNum_newTotal = implode(',',$reviewNum_array);

    $sql5 = mq("update members_bookmark set reviewNum = '".$reviewNum_newTotal."' where membersNum = '".$mem_no."'");
  }
    //review 지우기 위한 쿼리문
    $sql = mq("delete from review where review_no = '".$review_no."'");  
    //  // review과 연동된 comment 지우기 위한 쿼리문
    $sql2 = mq("delete from comment where reviewNum = '".$review_no."'"); 
    // AUTO_INCREMENT 를 초기화해서 review_no를 다시 재배열 시켜준다
    // 글을 삭제하면 review_no가 흐트러지기 때문에 다시 정렬해줘야만 깔끔한 게시글 번호가 된다.
    $sql3 = mq("SET @COUNT = 0");
    $sql3 = mq("UPDATE review SET review_no = @COUNT:=@COUNT+1");
    // 최신글의 review_no를 가져오기 위함 -> 뒤에 if 조건문에서 사용하기 위함 
    

   
    if($sql && $sql2 && $sql5){
      echo "<script>alert('삭제 되었습니다.'); location.href='../review_page.php?page=1';</script>";
      
    } else {
      echo "<script>alert('삭제 실패'); history.back();</script>";
    }


 ?>
