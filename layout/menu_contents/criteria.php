<?php
include("config.php");
	include('fungsi.php');

	// menjalankan perintah edit
	if(isset($_POST['edit'])) {
		$id = $_POST['id'];

		header('Location: edit.php?jenis=kriteria&id='.$id);
		exit();
	}

	// menjalankan perintah delete
	if(isset($_POST['delete'])) {
		$id = $_POST['id_kriteria'];
		deleteKriteria($id);
	}

	// menjalankan perintah tambah
	if(isset($_POST['tambah'])) {
		$nama = $_POST['nama'];
		tambahData('kriteria',$nama);
	}
?>

<div class="main-panel">

<div class="card">
    <div class="card-body">
    <div class="row">
	<!--<div class="col-xs-12 col-sm-12 col-md-2">
    <?php
    //include_once 'sidebar.php';
    ?>
	</div>-->
	<div class="col-xs-12 col-sm-12 col-md-12">
   
<form method="post">
	<div class="row">
		<div class="col-md-6 text-left">
			<strong style="font-size:18pt;"><span class="fa fa-bank"></span> Data Kriteria</strong>
		</div>
		<div class="col-md-6 text-right">
            <button type="submit" name="hapus-contengan" class="btn btn-danger"><span class="fa fa-close"></span> Hapus Contengan</button>
			<button type="button" onclick="location.href='data-kriteria-baru.php'" class="btn btn-primary"><span class="fa fa-clone"></span> Tambah Data</button>
		</div>
	</div>
	<br/>

	<table width="100%" class="table table-striped table-bordered" id_kriteria="tabeldata">
        <thead>
            <tr>
                
                <th>No</th>
                <th>Nama Kriteria</th>
                <th width="100px">Aksi</th>
            </tr>
        </thead>

        <tbody>

		<?php
			// Menampilkan list kriteria
			$query = "SELECT id_kriteria,nama_kriteria FROM kriteria ORDER BY id_kriteria";
			$result	= mysqli_query($koneksi, $query);

			$i = 0;
			while ($row = mysqli_fetch_array($result)) {
				$i++;
		?>
			<tr>
				<td><?php echo $i ?></td>
				<td><?php echo $row['nama_kriteria'] ?></td>
				<td class="right aligned collapsing">
					<form method="post" action="view_criteria.php">
						<input type="hidden" name="id_kriteria" value="<?php echo $row['id_kriteria'] ?>">
						<button type="submit" name="edit" class="ui mini teal left labeled icon button"><i class="right edit icon"></i>EDIT</button>
						<button type="submit" name="delete" class="ui mini red left labeled icon button"><i class="right remove icon"></i>DELETE</button>
					</form>
				</td>
			</tr>
		

	<?php } ?>


		</tbody>
		<tfoot class="full-width">
			<tr>
				<th colspan="3">
					<a href="tambah.php?jenis=kriteria">
						<div class="ui right floated small primary labeled icon button">
						<i class="plus icon"></i>Tambah
						</div>
					</a>
				</th>
			</tr>
		</tfoot>

    </table>
</form>
</div>
<center><p><h4>Silahkan Masukan Kriteria Yang Di Perlukan, Klik Tombol "Tambah Data" Untuk menambahkan kriteria</h4></p></center>
</div>			


    </div>
</div>
