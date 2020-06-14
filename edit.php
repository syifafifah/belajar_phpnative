<?php
	include_once('config.php');

	if (isset($_POST['update'])) {
		$id_buku = $_POST['id_buku'];
		$nama_buku = $_POST['nama_buku'];
		$desc_buku = $_POST['desc_buku'];
		$jumlah = $_POST['jumlah'];

		$result = mysqli_query($mysqli, "update buku set nama_buku='$nama_buku', desc_buku='$desc_buku', jumlah=$jumlah where id_buku = $id_buku");
		
		//echo "update buku set nama_buku='$nama_buku', desc_buku='$desc_buku', jumlah=$jumlah where id_buku = $id_buku";
		header("Location: index.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Item</title>
</head>
<body>
	<a href="index.php">Go to Home</a>
	<br>

	<?php
		$id_buku = $_GET['id'];

		$result = mysqli_query($mysqli, "select * from buku where id_buku=$id_buku");

		while ($databuku = mysqli_fetch_array($result)) {
			$nama_buku = $databuku['nama_buku'];
			$desc_buku = $databuku['desc_buku'];
			$jumlah = $databuku['jumlah'];
		}
	?>

	<form action="edit.php" method="post" name="update_buku">
		<input type="hidden" name="id_buku" value="<?php echo $id_buku?>">
		<table>
			<tr>
				<td>Nama Buku</td>
				<td>: <input type="text" name="nama_buku" value="<?php echo $nama_buku?>"></td>
			</tr>
			<tr>
				<td>Deskripsi Buku</td>
				<td>: <input type="text" name="desc_buku" value="<?php echo $desc_buku?>"></td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td>: <input type="number" name="jumlah" value="<?php echo $jumlah?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>

</body>
</html>