<?php

	$databaseHost = 'localhost';
	$databaseName = 'belajar_phpnative';
	$databaseUsername = 'root';
	$databasePassword = '';

	$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

	if (mysqli_connect_errno()) {
		echo "Failed to connect DB: ".mysqli_connect_error();
	}
?>