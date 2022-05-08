//array_replace($wheres, $x);
//$wheres = implode("", $wheres);
     

///
/*if (!isset($_GET['page']) || isset($_GET['sort'])) {
  if (isset($_GET['sort'])) {
    if ($_GET['sort'] == "pop") {
    $x= "order by `rate` desc";
     }
    if ($_GET['sort'] == "lth") {
    $x= "order by `price` ASC";
     }
if ($_GET['sort'] == "htl") {
    $x= "order by `price` desc";
}*/

  //  }
    
    
//}
/*elseif (isset($_GET['page'])) {
    $page = $_GET['page'];
    $n = ($page)*4;
    $sql ="SELECT * FROM `product` LIMIT 4";
    /*if ($page == 0 && $n < 0) {
    $sql.= " OFFSET 0";
    }elseif ($page == 1 && $n == 0) {
        $sql.= " OFFSET 4";
    }else{
    
    $sql.= " OFFSET $n";
   // }
}*/
/*$sql ="SELECT * FROM `product`";
if (isset($_GET['sort'])) {
    if ($_GET['sort'] == "pop") {
    $sql.= " order by `rate` desc";
}
if ($_GET['sort'] == "lth") {
    $sql.= " order by `price` ASC";
}
if ($_GET['sort'] == "htl") {
    $sql.= " order by `price` desc";
}
    }
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $n = ($page-1)*4;
    if ($n < 0 ) {
   $n = $n * -1;
     $sql.= " LIMIT 4 OFFSET $n";
    }if ($n === 0) {
    $n = 4;}
    
    $sql.= " LIMIT 4 OFFSET $n"; 
  
}
};*/
if (!isset($_GET['sort']) ) {
$wheres = 'order by datee DESC';
$sql ="SELECT * FROM product $wheres LIMIT 4";
}elseif (isset($_GET['sort'])) {
if ($_GET['sort'] == "pop") {
    $wheres = "order by rate desc"; 
}
if ($_GET['sort'] == "lth") {
    $wheres = "order by `price` ASC";
}
if ($_GET['sort'] == "htl") {
    $wheres = "order by `price` desc";
}
$sql ="SELECT * FROM product $wheres LIMIT 4";
}