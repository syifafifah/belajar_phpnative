<?php
	include_once('config.php');

	$id = $_GET['id'];

	$result = mysqli_query($mysqli, "delete from buku where id_buku = $id");

	header("Location:index.php");

?>