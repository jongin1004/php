<?php
  // include "../../common/db.php";

  function make_paging($i, $pageNum, $search_title, $genre, $kategorie){
    // 게시판 페이지에 처음 들어왔을 경우에는 page 가 존재하지 않으니까 오류가 나오는것을 방지하기 위해서 조건별로 if문을 주었다. 
    //아무것도 선택이 안되어 있을 경우 
    if ($pageNum == "" && $genre == "" && $kategorie =="") { return mq("select * from review order by review_no DESC limit 0,5");}
    // genre만 선택된 경우
    if ($pageNum == "" && $kategorie =="") { return mq("select * from review where genre = '".$genre."' order by review_no DESC limit 0,5");}
    // kategorie만 선택된 경우
    if ($pageNum == "" && $genre == "") { return mq("select * from review where kategorie = '".$kategorie."' order by review_no DESC limit 0,5");}
    // genre 와 kategorie 둘다 선택 된 경우
    if ($pageNum == "") { return mq("select * from review where genre ='".$genre."' and kategorie = '".$kategorie."' order by review_no DESC limit 0,5");}
    

    //모든 경우 마다 
    $criteria = ($pageNum-1)*5;
    switch($i){
      case 1:
        $sql = mq("select * from review where title like '%".$search_title."%' order by review_no DESC limit $criteria,5");

        return $sql;
        break;
      
      case 2:
        $sql = mq("select * from review order by review_no DESC limit $criteria,5");
  
        return $sql;
        break;

      case 3:
        $sql = mq("select * from review where genre = '".$genre."' 
        and title like '%". $search_title."%' order by review_no DESC limit $criteria,5");
    
        return $sql;
        break;

      case 4:
        $sql = mq("select * from review where genre = '".$genre."' order by review_no DESC limit $criteria,5");
      
        return $sql;
        break;

      case 5:
        $sql = mq("select * from review where kategorie = '".$kategorie."' 
        and title like '%".$search_title."%' order by review_no DESC limit $criteria,5");
        
        return $sql;
        break;

      case 6:
        $sql = mq("select * from review where kategorie = '".$kategorie."' order by review_no DESC limit $criteria,5");
          
        return $sql;
        break;

      case 7:
        $sql = mq("select * from review where kategorie = '".$kategorie."' 
        and genre = '".$genre."' and title like '%".$search_title."%' order by review_no DESC limit $criteria,5");
            
        return $sql;
        break;

      case 8:
        $sql = mq("select * from review where kategorie = '".$kategorie."' 
        and genre = '".$genre."' order by review_no DESC limit $criteria,5");
            
        return $sql;
        break;
      }
  }
?>