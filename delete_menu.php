<?php
	// create db connection
	include_once("config/database.php");

	$id = $_GET['id'];

	$query = mysqli_query($mysqli, "DELETE FROM menus WHERE menu_id=$id");

	header('Location: index.php');

?>