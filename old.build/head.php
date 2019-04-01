<html>
<head>
		<title>Western wear</title>
		<link rel="stylesheet" type="text/css" href="main.css">
	</head>
<body>
<h1 align="center"> <img src="d1.jpg" align="middle"></h1>

		<h1 id="style2">Kurtis</h1>
		<table>
			<td> <a href="index.html"> Home </a></td>
<?php
include_once 'admin/db.php';

$q = "SELECT * FROM category WHERE showtopbar=1";
$r = mysqli_query($db,$q);

while($res=mysqli_fetch_assoc($r))
{
	$name = $res['name'];
	echo '<td><a href="">'.$name.'</a></td>';
}

?>



			<td> <a href="us.html">  About Us </a>   	 </td>
    
		</table>
<body>