<?php
/*
* Using mysqli for database connection
*/

$dbHostname = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "devlab";

$mysqli = mysqli_connect($dbHostname, $dbUsername, $dbPassword, $dbName);

if(mysqli_connect_error()) {
	echo "Gagal konek ke database: ".mysqli_connect_error();
}

?>