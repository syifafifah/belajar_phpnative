<?php
// create db connection
include_once("config.php");

//fetch all books data
$result = mysqli_query($mysqli, "select * from buku");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
</head>
<body>
	<a href="add.php">Add new book</a>
	<p>Staging</p>
	<table border="1">
		<tr>
			<td>No.</td>
			<td>Name</td>
			<td>Description</td>
			<td>Totals</td>
			<td>Actions</td>
		</tr>
		<?php
		$i = 1;
		while ($data = mysqli_fetch_array($result)) {
			echo "<tr>";
				echo "<td>".$i."</td>";
				echo "<td>".$data['nama_buku']."</td>";
				echo "<td>".$data['desc_buku']."</td>";
				echo "<td>".$data['jumlah']."</td>";
				echo "<td><a href='edit.php?id=$data[id_buku]'>Edit</a> | <a href='delete.php?id=$data[id_buku]'>Delete</a></td>";
			echo "</tr>";
		}
		?>
	</table>
</body>
</html>
