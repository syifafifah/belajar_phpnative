<!DOCTYPE html>
<html>
<head>
	<title>Login Admin</title>
</head>
<body>
	<h3>Login Page</h3>
	<?php
		if (isset($_GET['msg'])) {
			if ($_GET['msg'] == 'failed') {
				echo "failed login, username and password are wrong.";
			} elseif ($_GET['msg'] == 'logout') {
				echo "Logout already.";
			} elseif ($_GET['msg'] == 'nologin') {
				echo "Login first.";
			}
		}
	?>

	<form action="ceklogin.php" method="post">
		<table>
			<tr>
				<td>Username</td>
				<td>: <input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td>: <input type="text" name="password"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="Login" value="Login"></td>
			</tr>
		</table>
	</form>

</body>
</html>