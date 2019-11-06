<!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Riwayat Booking</h1>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
         
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

   <!--/ Services Star /-->
  <section class="section-services section-t2">
    <div class="container">
      <div class="row" id="tampil_riwayat">
        
      </div>
    </div>
  </section>
  <!--/ Services End /-->

  <script type="text/javascript">
    $.getJSON("<?= base_url()?>index.php/pelanggan/Riwayat/tampil_riwayat",function(data){
      var tampil='';
      $.each(data,function(key,dt){
        tampil+=
        '<div class="col-md-4">'+
          '<div class="card-box-c foo">'+
            '<div class="card-header-c d-flex">'+
              '<div class="card-box-ico">'+
                '<table class="table">'+
                  '<tr><td>Tanggal</td><td> : '+dt['tanggal']+'</td></tr>'+
                  '<tr><td>Bayar</td><td> : '+dt['total_bayar']+'</td></tr>'+
                  '<tr><td>Status</td><td> : '+dt['status_order']+'</td></tr>'+
                '</table>'+
                '<a href="<?= base_url()?>index.php/admin/Verifikasi/cetak_nota/'+dt['id_order']+'" class="btn btn-warning">Lihat Nota</a>'+
              '</div>'+
            '</div>'+
          '</div>'+
        '</div>'
      });
      $('#tampil_riwayat').html(tampil);
    });
  </script>