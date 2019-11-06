<div class="normal-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="normal-table-list mg-t-30">
                        <div class="basic-tb-hd">
                            <h2>Data pengurus</h2>
                            
                        </div>
                        <div class="bsc-tbl-st">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>ID Pelanggan</th>
                                        <th>Nama</th>
                                        <th>alamat</th>
                                        <th>telp</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                   <?php
                                   $no=0;
                                   foreach ($data_pel as $dp) 
                                   {
                                       $no++;
                                       echo '<tr>
                                                <td>'.$no.'</td>
                                                <td>'.$dp->id_pelanggan.'</td>
                                                <td>'.$dp->nama.'</td>
                                                <td>'.$dp->alamat.'</td>
                                                <td>'.$dp->telp.'</td>
                                                <td>'.$dp->username.'</td>
                                                <td>'.$dp->password.'</td>
                                                
                                                <td>
                                                     <a href='.base_url('index.php/admin/Pelanggan/proses_hapus/'.$dp->id_pelanggan).' onclick="return confirm(\'anda yakin menghapus item ini?\')" class="btn btn-danger">Hapus</a></td>
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
   
<script type="text/javascript">
   
</script>