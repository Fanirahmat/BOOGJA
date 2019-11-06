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
                                        <th>ID Kasir</th>
                                        <th>Nama pengurus</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Nama Level</th>
                                        <th>Nama Restoran</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>

                                   <?php
                                   $no=0;
                                   foreach ($data_pengurus as $du) 
                                   {
                                       $no++;
                                       echo '<tr>
                                                <td>'.$no.'</td>
                                                <td>'.$du->id_kasir.'</td>
                                                <td>'.$du->nama_kasir.'</td>
                                                <td>'.$du->username.'</td>
                                                <td>'.$du->password.'</td>
                                                <td>'.$du->nama_level.'</td>
                                                <td>'.$du->nama_restoran.'</td>
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
  
 
