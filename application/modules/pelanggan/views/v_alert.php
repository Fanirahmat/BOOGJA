<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Boogja</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="<?= base_url()?>assets2/img/login.png" rel="icon">
  <link href="<?= base_url()?>assets2/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?= base_url()?>assets2/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?= base_url()?>assets2/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?= base_url()?>assets2/lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?= base_url()?>assets2/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="<?= base_url()?>assets2/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?= base_url()?>assets2/css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: EstateAgency
    Theme URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  
 

  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-7">
          <div class="title-single-box">
            <h1 class="title-single">"alert"</h1>
            <?= $this->session->flashdata('pesan_login');?>
            <br>
            <a href="<?= base_url()?>index.php/pelanggan/LandController" class="btn btn-danger">Kembali ke Beranda</a>
          </div>
        </div>
        <div class="col-md-12 col-lg-5">
          
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  

  <!-- JavaScript Libraries -->
  <script src="<?= base_url()?>assets2/lib/jquery/jquery.min.js"></script>
  <script src="<?= base_url()?>assets2/lib/jquery/jquery-migrate.min.js"></script>
  <script src="<?= base_url()?>assets2/lib/popper/popper.min.js"></script>
  <script src="<?= base_url()?>assets2/lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url()?>assets2/lib/easing/easing.min.js"></script>
  <script src="<?= base_url()?>assets2/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="<?= base_url()?>assets2/lib/scrollreveal/scrollreveal.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="<?= base_url()?>assets2/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="<?= base_url()?>assets2/js/main.js"></script>

</body>
</html>
