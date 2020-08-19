<!DOCTYPE html>
<html >
<head>
  <meta charset="utf-8">
  <title></title>
  <!-- 페비콘 가져오기 -->
  <link rel="icon" type="image/png" href="../../home/imgs/favicon.png">

  <!-- 폰트 어썸 백터 아이콘 가져오기 -->
  <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
  integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
  crossorigin="anonymous" />

  <!-- 구글 폰트 가져오기 -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- HTML 속성 초기화 CSS 가져오기 -->
  <link rel="stylesheet" href="http://localhost/WebTeamProject/curture_page/home/css/default.css" />

  <!-- CSS 스타일 가져오기 -->
  <link rel="stylesheet" href="http://localhost/WebTeamProject/curture_page/home/css/style.css">
  <link rel="stylesheet" href="http://localhost/WebTeamProject/curture_page/page/review/css/review.css">
  <!-- 자바스크립트 가져오기 -->
  <script src="js/main.js" defer></script>
  <?php include "../../header/header.php"; ?>
</head>
<body>
<!-- clear : float 영역 지우기 -->


<div class="review_banner">
  <h1>R E V I E W</h1>
  <form action="./check/review_ok.php" method="post" enctype="multipart/form-data">
  <input type="submit" class="input_submit" name="submit" value="작성" >
</div>

<!--review container-->
<div class="review_main_container">
  <div class="review_use_container">
    <!--select-->
    <div class="option_box">
      <div class="select_box">
        <select name="select_country">
          <option value="" selected="">나라</option>
          <option value="한국"">한국</option>
          <option value="일본">일본</option>
          <option value="미국">미국</optioon>
          <option value="기타">기타</optioon>
        </select>
        <select name="select_genre">
          <option value="" selected="">장르</option>
          <option value="영화">영화</option>
          <option value="드라마">드라마</option>
          <option value="애니메이션">애니메이션</optioon>
          <option value="예능">예능</optioon>
        </select>
        <select name="select_kategorie">
          <option value="" selected="">카테고리</option>
          <option value="음식">음식</option>
          <option value="장소">장소</option>
          <option value="놀거리">놀거리</optioon>
        </select>
        
        <input list="browsers" name="genre_title" id="browser" placeholder="선택or검색">
          <datalist id="browsers" name="genre_title">
            <option value="백종원의골목식당">
            <option value="고독한미식가">
            <option value="무한도전">
            <option value="너의이름은">
            <option value="한것도없는데벌써3시">
            <option value="망했다">
          </datalist>

      </div>

      <div class="input_function_box">
        <div class="input_img">
          <!-- <label for="input_image">
            <i class="fas fa-image"></i>
          </label>
          <input class="input_image" type="image" name="file" value="1" />
          <p>사진</p>
          <input type="file" name="" value=""> -->
        </div>
        <input type="file" name="file">
      </div>
    </div>

    <!--title-->
    <div class="title_box">
      <textarea class="textarea_title" name="title" placeholder="제목을 입력하세요" style="height: 42px;"></textarea>
    </div>
    <!--text-area-->
    <div class="description_container">
      <textarea name="description" class="textarea_description" placeholder="500자 이내로 적어주세요"></textarea>
    </div>
    </div>
  </form>
</div>
</div>
</body>
</html>
