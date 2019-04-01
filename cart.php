<?php

include_once 'header.php';
include_once 'admin/db.php';

if(isset($_GET['id']))
{
$pid = $_GET['id'];

$q = "SELECT * FROM product WHERE id='$pid'";
$r = mysqli_query($db,$q);

$res = mysqli_fetch_assoc($r);

$name = $res['name'];
$desc = $res['description'];
$price = $res['product_price'];
$image = $res['image'];


}


echo <<<_END
<div class="container">
	<div class="row my-4">
        <div class="col-lg-8">
          <img class="img-fluid rounded" src="$image" alt="">
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">
          <h1>$name</h1>
          <p>$desc</p>
          <a class="btn btn-primary btn-lg" href="checkout.php?id=$pid">&#8377; $price</a>
        </div>
        <!-- /.col-md-4 -->
      </div>

</div>

_END;

include_once 'footer.php';

?>