<div class="normal-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="normal-table-list mg-t-30">
                        <div class="basic-tb-hd">
                            <h2>Data Masakan</h2>
                            
                        </div>
                        <div class="bsc-tbl-st">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>ID Masakan</th>
                                        <th>Nama Masakan</th>
                                        <th>Gambar</th>
                                        <th>Harga</th>
                                        <th>Nama Restoran</th>
                                        <th>Status Masakan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                   <?php
                                   $no=0;
                                   foreach ($data_mas as $dm) 
                                   {
                                       $no++;
                                       echo '<tr>
                                                <td>'.$no.'</td>
                                                <td>'.$dm->id_masakan.'</td>
                                                <td>'.$dm->nama_masakan.'</td>
                                                <td><img src='.base_url("assets/gambar_masakan/$dm->gambar_masakan").' width="100px" height="75px"></td>
                                                <td>'.$dm->harga.'</td>
                                                <td>'.$dm->nama_restoran.'</td>
                                                <td>'.$dm->status_masakan.'</td>
                                                <td><a href="#ubah" onclick="tm_detail('.$dm->id_masakan.')" class="btn btn-warning" data-toggle="modal">Ubah</a>
                                                     <a href='.base_url('index.php/kasir/Masakan/hapus/'.$dm->id_masakan).' onclick="return confirm(\'anda yakin menghapus item ini?\')" class="btn btn-danger">Hapus</a></td>
                                            </tr>';
                                   }
                                   ?>
                                </tbody>
                            </table>
                            <br>
                            <a href="#tambah" class="btn btn-primary" data-toggle="modal">Tambah</a><br>
                             <?php
                                $pesan = $this->session->flashdata('pesan');
                                if($pesan != NULL){
                                    echo ' <div class="alert alert-danger">'.$pesan.'</div>';
                                }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

                              <div class="modal fade" id="tambah" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                             <form action="<?= base_url('index.php/Kasir/Masakan/proses_tambah')?>" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <h2 style="text-align: center;">Tambah Data</h2>
                    
                                                      <label>Nama Masakan</label>
                                                      <input type="text" name="nama_masakan"  class="form-control">
                                                      <label>Gambar</label>
                                                      <input type="file" name="gambar_masakan" class="form-control">
                                                      <label>Harga</label>
                                                      <input type="text" name="harga"  class="form-control">
                                                      <label>Restoran</label>
                                                      <select class="form-control" name="id_restoran">
                                                         <option></option>
                                                          <?php
                                                            foreach ($data_res as $res) {
                                                              echo '<option value="'.$res->id_restoran.'">'.$res->nama_restoran.'</option>';
                                                            }
                                                          ?>
                                                      </select>
                                                      <label>Status Masakan</label>
                                                      <select class="form-control" name="status_masakan">
                                                          <option></option>
                                                          <option value="ada">ada</option>
                                                          <option value="habis">Habis</option>
                                                      </select><br>
                                                       
                                                  
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="simpan" value="Simpan" class="btn btn-info">Simpan</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

 <!-- /.modal ubah -->

 <div class="modal fade" id="ubah" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                             <form action="<?= base_url('index.php/Kasir/Masakan/proses_update')?>" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <h2 style="text-align: center;">Ubah Data</h2>
                                                      <input type="hidden" name="id_masakan" id="id_masakan">
                                                      <label>Nama Masakan</label>
                                                      <input type="text" name="nama_masakan"  class="form-control" id="nama_masakan">
                                                      <label>Gambar</label>
                                                      <input type="file" name="gambar_masakan" class="form-control" id="gambar_masakan">
                                                      <label>Harga</label>
                                                      <input type="text" name="harga"  class="form-control" id="hargamas">
                                                      <label>Restoran</label>
                                                      <select class="form-control" name="id_restoran" id="id_resto">
                                                         <option></option>
                                                          <?php
                                                            foreach ($data_res as $res) {
                                                              echo '<option value="'.$res->id_restoran.'">'.$res->nama_restoran.'</option>';
                                                            }
                                                          ?>
                                                      </select>
                                                      <label>Status Masakan</label>
                                                      <select class="form-control" name="status_masakan" id="status_masakan">
                                                          <option></option>
                                                          <option value="ada">ada</option>
                                                          <option value="habis">Habis</option>
                                                      </select><br>
                                                       
                                                  
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="simpan" value="Simpan" class="btn btn-info">Simpan</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
<script type="text/javascript">
   function tm_detail(id_masakan)
    {
        $.getJSON("<?= base_url()?>index.php/kasir/Masakan/detail/"+id_masakan,function(data){
            $('#id_masakan').val(data['id_masakan']);
            $('#nama_masakan').val(data['nama_masakan']);
            $('#gambar_masakan').val(data['gambar_masakan']);
            $('#hargamas').val(data['harga']);
            $('#id_resto').val(data['id_restoran']);
            $('#status_masakan').val(data['status_masakan']);
        });
    }
</script>