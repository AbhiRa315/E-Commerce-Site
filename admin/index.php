<?php
session_start();

if(isset($_SESSION['user']))
{

include_once 'head.php';

echo 'You are logged in. Welcome ' . $_SESSION['fullname'];
}
else
{
	echo <<<_END
	<html>
		<head><title>Login</title></head>
		<body>
			<form action="login.php" method="post">
				<table>
					<tr>
						<td>Username</td>
						<td>:</td>
						<td><input type="text" name="user" placeholder="Username"></td>
					</tr>
					<tr>
						<td>Password</td>
						<td>:</td>
						<td><input type="password" name="password" placeholder="Password"></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td><input type="submit" value="Login"></td>
					</tr>
				</table>
			</form>
		</body>
	</html>
_END;
}

?>