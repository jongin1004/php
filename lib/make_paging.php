<?php
  // include "../../common/db.php";

  function make_paging($i, $pageNum, $search_title, $genre, $kategorie){

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