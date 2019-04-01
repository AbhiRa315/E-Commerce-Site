<?php
session_start();

if(isset($_SESSION['user']))
{
	include_once 'db.php';
	
	if(isset($_POST['catname']) && isset($_POST['stn']) && $_POST['catname']!='' && $_POST['stn']!='')
	{
		$catname = $_POST['catname'];
		$stn = $_POST['stn'];
		
		$query = "INSERT INTO category(name,showtopbar) VALUES('$catname','$stn')";
		$result = mysqli_query($db,$query);
		
		$msg = "Category Added";
		echo <<<_END
<meta http-equiv='refresh' content='0;url=category.php?msg=$msg'>
_END;
	}
	else
	{
		$msg = "Enter all the fields";
		echo <<<_END
<meta http-equiv='refresh' content='0;url=category.php?msg=$msg'>
_END;
	}
}
else
{
	$msg = "Please login";
	echo <<<_END
<meta http-equiv='refresh' content='0;url=index.php?msg=$msg'>
_END;
}?>