<?php
include("config.php");

$act = $_GET['act'];

if ($act == 'input') {
	$id_anak_kost = $_POST['id_anak_kost'];
	$kode_kamar = $_POST['kode_kamar'];
	$jumlah_penghuni = $_POST['jumlah_penghuni'];

	$sql = "INSERT INTO transaksi VALUES ('','$id_anak_kost','$kode_kamar', '$jumlah_penghuni', '$hari_ini')";
	$aksi = mysqli_query($koneksi, $sql);

	if ($aksi) {
		header('location:laporan.php');
	} else {
		echo "gagal";
	}
}
