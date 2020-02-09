<?php

include('config.php');
include('fungsi.php');

if(isset($_POST['btn_submit'])){
  //deklarasi variabel
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jmlAnggota = $_POST['jmlAnggota'];
$stsKepala = $_POST['stsKepala'];
$pekerjaan = $_POST['pekerjaan'];
$penghasilan = $_POST['penghasilan'];
$penerangan = $_POST['penerangan'];
$masak = $_POST['masak'];
$pakaian = $_POST['pakaian'];
$air = $_POST['air'];
$dinding = $_POST['dinding'];
$lantai = $_POST['lantai'];
$berobat = $_POST['berobat'];
$pendidikan = $_POST['pendidikan'];

tambahPenduduk($nama, $alamat, $jmlAnggota, $stsKepala, $pekerjaan, $pendidikan, $penghasilan,$penerangan,$masak, $pakaian, $air, $dinding, $lantai, $berobat);
}

include('layout/menu_contents/navbar.php');
include('layout/menu_contents/sidebar.php');
include('layout/menu_contents/form.php');

viewPenduduk();

include('layout/menu_contents/footer.php');
	include('layout/menu_contents/plugins.php'); 

?>


