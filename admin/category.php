<?php
session_start();

if(isset($_SESSION['user']))
{
	include_once 'head.php';
	include_once 'db.php';
	
	echo <<<_END
	<h3>Add Category</h3>
	<form action="category_add.php" method="post">
		<table>
			<tr>
				<td>Name</td>
				<td>:</td>
				<td><input type="text" name="catname" placeholder="Category Name"></td>
			</tr>
			<tr>
				<td>Show at topnav</td>
				<td>:</td>
				<td><select name="stn"><option value="">--Select Yes/NO--</option><option value="0">No</option><option value="1">Yes</option></select></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" value="Add Category"></td>
			</tr>
		</table>
	</form>
	
	<h3>Categories</h3>
	<table cellspacing="0" border="1" width="80%">
		<tr>
			<td>S.No</td>
			<td>Name</td>
			<td>Show At Top</td>
		</tr>
_END;

$query = "SELECT * FROM category";
$result = mysqli_query($db,$query);

$row = mysqli_num_rows($result);
$c =1;
if($row>0)
{
	while($r=mysqli_fetch_row($result))
	{
		if($r[2] == 1){$status = "Yes";}else{$status="No";}
		echo '<tr><td> '  . $c . '</td><td>' . $r[1] . '</td><td>' . $status . '</td>';
		$c=$c+1;
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