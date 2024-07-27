<?php
include("config.php");

$act = $_GET['act'];

if ($act == 'delete') {
	$id_anak_kost = $_GET['id_anak_kost'];
	$row = mysqli_query($koneksi, "DELETE FROM penghuni_kostan WHERE id_anak_kost = '$id_anak_kost'");
	header('location:anak_kost.php');
} elseif ($act == 'input') {
	$nama_lengkap = $_POST["nama_lengkap"];
	$no_ktp = $_POST["no_ktp"];

	$sql = "INSERT INTO penghuni_kostan VALUES ('','$nama_lengkap','$no_ktp')";
	$aksi = mysqli_query($koneksi, $sql);

	if ($aksi) {
		header('location:anak_kost.php');
	} else {
		echo "gagal";
	}
} elseif ($act == 'update') {
	$id_anak_kost = $_POST["id_anak_kost"];
	$nama_lengkap = $_POST["nama_lengkap"];
	$no_ktp = $_POST["no_ktp"];

	$sql = "UPDATE penghuni_kostan SET nama_lengkap='$nama_lengkap', no_ktp='$no_ktp' WHERE id_anak_kost='$id_anak_kost'";

	if (mysqli_query($koneksi, $sql)) {
		mysqli_close($koneksi);
		header('location:anak_kost.php');
	} else {
		echo '<script type="text/javascript">';
		echo 'alert("gagal");';
		echo '</script>';
	}
}
