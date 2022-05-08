
<div class="row">
<!-- PRODUCT-->
<?php
include'connect.php';
$idcatogry = $_GET['catogry'];
$sql = "SELECT * FROM `product` WHERE `catogry` = '$idcatogry'";
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