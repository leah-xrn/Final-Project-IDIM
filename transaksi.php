<?php
include("config.php");
?>
<!DOCTYPE html>
<html>

<head>
	<title>Tambah Data Transaksi</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include("include/css.php"); ?>
</head>

<body>
	<header>
		<?php include("include/header.php"); ?>
	</header>
	<div class='container' style='margin-top:70px'>
		<div class='row' style='min-height:520px'>
			<div class='col-md-12'>
				<div class='panel panel-danger' id='tambah'>
					<div class='panel-heading'>Tambah Data Transaksi</div>
					<div class='panel-body'>


						<form method='post' action='aksi_transaksi.php?act=input'>
							<div class='form-group'>

								<label>Pilih Anak Kost</label>
								<select name='id_anak_kost' class='form-control'>
									<?php
									$sqlquery = "SELECT * FROM penghuni_kostan";
									if ($result = mysqli_query($koneksi, $sqlquery)) {
										while ($row = mysqli_fetch_assoc($result)) {
											$id_anak_kost = $row["id_anak_kost"];
											$nama_lengkap = $row["nama_lengkap"];
											echo "<option value='$id_anak_kost'>$nama_lengkap</option>";
										}
										mysqli_free_result($result);
									}
									?>
								</select>

							</div>
							<div class='form-group'>
								<label>Pilih Jenis Kamar</label>
								<select name='kode_kamar' class='form-control'>
									<?php
									$sqlquery = "SELECT * FROM kamar_kost";
									if ($result = mysqli_query($koneksi, $sqlquery)) {
										while ($row = mysqli_fetch_assoc($result)) {
											$kode_kamar = $row["kode_kamar"];
											$jenis_kamar = $row["jenis_kamar"];
											echo "<option value='$kode_kamar'>$jenis_kamar</option>";
										}
										mysqli_free_result($result);
									}
									?>
								</select>
								</select>
							</div>
							<div class='form-group'>
								<label>Jumlah Orang</label>
								<input type='number' name='berat' class='form-control' required />
							</div>
							<button type='input' name='input' class='btn btn-danger'>Simpan</button>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include("include/footer.php"); ?>
</body>
<?php include("include/js.php"); ?>

</html>