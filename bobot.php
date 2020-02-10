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
	<?php 
	$kriteria = 'data_kepala_keluarga';
		if ($kriteria == 'kriteria') {
			$n = getJumlahKriteria();
		} else {
			$n = getJumlahAlternatif();
		}
		if($kriteria=='kriteria'){
			$query = "SELECT nama_kriteria FROM $kriteria ORDER BY id_kriteria";
			$result	= mysqli_query($koneksi, $query);
			if (!$result) {
				echo "Error koneksi database!!!";
				exit();
			}
	
			// buat list nama pilihan
			while ($row = mysqli_fetch_array($result)) {
				$pilihan[] = $row['nama_kriteria'];
			}
		} elseif($kriteria == 'data_kepala_keluarga'){
			$query = "SELECT nama FROM $kriteria ORDER BY id_penduduk";
			$result	= mysqli_query($koneksi, $query);
			if (!$result) {
				echo "Error koneksi database!!!";
				exit();
			}
	
			// buat list nama pilihan
			while ($row = mysqli_fetch_array($result)) {
				$pilihan[] = $row['nama'];
			}

			$que = "SELECT ".str_replace(" ","_",getKriteriaNama($jenis-1))." from data_kepala_keluarga ORDER BY id_penduduk";
			$res = mysqli_query($koneksi,$que);

			$a=0;
			while($bar = mysqli_fetch_array($res)){
				$data []= $bar[str_replace(" ","_",getKriteriaNama($jenis-1))];
				$q = "SELECT BOBOT_SUB_KRITERIA FROM DETAIL_KRITERIA WHERE SUB_KRITERIA='". $data[$a] ."'";
				$r = mysqli_query($koneksi,$q);
				while($ow = mysqli_fetch_array($r)){
					$data1[] =$ow['BOBOT_SUB_KRITERIA']; 
				}
				$a++;
				
			}

			
		}
		
	
		// tampilkan tabel
		?>
	
		<form class="ui form" action="proses.php" method="post">
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Nama Penduduk</th>
					<th><?php echo getKriteriaNama($jenis-1)?></th>
					<th>nilai bobot</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$urut = 0 ;
			for($i=0;$i<= $n-1;$i++){ 
				$urut++;
				?>
			<tr>
				<td>
					<div class="field">
						<div class="">
							<!-- <input name="pilih<?php // echo $urut?>" value="1" checked="" class="hidden" type="radio"> -->
							<label><?php echo $pilihan[$i]; ?></label>
						</div>
					</div>
				</td>
				<td>
					<div class="field">
						<div class="">
							<!-- <input name="pilih<?php // echo $urut?>" value="1" checked="" class="hidden" type="radio"> -->
							<label><?php echo $data[$i]; ?></label>
						</div>
					</div>
				</td>
				<td>
					<div class="field">
						<div class="">
							<label><?php echo $data1[$i]; ?></label>
							<input type="text" name="bobot<?php echo $urut?>" value="<?php echo $data1[$i]?>" hidden>
						</div>
					</div>
				</td>
			</tr>
			<?php } ?>
			</tbody>
		</table>
		<input type="text" name="jenis" value="<?php echo $jenis; ?>" hidden>
		<br><br><input class="ui submit button" type="submit" name="submit" value="SUBMIT">
		</form>
</section>

<?php include('layout/menu_contents/footer.php');
include('layout/menu_contents/plugins.php');
?>