<?php
	include('config.php');
	include('fungsi.php');

	include('layout/menu_contents/navbar.php');
	include('layout/menu_contents/sidebar.php');

	if(isset($_POST['Simpan'])){
		$nilai = $_POST['val'];
		$nilai = $_POST['bobot'];
		for($i=0;$i<count()){

		}
	}
?>
<div class="main-panel">
<section class="content">
	<div class="card">
		<div class="card-body">
		<h2 class="ui header">Pembobotan Sub-Kriteria</h2>
	    <?php inputNilaiSubKriteria($kriteria); ?>
		</div>
	</div>

	
</section>

<?php include('layout/menu_contents/footer.php'); ?>
<?php include('layout/menu_contents/plugins.php'); ?>