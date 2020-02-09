<?php
	include('config.php');
	include('fungsi.php');

	$jenis = $_GET['c'];

	include('layout/menu_contents/navbar.php');
	include('layout/menu_contents/sidebar.php');
?>
<div class="main-panel">
<section class="content">
	<h2 class="ui header">Perbandingan Alternatif &rarr; <?php echo getKriteriaNama($jenis-1) ?></h2>
	<?php showTabelPerbandingan($jenis,'data_kepala_keluarga'); ?>
</section>

<?php include('layout/menu_contents/footer.php');
include('layout/menu_contents/plugins.php');
?>