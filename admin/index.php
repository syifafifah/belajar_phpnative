<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
</head>
<body>
	<h2>Halaman Admin</h2>
	<br>

	<?php
		session_start();
		if($_SESSION['status']!='login') {
			header("Location:../login.php?msg=nologin");
		}
	?>

	Selamat datang <?php echo $_SESSION['username'];?>
	<br>
	<!-- show all user -->

	<br><br>
	<a href="logout.php">Logout</a>

</body>
</html>