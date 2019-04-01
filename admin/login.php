<?php
session_start();

include_once 'db.php';

if(isset($_SESSION['user']))
{
echo <<<_END
<meta http-equiv='refresh' content='0;url=index.php'>
_END;
}
else if(isset($_POST['user']) && isset($_POST['password']) && $_POST['user']!='' && $_POST['password']!='')
{
	$user = $_POST['user'];
	$password = $_POST['password'];
	
	$query = "SELECT * FROM userdetails WHERE username='$user' LIMIT 1";
	$result = mysqli_query($db,$query);
	if(!$result)
	{
		echo mysqli_error();
		exit;
	}
	$row = mysqli_num_rows($result);
	
	if($row>0)
	{
		$detail = mysqli_fetch_assoc($result);
		$pass = $detail['password'];
		$name = $detail['fullname'];
		
		if($pass == $password)
		{
			$_SESSION['user'] = $user;
			$_SESSION['fullname'] = $name;
			echo <<<_END
<meta http-equiv='refresh' content='0;url=index.php'>
_END;
		}
		else
		{
			$msg = "Invalid Password";
			echo <<<_END
<meta http-equiv='refresh' content='0;url=index.php?msg=$msg'>
_END;
		}
	}
	else
	{
		$msg = "User not found";
		echo <<<_END
<meta http-equiv='refresh' content='0;url=index.php?msg=$msg'>
_END;
	}
	
}
else
{
	$msg = "Please enter all the fields";
	echo <<<_END
<meta http-equiv='refresh' content='0;url=index.php?msg=$msg'>
_END;
}

?>