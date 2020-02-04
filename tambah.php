<?php
	include('config.php');
	include('fungsi.php');

	// mendapatkan data edit
	if(isset($_GET['jenis'])) {
		$jenis	= $_GET['jenis'];
	}

	if (isset($_POST['tambah'])) {
		$jenis	= $_POST['jenis'];
		$nama 	= $_POST['nama'];

		tambahData($jenis,$nama);

		header('Location: '.$jenis.'.php');
	}

	include('layout/menu_contents/navbar.php');
	include('layout/menu_contents/sidebar.php');
?>
<div class="main-panel">
	<div class="card">
		<div class="card-body">
		<section class="content">
	<h2>Tambah <?php echo $jenis?></h2>

	<form class="ui form" method="post" action="tambah.php">
		<div class="inline field">
			<label>Nama <?php echo $jenis ?></label>
			<input type="text" name="nama" placeholder="<?php echo $jenis?> baru">
			<input type="hidden" name="jenis" value="<?php echo $jenis?>">
		</div>
		<br>
		<input class="ui green button" type="submit" name="tambah" value="SIMPAN">
	</form>
</section>
		</div>
	</div>


<?php include('layout/menu_contents/footer.php');
	include('layout/menu_contents/plugins.php'); ?>