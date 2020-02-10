<?php
	include('config.php');
	include('fungsi.php');

	include_once('layout/menu_contents/navbar.php');
	include_once('layout/menu_contents/sidebar.php');
?>
<div class="main-panel">
<section class="content">
<h2 class="ui header">Perbandingan Kriteria</h2>
	    <?php showTabelPerbandingan('kriteria','kriteria'); ?>
</section>

<?php
include_once('layout/menu_contents/footer.php');
include_once('layout/menu_contents/plugins.php');

 
 ?> 