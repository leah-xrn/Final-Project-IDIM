<?php
include("config.php");
?>
<!DOCTYPE html>
<html>

<head>
	<title>Edit Data Anak Kost</title>
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


				<?php
				$id_anak_kost = $_GET['id_anak_kost'];
				$sqlquery = "SELECT * FROM penghuni_kostan WHERE id_anak_kost='$id_anak_kost'";
				$result = mysqli_query($koneksi, $sqlquery) or die(mysqli_connect_error());
				$row = mysqli_fetch_assoc($result);
				?>
				<div class='panel panel-success'>
					<div class='panel-heading'>Edit Data Anak Kost</div>
					<div class='panel-body'>
						<form method='post' action='aksi_anak_kost.php?act=update'>
							<div class='form-group'>
								<input type="hidden" name="id_anak_kost" id="id_anak_kost" value="<?php echo $row["id_anak_kost"]; ?>">
								<label>Nama Lengkap</label>
								<input type='text' class='form-control' name='nama_lengkap' value="<?php echo $row["nama_lengkap"]; ?>" required />
							</div>
							<div class='form-group'>
								<label>No. KTP</label>
								<input type='text' class='form-control' name='no_ktp' value="<?php echo $row["no_ktp"]; ?>" required />
							</div>
							<button type='input' name='update' class='btn btn-success'>Edit</button>
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