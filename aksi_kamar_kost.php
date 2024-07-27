<?php
include("config.php");

$act = $_GET['act'];

if ($act == 'delete') {
	$kode_kamar = $_GET['kode_kamar'];
	$row = mysqli_query($koneksi, "DELETE FROM kamar_kost WHERE kode_kamar = '$kode_kamar'");
	header('location:kamar_kost.php');
} elseif ($act == 'input') {
	$jenis_kamar = $_POST["jenis_kamar"];
	$harga_kamar = $_POST["herga_kamar"];
	$potongan = $_POST["potongan"];

	$sql = "INSERT INTO kamar_kost VALUES ('','$jenis_kamar','$harga_kamar', '$potongan')";
	$aksi = mysqli_query($koneksi, $sql);

	if ($aksi) {
		header('location:kamar_kost.php');
	} else {
		echo "gagal";
	}
} elseif ($act == 'update') {
	$jenis_kamar = $_POST["jenis_kamar"];
	$kode_kamar = $_POST["kode_kamar"];
	$harga_kamar = $_POST["harga_kamar"];
	$potongan = $_POST["potongan"];

	$sql = "UPDATE kamar_kost SET jenis_kamar='$jenis_kamar', harga_kamar='$harga_kamar', potongan='$potongan' WHERE kode_kamar='$kode_kamar'";

	if (mysqli_query($koneksi, $sql)) {
		mysqli_close($koneksi);
		header('location:kamar_kost.php');
	} else {
		echo '<script type="text/javascript">';
		echo 'alert("gagal");';
		echo '</script>';
	}
}
