<div class="form-element-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list">
                        <div class="basic-tb-hd">
                            <h2>Filter Tanggal</h2>
                        </div>
                        <div class="row">
                            <form action="<?= base_url()?>index.php/admin/Verifikasi/cari" method="post">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                    <div class="form-group">
                                        <div class="nk-int-st">
                                            <input type="date" name="tanggal" class="form-control" placeholder="tanggal">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <button class="btn btn-success notika-btn-success">Cari</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="normal-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="normal-table-list mg-t-30">
                        <div class="basic-tb-hd">
                            <h2>Data Riwayat Order</h2>
                        </div>
                        <div class="bsc-tbl-st">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Tanggal</th>
                                        <th>Nama Restoran</th>
                                        <th>No. Meja</th>
                                        <th>Nama Masakan</th>
                                        <th>Jumlah</th>
                                        <th>Total Bayar</th>

                                    </tr>
                                </thead>
                                <tbody>

                                   <?php
                                      $no=0;
                                      foreach ($data_nota as $dn)
                                      {
                                        $no++;
                                        echo '<tr>
                                            <td>'.$no.'</td>
                                            <td>'.$dn->nama.'</td>
                                            <td>'.$dn->tanggal.'</td>
                                            <td>'.$dn->nama_restoran.'</td>
                                            <td>'.$dn->no_meja.'</td>
                                            <td>'.$dn->nama_masakan.'</td>
                                            <td>'.$dn->jumlah.'</td>
                                            <td>'.$dn->total_bayar.'</td>

                                          </tr>';
                                      }
                                      ?>
                                </tbody>
                            </table>
                            <br>
                            <a href="<?=base_url()?>index.php/admin/Verifikasi/tampil_nota" class="btn btn-primary notika-btn-primary">Reset Filter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">

</script>
