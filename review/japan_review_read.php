<?php
  include "../common/db.php";
  include "review/lib/get_array.php";
  include "review/lib/commentWrite.php";
  include "review/lib/get_review_content.php";
  include "lib/get_genre.php";
  include "lib/make_paging.php";
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>일본페이지</title>
  <!-- 페비콘 가져오기 -->
  <link rel="icon" type="titleImg" href="../home/imgs/favicon.png">
  <link rel="stylesheet" href="curture/css/mainTextAndreviewLayout.css">

  <link rel="stylesheet" href="curture/css/curture_main.css">

  <!-- 폰트 어썸 백터 아이콘 가져오기 -->
  <script src="https://kit.fontawesome.com/08acca0d45.js" crossorigin="anonymous">
  </script>
 
  <!-- 구글 폰트 가져오기 -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="../home/css/default.css" />
  <link rel="stylesheet" href="../header/style.css">

  <!-- <script src="../home/js/main.js" defer></script> -->

  <!--고정 headere-->
  <?php include "../header/header.php"; ?>
  <style>
  .button_container{
    display:flex;
  }
  .button_container > div {
    text-align:center;
    width: 60px;
    margin: 10px;
    border:1px solid black;
    border-radius:1px;
  }
  div > a {
    width:60px;
  }
  .comment_container{
    border:1px solid black;
  }
  .review_delete{
    text-align:right;
  }
  .comment_container{
    text-align:left;
  }
  .main{
    border:1px solid black;
    width:1200px;
    margin:0 auto;
  }
  </style>
</head>
<body>
  <div class="button_container">
    <div class="">
      <a href="#">▲ 이전글</a>
    </div>
    <div class="">
      <a href="#">▼ 다음글</a>
    </div>
    <div class="">
      <a href="./japan_review_page.php?page=1">목록</a>
    </div>
  </div>
  <?php
  $sql = mq("select * from review where review_no = ".$_GET['review_no']."");
  $result = $sql -> fetch_array();
  $fillarray = get_array($result);

  // 게시글 들어올때마다 조회수가 오르도록 해놨음 .
  $count = $fillarray['view_count'];
  $count ++;
  $sql = mq("update review set view_count =".$count." where review_no = ".$_GET['review_no']."");

  ?>
  
  <!-- 게시글을 불러오는 함수  -->
  <div class="main">
    <div class="kategorie">
      <?php echo get_review_content($fillarray); ?>
    </div>

    <!-- 글쓴 사람에게만 글삭제 권한을 줄 수 있게 해주는 코드  -->
    <div class="review_delete">
    <?php
      if(isset($_SESSION['id'])){
        if($_SESSION['id'] == $fillarray['id']){?>
          <form action="./review/check/review_delete.php" method="post">
          <input type="submit" value="삭제">
          <input type="hidden" name="delete" value="<?=$fillarray['review_no']?>">
          </form>
          <?php }
          }?>
    </div>

    <!-- 현재 게시글에 달려있는 댓글을 보여주는 창과 댓글 입력하는 창 -->
    <div class="comment">
      <?php
       // 리뷰db와 댓글db를 join해서 만약 댓글이 존재한다면 댓글이 보이게 해주는 코딩
      $sql2 = mq("select * from comment, review where comment.reviewNum=review.review_no and comment.reviewNum ='".$fillarray['review_no']."'");
      $low = $sql2 ->num_rows;
      if(!$low == 0){
        for($j=1; $j<=$low; $j++){
          $result2 =$sql2 -> fetch_array();

          ?>
          <div class="comment_container">
            <div class="">
              <?=$result2['comment_id']?>
            </div>
            <div class="">
              <?=$result2['comment']?>
            </div>
            <div class="">
              <?=$result2['comment_date']?>
            </div>
          </div>
      <?php
        }
      }
      // 댓글창을 함수화 해놓은 것을 가져다가 씀
      echo commentWrite($fillarray['mem_no'],$fillarray['review_no']);
      ?>
    </div>
  </div>
</body>
</html>