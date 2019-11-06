<div class="normal-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="normal-table-list mg-t-30">
                        <div class="basic-tb-hd">
                            <h2>Data restoran</h2><br>
                            <a href="#tambah" class="btn btn-primary" data-toggle="modal">Tambah</a><br>
                            
                        </div>
                        <div class="bsc-tbl-st">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>ID Restoran</th>
                                        <th>Nama Restoran</th>
                                        <th>Gambar</th>
                                        <th>Alamat Restoran</th>
                                        <th>Jumlah meja</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                   <?php
                                   $no=0;
                                   foreach ($datares as $dr) 
                                   {
                                       $no++;
                                       
                                       echo '<tr>
                                                <td>'.$no.'</td>
                                                <td>'.$dr->id_restoran.'</td>
                                                <td>'.$dr->nama_restoran.'</td>
                                                <td><img src='.base_url("assets/gambar/$dr->gambar").' width="100px" height="75px"></td>
                                                <td>'.$dr->alamat_restoran.'</td>
                                                <td>'.$dr->jumlah_meja.'</td>
                                                <td><a href="#ubah" onclick="tm_detail('.$dr->id_restoran.')" class="btn btn-warning" data-toggle="modal">Ubah</a>
                                                     <a href='.base_url('index.php/admin/Restoran/hapus/'.$dr->id_restoran).' onclick="return confirm(\'anda yakin menghapus item ini?\')" class="btn btn-danger">Hapus</a></td>
                                            </tr>';
                                   }
                                   ?>
                                </tbody>
                            </table>
                            <br>
                            
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
                                             <form action="<?= base_url('index.php/admin/Restoran/proses_tambah')?>" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <h2 style="text-align: center;">Tambah Data</h2>
                    
                                                      <label>Nama Restoran</label>
                                                      <input type="text" name="nama_restoran"  class="form-control">
                                                      <label>Gambar</label>
                                                      <input type="file" name="gambar" class="form-control">
                                                      <label>Alamat Restoran</label>
                                                      <input type="text" name="alamat_restoran"  class="form-control"><br>
                                                      <label>Jumlah meja</label>
                                                      <input type="number" name="jmlh_meja"  class="form-control"><br>
                                                     
                                                  
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
                                             <form action="<?= base_url('index.php/admin/Restoran/proses_update')?>" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <h2 style="text-align: center;">Ubah Data</h2>
                                                <input type="hidden" name="id_restoran" id="id_restoran">
                                                       <label>Nama Restoran</label>
                                                      <input type="text" name="nama_restoran"  class="form-control" id="nama_restoran">
                                                      <label>Gambar</label>
                                                      <input type="file" name="gambar" class="form-control" id="gambar">
                                                      <label>Alamat Restoran</label>
                                                      <input type="text" name="alamat_restoran"  class="form-control" id="alamat_restoran"><br>
                                                      <label>Jumlah Meja</label>
                                                      <input type="number" name="jmlh_meja"  class="form-control" id="jmlh_meja"><br>
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
   function tm_detail(id_restoran)
   {
      $.getJSON("<?= base_url()?>index.php/admin/Restoran/get_detail/"+id_restoran,function(data){
        $('#id_restoran').val(data['id_restoran']);
        $('#nama_restoran').val(data['nama_restoran']);
        $('#alamat_restoran').val(data['alamat_restoran']);
        $('#jmlh_meja').val(data['jmlh_meja']);
      });
   }
</script>