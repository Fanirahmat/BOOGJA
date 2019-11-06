<div class="normal-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="normal-table-list mg-t-30">
                        <div class="basic-tb-hd">
                            <h2>Data Order</h2><br>
                            <a href="#" class="btn btn-success">Export ke Excel</a>
                        </div>
                        <div class="bsc-tbl-st">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>ID Order</th>
                                        <th>Tanggal</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Username</th>
                                        <th>Total Bayar</th>
                                        <th>Bukti</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                   <?php
                                      $no=0;
                                      foreach ($data_pel as $dt_p) {
                                        $no++;
                                        echo '<tr>
                                              <td>'.$no.'</td>
                                              <td>'.$dt_p->id_order.'</td>
                                              <td>'.$dt_p->tanggal.'</td>
                                              <td>'.$dt_p->nama.'</td>
                                              <td>'.$dt_p->username.'</td>
                                              <td>'.$dt_p->total_bayar.'</td>
                                              <td><img src='.base_url("assets/bukti/$dt_p->bukti").' width="100px" height="75px" class="img-fluid"></td>
                                              <td>'.$dt_p->status_order.'</td>
                                                  <td><a href="#update" class="btn btn-warning" data-toggle="modal" onclick="tm_detail('.$dt_p->id_order.')">Update</a>
                                                      <a href='.base_url('index.php/admin/Verifikasi/cetak_nota/'.$dt_p->id_order).' class="btn btn-info" onclick="">Cetak Nota</a></td>
                                            </tr>';
                                      }

                                      ?>
        
                                </tbody>
                            </table>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                                <div class="modal fade" id="update" role="dialog">
                                    <div class="modal-dialog modals-default nk-light-blue">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url('index.php/admin/Verifikasi/update')?>" method="post">
                                                  <input type="hidden" name="id_order" id="id_order">
                                                  <label>Status</label>
                                                  <select class="form-control" name="ubah_status" id="ubah_status">
                                                      <option value="proses">proses</option>
                                                      <option value="lunas">lunas</option>
                                                  </select><br>
                                                  <button type="submit" name="simpan" value="Simpan" class="btn btn-success">Simpan</button> 
                                                </form>
                                            </div>
                                            <div class="modal-footer">
  
                                            </div>
                                        </div>
                                    </div>
                                </div>
   
<script type="text/javascript">
    function tm_detail(id_order)
      {
        $.getJSON("<?= base_url()?>index.php/admin/Verifikasi/get_detail_order/"+id_order,function(data)
          {
            $('#id_order').val(data['id_order']);
            $('#ubah_status').val(data['status']);
          });
      }
</script>