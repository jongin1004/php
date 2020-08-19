<?php
  include "../../../common/db.php";
  $id = $_SESSION['id'];
  $review_no = $_POST['review_no'];
  $mem_no = $_POST['mem_no'];
  $comment = $_POST['comment'];

  //로그인 상태만 댓글달도록 -> 비로그인이면 로그인화면으로 보낸다.
  if($id == null){
    echo "<script>alert('댓글기능을 이용하기 위해서는 로그인이 필요합니다.'); location.href='../login.php';</script>";
  }
  //댓글에 내용을 적어야지만 댓글이 작성
  if($review_no == null ||$mem_no==null || $comment==null){
    echo "<script>alert('내용을 입력하세요~!'); location.href='../review_read.php';</script>";
  }

    $genre = $_POST['genre'];
    $sql = mq("insert into comment(comment, reviewNum, comment_id, comment_date)
            values('".$comment."', '".$review_no."','".$id."', now())");
    header("Location: ../../japan_review_read.php?review_no=$review_no");

 ?>
