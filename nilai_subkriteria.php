<?php
	include('config.php');
	include('fungsi.php');

	include('layout/menu_contents/navbar.php');
	include('layout/menu_contents/sidebar.php');
?>
<div class="main-panel">
<section class="content">
	<div class="card">
		<div class="card-body">
		<h2 class="ui header">Pembobotan Sub-Kriteria</h2>

<?php
//include('config.php');

    
    if(isset($_POST['pilih'])){
        $val = str_replace(" ","_",$_POST['kriteria']);
        $query = "SELECT distinct ".$val." from data_kepala_keluarga";
        $res = mysqli_query($koneksi, $query);
        $nilai = 0;

        while($row = mysqli_fetch_array($res)){
            $sub[]=$row[0];
        }

        
        
    }
    
    // for ($i=0;$i < count($sub);$i++){
    //     $query2 = "SELECT BOBOT_NILAI_KRITERIA FROM DETAIL_KRITERIA WHERE SUB_KRITERIA='".$sub[$i]."'"
    //     $res2 = mysqli_query($koneksi, $query2);
    //     if(mysqli_num_rows($res2)> 0){
            
    //     while($row = mysqli_fetch_array($res2)){
    //         $nilai[]=$row[0];
    //     }
            
    //     } else {
    //         $nilai[]=0;
    //     }

                
    // }

	// include('layout/menu_contents/navbar.php');
	// include('layout/menu_contents/sidebar.php');
?>


<div class="main-panel">
	<div class="card">
		<div class="card-body">
			<section class="content">
				<h2>Tambah</h2>
				<form class="ui form" method="post" action="bobot_subkriteria.php">
					
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
                        echo $val;
						$urut = 0;
						for ($x=0; $x < count($sub); $x++) {
							// for ($y=($x+1); $y <= ($n - 1) ; $y++) {
							$urut++;
						?>

							<tr>
								<td>
									<div class="field">
										<label><?php echo $urut.'.'.$sub[$x] ?></label>
										
									</div>
								</td>
							
								<td>
									<div class="field">
									
										<input type="text" name="bobot[]" value="<?php echo $nilai[$x]?>" required>
                                        <input type="hidden" name="val[]" value="<?php echo $sub[$x]?>">
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
					<input class="ui red button" type="submit" name="Kembali" value="Kembali">
                    <input class="ui green button" type="submit" name="Simpan" value="Simpan">
				</form>
			</section>
		</div>
	</div>
</div>

</section>

<?php include('layout/menu_contents/footer.php'); ?>
<?php include('layout/menu_contents/plugins.php'); ?>