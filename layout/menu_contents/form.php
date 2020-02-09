

<div class="main-panel">
  <div class="card">
    <div class="card-body">
    <div class="panel-heading">Data Penduduk</div>
            <div class="panel-body">
              <form class="form-horizontal ui form" action="input_penduduk.php" method="post">
                
                <input type="hidden" name="id_hidden" value="" />
                <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                  <label class="col-sm-4 control-label">Nama</label>
                  <div class="col-sm-8">
                    <input type="text" name="nama" class="form-control" placeholder="" value="" >
                  </div>
                </div>

                <div class="form-group">
                <label class="col-sm-4 control-label">Alamat</label>
                  <div class="col-sm-8">
                    <input type="text" name="alamat" class="form-control" placeholder="" value="" >
                  </div>
                </div>

                <div class="form-group">
                <label class="col-sm-4 control-label">Jumlah anggota Keluarga</label>
                  <div class="col-sm-8">
                    <input type="number" name="jmlAnggota" class="form-control" placeholder="" value="" min="1" >
                  </div>
                </div>

                <div class="form-group">
                <label class="col-sm-4 control-label">Status Kepala Keluarga</label>
                  <div class="col-sm-8">
                    <select name="stsKepala" class="dropdown">
                      <option value="Hidup">Hidup</option>
                      <option value="Meninggal">Meninggal</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                <label class="col-sm-4 control-label">Pekerjaan</label>
                  <div class="col-sm-8">
                    <input type="text" name="pekerjaan" class="form-control" placeholder="" value="" >
                  </div>
                </div>

                <div class="form-group">
                <label class="col-sm-4 control-label">Penghasilan</label>
                  <div class="col-sm-8">
                    <input type="text" name="penghasilan" class="form-control" placeholder="" value="" >
                  </div>
                </div>

                <div class="form-group">
                <label class="col-sm-4 control-label">Sumber Penerangan</label>
                  <div class="col-sm-8">
                    <input type="text" name="penerangan" class="form-control" placeholder="" value="" >
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">Bahan Bakar Masak</label>
                  <div class="col-sm-8">
                    <input type="text" name="masak" class="form-control" placeholder="" value="" >
                  </div>
                </div>
                  </div>
                  <div class="col-md-6"><div class="form-group">
                <label class="col-sm-4 control-label">Membeli Pakaian</label>
                  <div class="col-sm-8">
                    <input type="text" name="pakaian" class="form-control" placeholder="" value="" >
                  </div>
                </div>

                <div class="form-group">
                <label class="col-sm-4 control-label">Sumber Air</label>
                  <div class="col-sm-8">
                    <input type="text" name="air" class="form-control" placeholder="" value="" >
                  </div>
                </div>

              <div class="form-group">
                <label class="col-sm-4 control-label">Jenis Dinding</label>
                <div class="col-sm-8">
                  <input type="text" name="dinding" class="form-control" placeholder="" value="" >
                </div>
              </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">Jenis Lantai</label>
                  <div class="col-sm-8">
                    <input type="text" name="lantai" class="form-control" placeholder="" value="" >
                  </div>
                </div>

                <div class="form-group">
                <label class="col-sm-4 control-label">Kemampuan Berobat</label>
                  <div class="col-sm-8">
                    <input type="text" name="berobat" class="form-control" placeholder="" value="" >
                  </div>
                </div>

                <div class="form-group">
                <label class="col-sm-4 control-label">Pendidikan Terakhir</label>
                  <div class="col-sm-8">
                    <input type="text" name="pendidikan" class="form-control" placeholder="" value="" >
                  </div>
                </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                      <button type="submit" name="btn_submit" class="btn btn-sm btn-primary">Simpan</button>
                    
                      <a href="index.php?page=karyawan&sub=list" class="btn btn-sm btn-danger">Batal</a>
                    </div></div>
                </div>
                
              </form>
            </div>
    </div>
  </div>
