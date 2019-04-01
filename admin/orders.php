<?php
session_start();

if(isset($_SESSION['user']))
{
	include_once 'head.php';
	include_once 'db.php';
	


if(isset($_GET['msg']))
	echo $_GET['msg'];

echo <<<_END
	<h3>Oders</h3>
	<table cellspacing="0" border="1" width="80%">
		<tr>
			<td>S.No</td>
			<td>Date</td>
			<td>Product</td>
			<td>Price</td>
			<td>Order Status</td>
			<td>Full Name</td>
			<td>Email</td>
			<td>Phone</td>
			<td>Address</td>
			<td>City</td>
			<td>State</td>
			<td>PinCode</td>
			<td>Paymode</td>
		</tr>
_END;

$query = "SELECT id,date,price,fullname,(select name FROM product WHERE product.id=orders.pid) as pname,email,phone,address,city,state,pincode,paymode FROM orders";		//query to fetch data from db
$result = mysqli_query($db,$query);		//execution of the query


$row = mysqli_num_rows($result);		//fetching the count of rows 

if($row>0)
{
	while($r=mysqli_fetch_assoc($result))
	{
		
		echo '<tr><td> '  . $r['id'] . '</td><td>'.$r['date'].'</td><td>' . $r['pname'] . '</td><td>' .$r['price']. '</td><td></td><td>' . $r['fullname'] . '</td>
		<td>' . $r['email'] . '</td><td>' . $r['phone'] .'</td><td>'. $r['address'] .'</td><td>' . $r['city'] . '</td><td>'. $r['state'] .'</td><td>' . $r['pincode'] . '</td>
		<td>' . $r['paymode'] . '</td>
		</tr>';
	}
}

echo<<<_END
	</table>
_END;
}
else
{
	$msg = "Please login";
	echo <<<_END
<meta http-equiv='refresh' content='index.php?msg=$msg'>
_END;
}

?>