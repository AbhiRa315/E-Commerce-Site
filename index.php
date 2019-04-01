<?php
include_once 'admin/db.php';
include_once 'header.php';
?>



    <!-- Page Content -->
    <div class="container">

      <!-- Jumbotron Header -->
      <header class="jumbotron my-4">
        <h1 class="display-3">Our Catalogue</h1>
        <p class="lead">Vini knows what all an individual needs to be a part of regular changing trends.</p>
        <a href="index.php" class="btn btn-primary btn-lg">View all Products</a>
      </header>

      <!-- Page Features -->
      <div class="row text-center">
	  
	  
	  
<h2>	  
<?php
$q1 = "SELECT * FROM category WHERE showtopbar=1";
$r1 = mysqli_query($db,$q1);

while($re = mysqli_fetch_assoc($r1))
{
$sn = $re['id'];
$nam = $re['name'];

echo <<<_END
<a href="index.php?catid=$sn">$nam</a> | 
_END;
}

?>
</h2>
<br>
<hr>
<br>
</div>
 <div class="row text-center">
<?php

if(isset($_GET['catid']))
{
$catid = $_GET['catid'];
$q = "SELECT * FROM product WHERE category='$catid'";
}
else
{
$q = "SELECT * FROM product";
}
$r = mysqli_query($db,$q);
$c = 0;
while($res = mysqli_fetch_assoc($r))
{
$id = $res['id'];
$name = $res['name'];
$description = $res['description'];
$price = $res['product_price'];
$image = $res['image'];
echo <<<_END
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="$image" alt="">
            <div class="card-body">
              <h4 class="card-title">$name</h4>
              <p class="card-text">$description</p>
            </div>
            <div class="card-footer">
              <a href="cart.php?id=$id" class="btn btn-primary">&#8377; $price</a>
            </div>
          </div>
        </div>

_END;

$c = $c+1;

if($c%4 == 0)
{
echo <<<_END
</div>
      <div class="row text-center">
_END;
}

}

?>


      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
<?php
include_once 'footer.php';
?>