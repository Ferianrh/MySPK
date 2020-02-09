<?php

// mencari ID kriteria
// berdasarkan urutan ke berapa (C1, C2, C3)
function getKriteriaID($no_urut) {
	include('config.php');
	$query  = "SELECT id_kriteria FROM kriteria ORDER BY id_kriteria";
	$result = mysqli_query($koneksi, $query);

	while ($row = mysqli_fetch_array($result)) {
		$listID[] = $row['id_kriteria'];
	}

	return $listID[($no_urut)];
}

// mencari ID alternatif
// berdasarkan urutan ke berapa (A1, A2, A3)
function getAlternatifID($no_urut) {
	include('config.php');
	$query  = "SELECT id_penduduk FROM data_kepala_keluarga ORDER BY id_penduduk";
	$result = mysqli_query($koneksi, $query);

	while ($row = mysqli_fetch_array($result)) {
		$listID[] = $row['id_penduduk'];
	}

	return $listID[($no_urut)];
}

// mencari nama kriteria
function getKriteriaNama($no_urut) {
	include('config.php');
	$query  = "SELECT nama_kriteria FROM kriteria ORDER BY id_kriteria";
	$result = mysqli_query($koneksi, $query);

	while ($row = mysqli_fetch_array($result)) {
		$nama[] = $row['nama_kriteria'];
	}

	return $nama[$no_urut];
}

//get nama kriteria
function getNamaKriteria() {
	include('config.php');
	$query  = "SELECT nama_kriteria FROM kriteria ORDER BY id_kriteria";
	$result = mysqli_query($koneksi, $query);

	while ($row = mysqli_fetch_array($result)) {
		$nama[] = $row['nama_kriteria'];
	}

	return $nama;
}

// mencari nama alternatif
function getAlternatifNama($no_urut) {
	include('config.php');
	$query  = "SELECT nama FROM data_kepala_keluarga ORDER BY id_penduduk";
	$result = mysqli_query($koneksi, $query);

	while ($row = mysqli_fetch_array($result)) {
		$nama[] = $row['nama'];
	}

	return $nama[($no_urut)];
}

// mencari priority vector alternatif
function getAlternatifPV($id_alternatif,$id) {
	include('config.php');
	$query = "SELECT nilai FROM pv_penduduk WHERE id_penduduk=$id_alternatif AND id_kriteria=$id";
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_array($result)) {
		$pv = $row['nilai'];
	}

	return $pv;
}

// mencari priority vector kriteria
function getKriteriaPV($id) {
	include('config.php');
	$query = "SELECT nilai FROM pv_kriteria WHERE id_kriteria=$id";
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_array($result)) {
		$pv = $row['nilai'];
	}

	return $pv;
}

// mencari jumlah alternatif
function getJumlahAlternatif() {
	include('config.php');
	$query  = "SELECT count(*) FROM data_kepala_keluarga";
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_array($result)) {
		$jmlData = $row[0];
	}

	return $jmlData;
}

// mencari jumlah kriteria
function getJumlahKriteria() {
	include('config.php');
	$query  = "SELECT count(*) FROM kriteria";
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_array($result)) {
		$jmlData = $row[0];
	}

	return $jmlData;
}

// menambah data kriteria / alternatif
function tambahData($tabel,$nama) {
	include('config.php');

	$query 	= "INSERT INTO $tabel (nama_kriteria) VALUES ('$nama')";
	$tambah	= mysqli_query($koneksi, $query);

	if (!$tambah) {
		echo "Gagal mmenambah data".$tabel;
		exit();
	}
}

function tambahPenduduk($nama, $alamat, $jml, $status, $pekerjaan, $pendidikan, $penghasilan,$penerangan,$masak, $pakaian, $air, $dinding, $lantai, $berobat){
include('config.php');

$query = "INSERT INTO data_kepala_keluarga (nama,alamat,jumlah_anggota_keluarga, status_kpl_keluarga,pekerjaan,pendidikan_terakhir,penghasilan,sumber_penerangan,bahan_bakar_masak,membeli_pakaian,sumber_air,jenis_dinding,jenis_lantai,kemampuan_berobat)
									 VALUES('$nama','$alamat',$jml,'$status','$pekerjaan','$pendidikan',$penghasilan,'$penerangan','$masak','$pakaian','$air','$dinding','$lantai','$berobat')";
$input = mysqli_query($koneksi,$query);
if(!$input){
	echo "Error: ". mysqli_error($koneksi);
	exit();
}


}

function viewPenduduk(){
	include('config.php');

	$query = "SELECT NAMA,ALAMAT,JUMLAH_ANGGOTA_KELUARGA,STATUS_KPL_KELUARGA,PEKERJAAN,PENDIDIKAN_TERAKHIR,PENGHASILAN,SUMBER_PENERANGAN,BAHAN_BAKAR_MASAK, MEMBELI_PAKAIAN, SUMBER_AIR,JENIS_DINDING,JENIS_LANTAI,KEMAMPUAN_BEROBAT 
	FROM DATA_KEPALA_KELUARGA";
	$data = mysqli_query($koneksi,$query);
?>
	<div class="card">
    <div class="card-body">
    <div class="d-sm-flex align-items-center mb-4">
      <h4 class="card-title mb-sm-0">Daftar Penduduk</h4>
    </div>
    <div class="table-responsive border rounded p-1">
      <table class="table">
        <thead>
          <tr>
			<th class="font-weight-bold">Nama</th>
			<th class="font-weight-bold">Alamat</th>
			<th class="font-weight-bold">Jumlah Anggota Keluarga</th>
			<th class="font-weight-bold">Status Kepala Keluarga</th>
			<th class="font-weight-bold">Pekerjaan</th>
			<th class="font-weight-bold">Pendidikan Terakhir</th>
            <th class="font-weight-bold">Penghasilan</th>
            <th class="font-weight-bold">Sumber Penerangan</th>
            <th class="font-weight-bold">Bahan Bakar Masak</th>
            <th class="font-weight-bold">Membeli Pakaian</th>
            <th class="font-weight-bold">Sumber Air</th>
            <th class="font-weight-bold">Jenis Dinding</th>
            <th class="font-weight-bold">Jenis Lantai</th>
            <th class="font-weight-bold">Kemampuan Berobat</th>
          </tr>
        </thead>
        <tbody>
			<?php
			while($row = mysqli_fetch_array($data)){
				echo '<tr>';
				echo '<td>'.$row[0].'</td>';
				echo '<td>'.$row[1].'</td>';
				echo '<td>'.$row[2].'</td>';
				echo '<td>'.$row[3].'</td>';
				echo '<td>'.$row[4].'</td>';
				echo '<td>'.$row[5].'</td>';
				echo '<td>'.$row[6].'</td>';
				echo '<td>'.$row[7].'</td>';
				echo '<td>'.$row[8].'</td>';
				echo '<td>'.$row[9].'</td>';
				echo '<td>'.$row[10].'</td>';
				echo '<td>'.$row[11].'</td>';
				echo '<td>'.$row[12].'</td>';
				echo '<td>'.$row[13].'</td>';
				echo '</tr>';
			}
			?>
          
        </tbody>
      </table>
    </div>
      </div>
  </div>
<?php
}

// hapus kriteria
function deleteKriteria($id) {
	include('config.php');

	// hapus record dari tabel kriteria
	$query 	= "DELETE FROM kriteria WHERE id_kriteria=$id";
	mysqli_query($koneksi, $query);

	// hapus record dari tabel pv_kriteria
	$query 	= "DELETE FROM pv_kriteria WHERE id_kriteria=$id";
	mysqli_query($koneksi, $query);

	// hapus record dari tabel pv_alternatif
	$query 	= "DELETE FROM pv_alternatif WHERE id_kriteria=$id";
	mysqli_query($koneksi, $query);

	$query 	= "DELETE FROM perbandingan_kriteria WHERE kriteria1=$id OR kriteria2=$id";
	mysqli_query($koneksi, $query);

	$query 	= "DELETE FROM perbandingan_alternatif WHERE pembanding=$id";
	mysqli_query($koneksi, $query);
}

// hapus alternatif
function deleteAlternatif($id) {
	include('config.php');

	// hapus record dari tabel alternatif
	$query 	= "DELETE FROM alternatif WHERE id=$id";
	mysqli_query($koneksi, $query);

	// hapus record dari tabel pv_alternatif
	$query 	= "DELETE FROM pv_alternatif WHERE id_alternatif=$id";
	mysqli_query($koneksi, $query);

	// hapus record dari tabel ranking
	$query 	= "DELETE FROM ranking WHERE id_alternatif=$id";
	mysqli_query($koneksi, $query);

	$query 	= "DELETE FROM perbandingan_alternatif WHERE alternatif1=$id OR alternatif2=$id";
	mysqli_query($koneksi, $query);
}

// memasukkan nilai priority vektor kriteria
function inputKriteriaPV ($id,$pv) {
	include ('config.php');

	$query = "SELECT * FROM pv_kriteria WHERE id_kriteria=$id";
	$result = mysqli_query($koneksi, $query);

	if (!$result) {
		echo "Error !!!";
		exit();
	}

	// jika result kosong maka masukkan data baru
	// jika telah ada maka diupdate
	if (mysqli_num_rows($result)==0) {
		$query = "INSERT INTO pv_kriteria (id_kriteria, nilai) VALUES ($id, $pv)";
	} else {
		$query = "UPDATE pv_kriteria SET nilai=$pv WHERE id_kriteria=$id";
	}


	$result = mysqli_query($koneksi, $query);
	if(!$result) {
		echo "Gagal memasukkan / update nilai priority vector kriteria";
		exit();
	}

}

// memasukkan nilai priority vektor alternatif
function inputAlternatifPV ($id_alternatif,$id,$pv) {
	include ('config.php');

	$query  = "SELECT * FROM pv_penduduk WHERE id_penduduk = $id_alternatif AND id_kriteria = $id";
	$result = mysqli_query($koneksi, $query);

	if (!$result) {
		echo "Error !!!";
		exit();
	}

	// jika result kosong maka masukkan data baru
	// jika telah ada maka diupdate
	if (mysqli_num_rows($result)==0) {
		$query = "INSERT INTO pv_penduduk (id_penduduk,id_kriteria,nilai) VALUES ($id_alternatif,$id,$pv)";
	} else {
		$query = "UPDATE pv_penduduk SET nilai=$pv WHERE id_penduduk=$id_alternatif AND id_kriteria=$id";
	}

	$result = mysqli_query($koneksi, $query);
	if (!$result) {
		echo "Gagal memasukkan / update nilai priority vector alternatif";
		exit();
	}

}


// memasukkan bobot nilai perbandingan kriteria
function inputDataPerbandinganKriteria($kriteria1,$kriteria2,$nilai) {
	include('config.php');

	$id1 = getKriteriaID($kriteria1);
	$id2 = getKriteriaID($kriteria2);

	$query  = "SELECT * FROM perbandingan_kriteria WHERE kriteria1 = $id1 AND kriteria2 = $id2";
	$result = mysqli_query($koneksi, $query);

	if (!$result) {
		echo "Error !!!";
		exit();
	}

	// jika result kosong maka masukkan data baru
	// jika telah ada maka diupdate
	if (mysqli_num_rows($result)==0) {
		$query = "INSERT INTO perbandingan_kriteria (kriteria1,kriteria2,nilai_analisa_kriteria) VALUES ($id1,$id2,$nilai)";
	} else {
		$query = "UPDATE perbandingan_kriteria SET nilai_analisa_kriteria=$nilai WHERE kriteria1=$id1 AND kriteria2=$id2";
	}

	$result = mysqli_query($koneksi, $query);
	if (!$result) {
		echo "Gagal memasukkan data perbandingan";
		exit();
	}

}

// memasukkan bobot nilai perbandingan alternatif
function inputDataPerbandinganAlternatif($alternatif1,$alternatif2,$pembanding,$nilai) {
	include('config.php');


	$id_alternatif1 = getAlternatifID($alternatif1);
	$id_alternatif2 = getAlternatifID($alternatif2);
	$id_pembanding  = getKriteriaID($pembanding);

	$query  = "SELECT * FROM PERBANDINGAN_PENDUDUK WHERE PENDUDUK1 = $id_alternatif1 AND PENDUDUK2 = $id_alternatif2 AND ID_KRITERIA = $id_pembanding";
	$result = mysqli_query($koneksi, $query);

	if (!$result) {
		echo "Error !!!";
		exit();
	}

	// jika result kosong maka masukkan data baru
	// jika telah ada maka diupdate
	if (mysqli_num_rows($result)==0) {
		$query = "INSERT INTO perbandingan_penduduk (Penduduk1,penduduk2,Id_kriteria,nilai) VALUES ($id_alternatif1,$id_alternatif2,$id_pembanding,$nilai)";
	} else {
		$query = "UPDATE perbandingan_PENDUDUK SET nilai=$nilai WHERE penduduk1=$id_alternatif1 AND penduduk2=$id_alternatif2 AND id_kriteria=$id_pembanding";
	}

	$result = mysqli_query($koneksi, $query);
	if (!$result) {
		echo "Gagal memasukkan data perbandingan";
		exit();
	}

}

// mencari nilai bobot perbandingan kriteria
function getNilaiPerbandinganKriteria($kriteria1,$kriteria2) {
	include('config.php');

	$id1 = getKriteriaID($kriteria1);
	$id2 = getKriteriaID($kriteria2);

	$query  = "SELECT nilai_analisa_kriteria FROM perbandingan_kriteria WHERE kriteria1 = $id1 AND kriteria2 = $id2";
	$result = mysqli_query($koneksi, $query);

	if (!$result) {
		echo "Error !!!";
		exit();
	}

	if (mysqli_num_rows($result)==0) {
		$nilai = 1;
	} else {
		while ($row = mysqli_fetch_array($result)) {
			$nilai = $row['nilai_analisa_kriteria'];
		}
	}

	return $nilai;
}

// mencari nilai bobot perbandingan alternatif
function getNilaiPerbandinganAlternatif($alternatif1,$alternatif2,$pembanding) {
	include('config.php');

	$id_alternatif1 = getAlternatifID($alternatif1);
	$id_alternatif2 = getAlternatifID($alternatif2);
	$id_pembanding  = getKriteriaID($pembanding);

	$query  = "SELECT nilai FROM perbandingan_penduduk WHERE penduduk1 = $id_alternatif1 AND penduduk2 = $id_alternatif2 AND id_kriteria = $id_pembanding";
	$result = mysqli_query($koneksi, $query);

	if (!$result) {
		echo "Error !!!";
		exit();
	}
	if (mysqli_num_rows($result)==0) {
		$nilai = 1;
	} else {
		while ($row = mysqli_fetch_array($result)) {
			$nilai = $row['nilai'];
		}
	}

	return $nilai;
}

// menampilkan nilai IR
function getNilaiIR($jmlKriteria) {
	include('config.php');
	$query  = "SELECT nilai FROM ir WHERE jumlah=$jmlKriteria";
	$result = mysqli_query($koneksi, $query);
	while ($row = mysqli_fetch_array($result)) {
		$nilaiIR = $row['nilai'];
	}

	return $nilaiIR;
}

// mencari Principe Eigen Vector (λ maks)
function getEigenVector($matrik_a,$matrik_b,$n) {
	$eigenvektor = 0;
	for ($i=0; $i <= ($n-1) ; $i++) {
		$eigenvektor += ($matrik_a[$i] * (($matrik_b[$i]) / $n));
	}

	return $eigenvektor;
}

// mencari Cons Index
function getConsIndex($matrik_a,$matrik_b,$n) {
	$eigenvektor = getEigenVector($matrik_a,$matrik_b,$n);
	$consindex = ($eigenvektor - $n)/($n-1);

	return $consindex;
}

// Mencari Consistency Ratio
function getConsRatio($matrik_a,$matrik_b,$n) {
	$consindex = getConsIndex($matrik_a,$matrik_b,$n);
	$consratio = $consindex / getNilaiIR($n);

	return $consratio;
}

// menampilkan tabel perbandingan bobot
function showTabelPerbandingan($jenis,$kriteria) {
	include('config.php');

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
	}elseif($kriteria == 'data_kepala_keluarga'){
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
	}
	

	// tampilkan tabel
	?>

	<form class="ui form" action="proses.php" method="post">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th colspan="2">pilih yang lebih penting</th>
				<th>nilai perbandingan</th>
			</tr>
		</thead>
		<tbody>

	<?php

	//inisialisasi
	$urut = 0;

	for ($x=0; $x <= ($n - 2); $x++) {
		for ($y=($x+1); $y <= ($n - 1) ; $y++) {

			$urut++;

	?>
			<tr>
				<td>
					<div class="field">
						<div class="ui radio checkbox">
							<input name="pilih<?php echo $urut?>" value="1" checked="" class="hidden" type="radio">
							<label><?php echo $pilihan[$x]; ?></label>
						</div>
					</div>
				</td>
				<td>
					<div class="field">
						<div class="ui radio checkbox">
							<input name="pilih<?php echo $urut?>" value="2" class="hidden" type="radio">
							<label><?php echo $pilihan[$y]; ?></label>
						</div>
					</div>
				</td>
				<td>
					<div class="field">

	<?php
	if ($kriteria == 'kriteria') {
		$nilai = getNilaiPerbandinganKriteria($x,$y);
	} else {
		$nilai = getNilaiPerbandinganAlternatif($x,$y,($jenis-1));
	}

	?>
						<input type="text" name="bobot<?php echo $urut?>" value="<?php echo $nilai?>" required>
					</div>
				</td>
			</tr>
			<?php
		}
	}

	?>
		</tbody>
	</table>
	<input type="text" name="jenis" value="<?php echo $jenis; ?>" hidden>
	<br><br><input class="ui submit button" type="submit" name="submit" value="SUBMIT">
	</form>

	<?php
}

function inputNilaiSubKriteria($kriteria) {

	include('config.php');

	// mendapatkan data edit
	

	$query  = "SELECT nama_kriteria FROM kriteria ORDER BY id_kriteria";
	$result = mysqli_query($koneksi, $query);

	if ($kriteria == 'kriteria') {
		$n = getJumlahKriteria();
	}

	while ($row = mysqli_fetch_array($result)) {
		$nama[] = $row['nama_kriteria'];
	}

		//header('Location: '.$jenis.'.php');
	

	// include('layout/menu_contents/navbar.php');
	// include('layout/menu_contents/sidebar.php');
?>


<div class="main-panel">
	<div class="card">
		<div class="card-body">
			<section class="content">
				<h2>Tambah <?php //echo $jenis?></h2>
				<form class="ui form" method="post" action="bobot_subkriteria.php">
					<div class="form-group">
						<label>Pilih Kriteria</label>
						<select class="form-control" id="kriteria" name="kriteria">
							<?php
								for($i=0;$i<count($nama);$i++){
									echo  '<option>'.$nama[$i].'</option>';
								}
							?>
						</select>
					</div>
					<div class="form-group">
						
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Sub-Kriteria</th>
									<th>Nilai Bobot</th>
								</tr>
							</thead>
						<tbody>

						<?php
						//inisialisasi
						$urut = 0;
						for ($x=0; $x <= ($n - 1); $x++) {
							// for ($y=($x+1); $y <= ($n - 1) ; $y++) {
							$urut++;
						?>

							<tr>
								<td>
									<div class="field">
										<label><?php $urut ?></label>
										<label><?php $nama[$x] ?></label>
									</div>
								</td>
							
								<td>
									<div class="field">
									
										<input type="text" name="bobot<?php echo $urut?>" value="<?php echo $nilai?>" required>
									</div>
								</td>
							</tr>
							<?php
								}
							
							?>
							
						</tbody>
						</table>

					</div>
					
					<br>
					<input class="ui green button" type="submit" name="tambah" value="SIMPAN">
				</form>
			</section>
		</div>
	</div>
</div>


<?php

}
?>