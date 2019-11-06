<!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">List Restoran</h1>
            <span class="color-text-a">Yang bekerjasama dengan Boogja</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                List Restoran
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Agents Grid Star /-->
  <section class="agents-grid grid">
    <div class="container">
      <div class="row" id="tampil_restoran">
        
      </div>
    </div>
  </section>
  <!--/ Agents Grid End /-->

  <script type="text/javascript">
    //menampilkan list restoran terdaftar
    $.getJSON("<?= base_url()?>index.php/pelanggan/Get_restoran",function(data){
    var tampil="";
    $.each(data,function(key,dt){
      tampil+=
      '<div class="col-md-4">'+
          '<div class="card-box-d">'+
            '<div class="card-img-d">'+
              '<img src="<?=base_url('assets/gambar/')?>'+dt['gambar']+'" alt="" class="img-d img-fluid" style="width: 600px; height: 450px;">'+
            '</div>'+
            '<div class="card-overlay card-overlay-hover">'+
              '<div class="card-header-d">'+
                '<div class="card-title-d align-self-center">'+
                  '<h3 class="title-d">'+
                    '<a href="#" class="link-two">'+dt['nama_restoran']+'</a>'+
                  '</h3>'+
                '</div>'+
              '</div>'+
              '<div class="card-body-d">'+
                '<p class="content-d color-text-a">Deskripsi</p>'+
                '<div class="info-agents color-a">'+
                  '<p>'+
                    '<strong>Alamat: </strong>'+dt['alamat_restoran']+'</p>'+
                  '<p>'+
                    '<strong>Status: </strong>'+dt['status']+'</p>'+
                    '<p>'+
                    '<strong>Jam Buka: </strong>'+dt['jam_buka']+'</p>'+
                '</div>'+
              '</div>'+
              '<div class="card-footer-d">'+
                '<div class="socials-footer d-flex justify-content-center">'+
                  '<ul class="list-inline">'+
                    '<li class="list-inline-item">'+
                      '<a href="#" class="link-one">'+
                        '<i class="fa fa-facebook" aria-hidden="true"></i>'+
                      '</a>'+
                    '</li>'+
                    '<li class="list-inline-item">'+
                      '<a href="#" class="link-one">'+
                        '<i class="fa fa-twitter" aria-hidden="true"></i>'+
                      '</a>'+
                    '</li>'+
                    '<li class="list-inline-item">'+
                      '<a href="#" class="link-one">'+
                        '<i class="fa fa-instagram" aria-hidden="true"></i>'+
                      '</a>'+
                    '</li>'+
                    '<li class="list-inline-item">'+
                      '<a href="#" class="link-one">'+
                        '<i class="fa fa-pinterest-p" aria-hidden="true"></i>'+
                      '</a>'+
                    '</li>'+
                    '<li class="list-inline-item">'+
                      '<a href="#" class="link-one">'+
                        '<i class="fa fa-dribbble" aria-hidden="true"></i>'+
                      '</a>'+
                    '</li>'+
                  '</ul>'+
                '</div>'+
              '</div>'+
            '</div>'+
          '</div>'+
        '</div>'
    });
    $("#tampil_restoran").html(tampil);
  });

  </script>