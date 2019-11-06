<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard One | Notika - Notika Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url()?>assets/img/boogja.png">
    <!-- Google Fonts
        ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap.min.css">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/font-awesome.min.css">
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/owl.theme.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/owl.transitions.css">
    <!-- meanmenu CSS
        ============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/animate.css">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/normalize.css">
    <!-- mCustomScrollbar CSS
        ============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- jvectormap CSS
        ============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- notika icon CSS
        ============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/notika-custom-icon.css">
    <!-- wave CSS
        ============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/wave/waves.min.css">
    <!-- main CSS
        ============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/main.css">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>assets/style.css">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/responsive.css">
    <!-- modernizr JS
        ============================================ -->
    <script src="<?= base_url()?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="<?= base_url()?>assets/js/vendor/jquery-1.12.4.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="#"><img src="<?= base_url()?>assets/img/logo2.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">
                            

                            <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-support"></i>  <?php echo $this->session->userdata('username');?></span></a>
                                <ul class="dropdown-menu nk-teal" role="menu">
                                    <?php 
                                        if ($this->session->userdata('nama_level')=="admin") 
                                        {
                                            ?>
                                                <li role="presentation"><a href="<?= base_url()?>index.php/admin/Login/logout" role="menuitem"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                                            <?php
                                        }
                                        else if ($this->session->userdata('nama_level')=="kasir") 
                                        {
                                            ?>
                                             <li role="presentation"><a href="<?= base_url()?>index.php/kasir/Login_kasir/logout" role="menuitem"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                                            <?php
                                        }
                                        else
                                        {
                                           
                                        }
                                    ?>
                                        
                              
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->
    
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                                 <?php
                            if ($this->session->userdata('nama_level')=="admin") 
                            {
                                ?>
                        
                        
                        <li><a href="<?= base_url()?>index.php/admin/Restoran"><i class="notika-icon notika-support"></i> Daftar Restoran</a>
                        </li>
                         <li><a href="<?= base_url()?>index.php/kasir/Masakan"><i class="notika-icon notika-windows"></i> Tabel Menu</a>
                        </li>
                        <li><a href="<?= base_url()?>index.php/admin/Pengurus"><i class="notika-icon notika-support"></i> Daftar kasir</a>
                        </li>
                        <li><a href="<?= base_url()?>index.php/admin/Pelanggan"><i class="notika-icon notika-support"></i> Daftar Pelanggan</a>
                        </li>
                        <li><a href="<?= base_url()?>index.php/admin/Verifikasi"><i class="notika-icon notika-edit"></i> Verifikasi Order</a>
                        </li>
                        <li><a href="<?= base_url()?>index.php/admin/Verifikasi/tampil_nota"><i class="notika-icon notika-bar-chart"></i> Riwayat Order</a>
                        </li>
                         <?php       
                            }
                            else if ($this->session->userdata('nama_level')=="kasir") 
                            {
                               ?>
                               <li><a href="<?= base_url()?>index.php/kasir/Masakan"><i class="notika-icon notika-windows"></i> Tabel Menu</a>
                                </li>
                                
                               <li><a href="<?= base_url()?>index.php/admin/Verifikasi"><i class="notika-icon notika-edit"></i> Verifikasi Order</a>
                                </li>
                                <li><a href="<?= base_url()?>index.php/admin/Verifikasi/tampil_nota"><i class="notika-icon notika-bar-chart"></i> Riwayat Order</a>
                                 </li>

                               <?php
                            }
                            else
                            {
                                ?>
                                    
                                
                                
                                <?php
                            }
                        ?>
                    
                        
                        
                       
                        </ul>
                       
                    </div>
                </div>
            </div>
        </div>
    
        <div>
            <?php
                $this->load->view($konten);
            ?>
        </div>
    <!-- jquery
        ============================================ -->
  
    <!-- bootstrap JS
        ============================================ -->
    <script src="<?= base_url()?>assets/js/bootstrap.min.js"></script>
    <!-- wow JS
        ============================================ -->
    <script src="<?= base_url()?>assets/js/wow.min.js"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="<?= base_url()?>assets/js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="<?= base_url()?>assets/js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="<?= base_url()?>assets/js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="<?= base_url()?>assets/js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
        ============================================ -->
    <script src="<?= base_url()?>assets/js/counterup/jquery.counterup.min.js"></script>
    <script src="<?= base_url()?>assets/js/counterup/waypoints.min.js"></script>
    <script src="<?= base_url()?>assets/js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="<?= base_url()?>assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- jvectormap JS
        ============================================ -->
    <script src="<?= base_url()?>assets/js/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?= base_url()?>assets/js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?= base_url()?>assets/js/jvectormap/jvectormap-active.js"></script>
    <!-- sparkline JS
        ============================================ -->
    <script src="<?= base_url()?>assets/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?= base_url()?>assets/js/sparkline/sparkline-active.js"></script>
    <!-- sparkline JS
        ============================================ -->
    <script src="<?= base_url()?>assets/js/flot/jquery.flot.js"></script>
    <script src="<?= base_url()?>assets/js/flot/jquery.flot.resize.js"></script>
    <script src="<?= base_url()?>assets/js/flot/curvedLines.js"></script>
    <script src="<?= base_url()?>assets/js/flot/flot-active.js"></script>
    <!-- knob JS
        ============================================ -->
    <script src="<?= base_url()?>assets/js/knob/jquery.knob.js"></script>
    <script src="<?= base_url()?>assets/js/knob/jquery.appear.js"></script>
    <script src="<?= base_url()?>assets/js/knob/knob-active.js"></script>
    <!--  wave JS
        ============================================ -->
    <script src="<?= base_url()?>assets/js/wave/waves.min.js"></script>
    <script src="<?= base_url()?>assets/js/wave/wave-active.js"></script>
    <!--  todo JS
        ============================================ -->
    <script src="<?= base_url()?>assets/js/todo/jquery.todo.js"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="<?= base_url()?>assets/js/plugins.js"></script>
    <!--  Chat JS
        ============================================ -->
    <script src="<?= base_url()?>assets/js/chat/moment.min.js"></script>
    <script src="<?= base_url()?>assets/js/chat/jquery.chat.js"></script>
    <!-- main JS
        ============================================ -->
    <script src="<?= base_url()?>assets/js/main.js"></script>
    <!-- tawk chat JS
        ============================================ -->
    <script src="<?= base_url()?>assets/js/tawk-chat.js"></script>
</body>

</html>