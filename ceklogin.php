<?php
	session_start();

	include 'config.php';

	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$result = mysqli_query($mysqli, "select * from admin where username = '$username' and password='$password'");

	//echo "select * from admin where username = '$username' and password='$password'";

	// jika ditemukan
	$check = mysqli_num_rows($result);

	if ($check > 0) {
		$_SESSION['username'] = $username;
		$_SESSION['status'] = 'login';

		header("Location:admin/index.php");
	} else  {
		header("Location:login.php?msg=failed");
	}
?>