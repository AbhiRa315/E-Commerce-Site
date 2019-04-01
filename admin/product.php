<?php
session_start();

if(isset($_SESSION['user']))
{
	include_once 'head.php';
	include_once 'db.php';
	
	echo <<<_END
	<h3>Add Product</h3>
	<form action="product_add.php" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Product Code</td>
				<td>:</td>
				<td><input type="text" name="product_code" placeholder="Product code"></td>
			</tr>
			<tr>
				<td>Product Name</td>
				<td>:</td>
				<td><input type="text" name="product_name" placeholder="Product Name"></td>
			</tr>
			<tr>
				<td>Price</td>
				<td>:</td>
				<td><input type="text" name="price" placeholder="Price"></td>
			</tr>
			<tr>
				<td>Description</td>
				<td>:</td>
				<td><input type="text" name="description" placeholder="Description"></td>
			</tr>
			<tr>
				<td>Image file</td>
				<td>:</td>
				<td><input type="file" name="image"></td>
			</tr>

			
			<tr>
				<td>Category</td>
				<td>:</td>
				<td>
					<select name="category">
						<option value="">--Select Category--</option>
_END;

$q1 = "SELECT * FROM category";		//query to fetch data from db
$r1 = mysqli_query($db,$q1);		//execution of the query

$row1 = mysqli_num_rows($r1);		//fetching the count of rows 

while($r = mysqli_fetch_assoc($r1))	//display results
{
	$id = $r['id'];
	$name = $r['name'];
	
	echo '<option value="'. $id .'">' . $name . '</option>';
}

echo<<<_END
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" value="Product Added"></td>
			</tr>
			
		</table>
	</form>
_END;

if(isset($_GET['msg']))
	echo $_GET['msg'];

echo <<<_END
	<h3>Products</h3>
	<table cellspacing="0" border="1" width="80%">
		<tr>
			<td>S.No</td>
			<td>Name</td>
			<td>Code</td>
			<td>Price</td>
			<td>Category</td>
			<td>Description</td>
		</tr>
_END;

$query = "SELECT id,name,product_code,product_price,(select name FROM category WHERE category.id=product.category) as category,description FROM product";		//query to fetch data from db
$result = mysqli_query($db,$query);		//execution of the query

$row = mysqli_num_rows($result);		//fetching the count of rows 

if($row>0)
{
	while($r=mysqli_fetch_row($result))
	{
		
		echo '<tr><td> '  . $r[0] . '</td><td>' . $r[1] . '</td><td>' . $r[2] . '</td><td>' .$r[3]. '</td><td>' .$r[4]. '</td><td>' . $r[5] . '</td></tr>';
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