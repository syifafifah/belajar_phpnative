<!DOCTYPE html>
<html>
<head>
	<title>Add Item</title>
</head>
<body>
	<a href="index.php">Go to Home</a>
	<br>

	<form action="add.php" method="post" name="form1">
		<table>
			<tr>
				<td>Nama Buku</td>
				<td>: <input type="text" name="nama_buku"></td>
			</tr>
			<tr>
				<td>Deskripsi Buku</td>
				<td>: <input type="text" name="desc_buku"></td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td>: <input type="number" name="jumlah"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>

	<?php
		if (isset($_POST['Submit'])) {
			$nama_buku = $_POST['nama_buku'];
			$desc_buku = $_POST['desc_buku'];
			$jumlah = $_POST['jumlah'];

			include_once('config.php');

			// insert data
			$result = mysqli_query($mysqli, "insert into buku(nama_buku, desc_buku, jumlah) values ('$nama_buku', '$desc_buku', $jumlah)");

			echo "Data added successfully. <a href='index.php'>Back to Home.</a>";
		}
	?>

</body>
</html>