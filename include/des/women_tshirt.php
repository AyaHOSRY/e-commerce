<?php 
include'connect.php';
if (isset($_GET['do'])) {
$idlist = $_GET['do']; 
}
?>
<!-- SHOP LISTING-->
<div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
<div class="row mb-3 align-items-center">
<div class="col-lg-6 mb-2 mb-lg-0">
<p class="text-small text-muted mb-0">Showing 4 of
<?php
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
<select onchange="self.location.href = '?do=<?=$idlist?>&' + options[selectedIndex].value;" class="selectpicker ml-auto" name="sorting" data-width="200" data-style="bs-select-form-control" data-title="Default sorting">
  <option> Default sorting </option>
  <option value="sort=pop">Popularity</option>
  <option value="sort=lth">Price: Low to High</option>
  <option value="sort=htl">Price: High to Low</option>
</select>
</form>
</ul>
</div>
</div>
<div class="row">
<!-- PRODUCT-->
<?php
$sql = "SELECT * FROM `product` WHERE `detail` = '$idlist' LIMIT 4";
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
    if ($n < 0) {
    $n = $n * -1; 
    $sql.= " OFFSET $n"; 
  }
}

if (mysqli_query($conn, $sql)) {
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
echo $sql;
echo mysqli_error($conn);
 }
 
?>

</div>
<!-- PAGINATION-->
<nav aria-label="Page navigation example">
<ul class="pagination justify-content-center justify-content-lg-end">
<li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
<?php
$sqlp = "SELECT count(*) as counter FROM product ";
$count = $rowp['counter'];
$counte = ceil($count / 4);
$resultp = $conn->query($sqlp);
$rowp = $resultp->fetch_assoc();
for ($i=0; $i <$counte ; $i++) { 
?>
<li class="page-item active"><a class="page-link" href="?page=<?= $i; ?>&do=<?=$idlist;?>"><?php echo $i + 1 ?></a></li>
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