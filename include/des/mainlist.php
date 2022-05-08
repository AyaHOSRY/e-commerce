<?php
include'connect.php';

?>
<!-- SHOP LISTING-->
<div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
<div class="row mb-3 align-items-center">
<div class="col-lg-6 mb-2 mb-lg-0">
<p class="text-small text-muted mb-0">Showing 4 of <?php
$sqlk = "SELECT COUNT(*) as countu FROM product";
$resu = $conn->query($sqlk);
$rowu = $resu->fetch_assoc();
$countu = $rowu['countu'];
echo $countu; ?> results</p>
</div>
<div class="col-lg-6">
<ul class="list-inline d-flex align-items-center justify-content-lg-end mb-0">
<li class="list-inline-item text-muted mr-3"><a class="reset-anchor p-0" href="#"><i class="fas fa-th-large"></i></a></li>
<li class="list-inline-item text-muted mr-3"><a class="reset-anchor p-0" href="#"><i class="fas fa-th"></i></a></li>
<ul class="list-inline-item">
  <form  onsubmit="return false;">
<select onchange="self.location.href = '?' + options[selectedIndex].value;" class="selectpicker ml-auto" name="sorting" data-width="200" data-style="bs-select-form-control" data-title="Default sorting">
  <option> Default sorting </option>
  <?php
   session_start();
   $_SESSION['sort']= $_GET['sort'];
   $_SESSION['page']= $_GET['page'];
   $pa = $_SESSION['page'];
   ?>
  <option value="sort=pop&page=<?=$pa?>">Popularity</option>
  <option value="sort=lth&page=<?=$pa?>">Price: Low to High</option>
  <option value="sort=htl&page=<?=$pa?>">Price: High to Low</option>
</select>
</form>

</ul>
</div>
</div>
<div class="row">
<!-- PRODUCT-->
<?php
if (!isset($_GET['page']) && empty($_GET['page'])) {
     $sql ="SELECT * FROM product LIMIT 4 ";
 }
 if( empty($_GET['page'])&& !empty($_GET['sort'])){

     if ($_GET['sort'] == "pop") {
    $wheres = "order by rate desc"; 
     }
     if ($_GET['sort'] == "lth") {
         $wheres = "order by `price` ASC";
     }
     if ($_GET['sort'] == "htl") {
         $wheres = "order by `price` desc";
      }
$sql ="SELECT * FROM product $wheres LIMIT 4 ";
}

//error in the firrst page because it is 0
if (!empty($_GET['page']) && empty($_GET['sort'])) {
    $page = $_GET['page'];
    $n = ($page-1)*4;
    //echo $n;
    //$offset = '$n';
    $sql= "SELECT * FROM product LIMIT 4 OFFSET $n";
}
 if(!empty($_GET['sort']) && !empty($_GET['page'])){
    $page = $_GET['page'];
    $n = ($page-1)*4;
     if ($_GET['sort'] == "pop") {
    $wheres = "order by rate desc"; 
     }
     if ($_GET['sort'] == "lth") {
         $wheres = "order by `price` ASC";
     }
     if ($_GET['sort'] == "htl") {
         $wheres = "order by `price` desc";
      }
   $sql ="SELECT * FROM product $wheres LIMIT 4 OFFSET $n";
   }
if(mysqli_query($conn, $sql)){
$result=$conn->query($sql);
while($row = $result->fetch_assoc()){
?>
<div class="col-lg-4 col-sm-6">
<div class="product text-center">
<div class="mb-3 position-relative">
<div class="badge text-white badge-"></div><a class="d-block" href="detail.php?id=<?= $row['id'];?>"><img class="img-fluid w-100" src="img/<?= $row['viewimg'];?>" alt="..."></a>
<div class="product-overlay">
<ul class="mb-0 list-inline">
<li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#"><i class="far fa-heart"></i></a></li>
<li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="cart.php?id=<?= $row['id'];?>">Add to cart</a></li>
<li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="#productView" data-toggle="modal"><i class="fas fa-expand"></i></a></li>
</ul>
</div>
</div>
<h6> <a class="reset-anchor" href="detail.php?id=<?=row['id'];?>"><?= $row['name']?></a></h6>
<p class="small text-muted">$ <?= $row['price']?></p>
</div>
</div>
<?php

}
}else{
//echo $sql;
echo mysqli_error($conn);
 }
 
?>

</div>
<!-- PAGINATION-->
<nav aria-label="Page navigation example">
<ul class="pagination justify-content-center justify-content-lg-end">
<li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
<?php
$sort = $_SESSION['sort'];
$sqlp = "SELECT count(*)/4 as counter FROM product ";
$resultp = $conn->query($sqlp);
$rowp = $resultp->fetch_assoc();
$count = $rowp['counter'];
//echo $count;
for ($i=0; $i <$count ; $i++) { 
?>
<li class="page-item active"><a class="page-link" href="?page=<?= $i+1;?>&sort=<?=$sort;?>"><?php echo $i + 1 ?></a></li>
<?php
 
}
?>

<li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
</ul>
</nav>
</div>
</div>
</div>
</section>
</div>