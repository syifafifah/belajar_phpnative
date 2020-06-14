<?php

include '../config.php';

$nama = $_POST['nama'];
$kontak = $_POST['kontak'];

$rand = rand();
$ekstensi = array('png', 'jpg', 'jpeg', 'gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

if (!in_array($ext, $ekstensi)) {
	//echo $ext.' - '.$ekstensi; return false;
	header("Location:add_user.php?alert=gagal_ekstensi");
} else {
	if ($ukuran <= 1044070) {
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], '../upload/'.$xx);
		mysqli_query($mysqli, "insert into user values (null, '$nama', '$kontak', '$xx')");
		header("location:add_user.php?alert=berhasil");
	} else {
		header("location:add_user.php?alert=gagal_ukuran");
	}
}

?>