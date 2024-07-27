<?php
include("config.php");
include("fungsi/fungsi_indotgl.php");
include("fungsi/fungsi_rupiah.php");
?>
<!DOCTYPE html>
<html>

<head>
	<title>Laporan</title>
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
				<div class='panel panel-success'>
					<div class='panel-heading'>Laporan</div>
					<div class='panel-body'>
						<center>
							<h3></h3>
							<h3>Laporan Pembayaran Kostan</h3>
							<p>&nbsp;</p>
						</center>

						<table class="table table-hover table-bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Tanggal Transaksi</th>
									<th>Nama Lengkap</th>
									<th>No. KTP</th>
									<th>Jenis Kamar </th>
									<th>Harga</th>
									<th>Jumlah Orang</th>
									<th>Potongan</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								$total_semua = 0;
								$sqlquery = "SELECT penghuni_kostan.*, kamar_kost.*, transaksi.* FROM transaksi transaksi INNER JOIN penghuni_kostan penghuni_kostan ON transaksi.id_anak_kost = penghuni_kostan.id_anak_kost INNER JOIN kamar_kost kamar_kost ON transaksi.kode_kamar = kamar_kost.kode_kamar ORDER BY transaksi.id_anak_kost ASC";
								if ($result = mysqli_query($koneksi, $sqlquery)) {
									while ($row = mysqli_fetch_assoc($result)) {
										$potongan = ($row["harga_kamar"] * $row["jumlah_penghuni"]) * ($row["potongan"] / 100);
										$total = ($row["harga_kamar"] * $row["jumlah_penghuni"]) - $potongan;
										$total_semua += $total;

								?>
										<tr>
											<td><?php echo $no ?></td>
											<td><?php echo tgl_indo($row["tanggal_transaksi"]); ?></td>
											<td><?php echo $row["nama_lengkap"]; ?></td>
											<td><?php echo $row["no_ktp"]; ?></td>
											<td><?php echo $row["jenis_kamar"]; ?></td>
											<td><?php echo rupiah($row["harga_kamar"]); ?></td>
											<td><?php echo $row["jumlah_penghuni"]; ?></td>
											<td><?php echo rupiah($potongan); ?></td>
											<td><?php echo rupiah($total); ?></td>
										</tr>
									<?php
										$no++;
									}
									?>
									<tr>
										<td colspan='8'>Grand Total</td>
										<td colspan='2'><?php echo rupiah($total_semua); ?></td>
									</tr>
								<?php
									mysqli_free_result($result);
								}
								mysqli_close($koneksi);
								?>
							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include("include/footer.php"); ?>
</body>
<?php include("include/js.php"); ?>

</html>