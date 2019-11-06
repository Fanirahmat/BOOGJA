<head>
	 <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url()?>assets2/img/speaker.png">
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

<div class="normal-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="normal-table-list mg-t-30">
                        <div class="basic-tb-hd">
                            <h2>Nota</h2>
                            
                        </div>
                        <div class="bsc-tbl-st">
                            <table border="1" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Nama Restoran</th>    
                                        <th style="text-align: center;">Masakan</th>
                                        <th style="text-align: center;">Harga</th>
                                        <th style="text-align: center;">Jumlah</th>
                                        <th style="text-align: center;">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php
                                        $no=0;
                                        $sub=0;
                                        foreach ($data_order as $dt_der) {
                                          $no++;
                                          $sub= $dt_der->harga*$dt_der->jumlah;
                                          echo '<tr style="text-align:center;">
                                              <td>'.$no.'</td>
                                              <td>'.$dt_der->nama_restoran.'</td>
                                              <td>'.$dt_der->nama_masakan.'</td>
                                              <td>'.$dt_der->harga.'</td>
                                              <td>'.$dt_der->jumlah.'</td>
                                              <td>Rp.'.$sub.',-</td>
                                              </tr>';
										
                                        }

                                        echo
                                        '<tr>
                                            <td colspan="5">Total Bayar</td>
                                            <td> Rp.'.$dt_der->total_bayar.',00-</td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">Tanggal</td>
                                            <td> '.$dt_der->tanggal.'</td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">No Meja</td>
                                            <td> '.$dt_der->no_meja.'</td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">Pelanggan</td>
                                            <td> '.$dt_der->nama.'</td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">Kasir</td>
                                            <td> '.$this->session->userdata('username').'</td>
                                        </tr>';
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

    <?php
        if ($this->session->userdata('id_pelanggan')) 
        {
            ?>

            
      <?php      
        } 
        else 
        {
            ?>

             <script>
            window.print();
            </script>
    <?php
        }
        
    ?>
   

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

    

    
                  
