<?php 
include'include/des/navmenu.php';
?>
<!--Modal -->
<div class="modal fade" id="productView" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-body p-0">
<div class="row align-items-stretch">
<div class="col-lg-6 p-lg-0"><a class="product-view d-block h-100 bg-cover bg-center" style="background: url(img/product-5.jpg)" href="img/product-5.jpg" data-lightbox="productview" title="Red digital smartwatch"></a><a class="d-none" href="img/product-5-alt-1.jpg" title="Red digital smartwatch" data-lightbox="productview"></a><a class="d-none" href="img/product-5-alt-2.jpg" title="Red digital smartwatch" data-lightbox="productview"></a></div>
<div class="col-lg-6">
<button class="close p-4" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
<div class="p-5 my-md-4">
<ul class="list-inline mb-2">
<li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
<li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
<li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
<li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
<li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
</ul>
<h2 class="h4">Red digital smartwatch</h2>
<p class="text-muted">$250</p>
<p class="text-small mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</p>
<div class="row align-items-stretch mb-4">
<div class="col-sm-7 pr-sm-0">
<div class="border d-flex align-items-center justify-content-between py-1 px-3"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
<div class="quantity">
<button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
<input class="form-control border-0 shadow-0 p-0" type="text" value="1">
<button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
</div>
</div>
</div>
<div class="col-sm-5 pl-sm-0"><a class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0" href="cart.html">Add to cart</a></div>
</div><a class="btn btn-link text-dark p-0" href="#"><i class="far fa-heart mr-2"></i>Add to wish list</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="container">
<!-- HERO SECTION-->
<section class="py-5 bg-light">
<div class="container">
<div class="row px-4 px-lg-5 py-lg-4 align-items-center">
<div class="col-lg-6">
<h1 class="h2 text-uppercase mb-0">Shop</h1>
</div>
<div class="col-lg-6 text-lg-right">
<nav aria-label="breadcrumb">
<ol class="breadcrumb justify-content-lg-end mb-0 px-0">
<li class="breadcrumb-item"><a href="index.php">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Shop</li>
</ol>
</nav>
</div>
</div>
</div>
</section>
<section class="py-5">
<div class="container p-0">
<div class="row">
<!-- SHOP SIDEBAR-->
<div class="col-lg-3 order-2 order-lg-1">
<h5 class="text-uppercase mb-4">Categories</h5>
<div class="py-2 px-4 bg-dark text-white mb-3"><strong class="small text-uppercase font-weight-bold">Fashion &amp; Acc</strong></div>
<?php
include'connect.php';
$sql ="SELECT * FROM `detailcat` WHERE `catid`=1";
if (mysqli_query($conn, $sql)) {
 $result=$conn->query($sql);
while($row = $result->fetch_assoc()){
?>
<ul class="list-unstyled small text-muted pl-lg-4 font-weight-normal">
<li class="mb-2"><a class="reset-anchor" href="?do=<?= $row['id'];?>"><?=$row['name'];?></a></li>
</ul>
<?php
}
}else{
echo $sql;
echo mysqli_error($conn);
}
?>
<div class="py-2 px-4 bg-dark text-white mb-3"><strong class="small text-uppercase font-weight-bold">Health &amp; Beauty</strong></div>
<ul class="list-unstyled small text-muted pl-lg-4 font-weight-normal">
<?php
$sqlh ="SELECT * FROM `detailcat` WHERE `catid`=2";
if (mysqli_query($conn, $sqlh)) {
 $resulth=$conn->query($sqlh);
while($rowh = $resulth->fetch_assoc()){
?>
<li class="mb-2"><a class="reset-anchor" href="?do=<?= $rowh['id'];?>"><?=$rowh['name'];?></a></li>
<?php
}
}else{
echo $sql;
echo mysqli_error($conn);
}
?>
</ul>
<div class="py-2 px-4 bg-dark text-white mb-3"><strong class="small text-uppercase font-weight-bold">Electronics</strong></div>
<ul class="list-unstyled small text-muted pl-lg-4 font-weight-normal mb-5">
<?php
$sqle ="SELECT * FROM `detailcat` WHERE `catid`=3";
if (mysqli_query($conn, $sqle)) {
 $resulte=$conn->query($sqle);
while($rowe = $resulte->fetch_assoc()){
?>
<li class="mb-2"><a class="reset-anchor" href="?do=<?= $rowe['id'];?>"><?=$rowe['name'];?></a></li>
<?php
}
}else{
echo $sql;
echo mysqli_error($conn);
 }
 mysqli_close($conn);
?>
</ul>
<h6 class="text-uppercase mb-4">Price range</h6>
<div class="price-range pt-4 mb-5">
<div id="range"></div>
<div class="row pt-2">
<div class="col-6"><strong class="small font-weight-bold text-uppercase">From</strong></div>
<div class="col-6 text-right"><strong class="small font-weight-bold text-uppercase">To</strong></div>
</div>
</div>

</div>
<!--main list-->
<?php


if (!isset($_GET['do'])) {
  include 'include/des/mainlist.php';
}

if (isset($_GET['do']) ) {
include 'include/des/women.php';
}
?>
    

<?php
include 'include/des/footer.php';

?>