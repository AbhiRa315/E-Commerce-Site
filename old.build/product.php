<?php

include_once 'admin/db.php';
include_once 'head.php';

if(isset($_GET['cid']) && $_GET['cid']!='')
{
	$cid = $_GET['cid'];
	$q = "SELECT * FROM product WHERE category='$cid'";
}
else
{
	$q = "SELECT * FROM product";
}

$r = mysqli_query($db,$q);

while($res = mysqli_fetch_assoc($r))
{
	$name = $res['name'];
	$product_code = $res['product_code'];
	$price = $res['product_price'];
	$desc = $res['description'];
	
	echo '<div id="d1"><a href="ku.html"> Product Code-#'.$product_code.'<br>'.$name.'<br>'.$desc.'<br> Rs '.$price.'<img src="\project\products\kurti\1.jpg"></a></div>';
}


?>