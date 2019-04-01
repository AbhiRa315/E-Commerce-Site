<?php
session_start();

if(isset($_SESSION['user']))
{
	include_once 'db.php';
	
	if(isset($_POST['product_code']) && isset($_POST['product_name']) && isset($_POST['price']) && isset($_POST['description']) && isset($_POST['category']) && $_POST['product_code']!='' && $_POST['product_name']!='' && $_POST['price']!='' && $_POST['description']!='' && $_POST['category']!='')
	{
		$product_code = $_POST['product_code'];
		$product_name = mysqli_real_escape_string($db,$_POST['product_name']);
		$price = $_POST['price'];
		$description = mysqli_real_escape_string($db,$_POST['description']);
		$category = $_POST['category'];
		
		$query = "INSERT INTO product(name,product_code,product_price,description,category) VALUES('$product_name','$product_code','$price','$description','$category')";
		$result = mysqli_query($db,$query);
		if(!$result){
			echo mysqli_error($db);
		}
		$image_id = mysqli_insert_id($db);
		
		if(isset($_FILES['image']))
{
$errors= array();
$file_name = $_FILES['image']['name'];
$file_size =$_FILES['image']['size'];
$file_tmp =$_FILES['image']['tmp_name'];
$file_type=$_FILES['image']['type'];
$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
$expensions= array("jpeg","jpg","png");
if(in_array($file_ext,$expensions)=== false)
{
$errors[]="extension not allowed, please choose a JPEG or PNG file.";
}
if($file_size > 2097152)
{
	$errors[]='File size must be less than 2 MB';
}
if(empty($errors)==true)
{
move_uploaded_file($file_tmp,"../uploads/".$file_name);

$image = "../uploads/" . $image_id . "." . $file_ext;

rename("../uploads/".$file_name,$image);
$img = "uploads/" . $image_id . "." . $file_ext;
$q1 = "UPDATE product SET image='$img' WHERE id='$image_id'";
$r1 = mysqli_query($db,$q1);
}

}

		$msg = "Product Added";
		echo <<<_END
<meta http-equiv='refresh' content='0;url=product.php?msg=$msg'>
_END;
	}
	else
	{
		$msg = "Enter all the fields";
		echo <<<_END
<meta http-equiv='refresh' content='0;url=product.php?msg=$msg'>
_END;
	}
}
else
{
	$msg = "Please login";
	echo <<<_END
<meta http-equiv='refresh' content='0;url=index.php?msg=$msg'>
_END;
}

?>