<?php


include_once 'admin/db.php';

if(isset($_POST['pid']) && isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['pincode']) && isset($_POST['paymode']) && $_POST['pid']!='' && $_POST['fullname']!='' && $_POST['email']!='' && $_POST['phone']!='' && $_POST['address']!='' && $_POST['city']!='' && $_POST['state']!='' && $_POST['pincode']!='' && $_POST['paymode']!='')
{
$pid = $_POST['pid'];

$fullname = mysqli_real_escape_string($db,$_POST['fullname']);
$email = mysqli_real_escape_string($db,$_POST['email']);
$phone = mysqli_real_escape_string($db,$_POST['phone']);
$address = mysqli_real_escape_string($db,$_POST['address']);
$city = mysqli_real_escape_string($db,$_POST['city']);
$state = mysqli_real_escape_string($db,$_POST['state']);
$pincode = mysqli_real_escape_string($db,$_POST['pincode']);
$paymode = mysqli_real_escape_string($db,$_POST['paymode']);



$q = "SELECT * FROM product WHERE id='$pid'";
$r = mysqli_query($db,$q);

$res = mysqli_fetch_assoc($r);

$name = $res['name'];
$desc = $res['description'];
$price = $res['product_price'];
$image = $res['image'];

$q1 = "INSERT INTO orders(price,fullname,email,phone,address,city,state,pincode,paymode,pid) VALUES('$price','$fullname','$email','$phone','$address','$city','$state','$pincode','$paymode','$pid')";
$r1 = mysqli_query($db,$q1);
echo $q1;
if(!$r1)
{
echo mysqli_error($db);
}
$orderid =  mysqli_insert_id($db);

echo <<<_END
<meta http-equiv='refresh' content='0;url=orderplaced.php?orderid=$orderid'>
_END;


}
else
{
$pid = $_POST['pid'];
$msg = "Please enter all the fields";
echo <<<_END
<meta http-equiv='refresh' content='0;url=checkout.php?id=$pid&msg=$msg'>
_END;
}






?>