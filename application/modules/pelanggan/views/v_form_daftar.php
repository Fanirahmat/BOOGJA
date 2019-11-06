<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Daftar Akun</title>

    <!-- Icons font CSS-->
    <link href="<?= base_url()?>assets2/img/login.png" rel="icon">
    <link href="<?= base_url()?>assets3/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url()?>assets3/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="<?= base_url()?>assets3/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url()?>assets3/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?= base_url()?>assets3/css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper p-t-45 p-b-50" style="background-color: #2eca6a;">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Silahkan Isi Data Diri Anda !!!</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= base_url()?>index.php/pelanggan/Login_pelanggan/proses_daftar">
                        <div class="form-row">
                            <div class="name">Nama</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="nama" value="<?= set_value('nama');?>">
                                    <?= form_error('nama','<small style="color: red;">','</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email" value="<?= set_value('email');?>">
                                    <?= form_error('email','<small style="color: red;">','</small>')?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Alamat</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="alamat" value="<?= set_value('alamat');?>">
                                    <?= form_error('alamat','<small style="color: red;">','</small>')?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="name">Phone</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="telp" value="<?= set_value('telp');?>">
                                    <?= form_error('telp','<small style="color: red;">','</small>')?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Akun</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" placeholder="username" name="username" value="<?= set_value('username');?>">
                                            <?= form_error('username','<small style="color: red;">','</small>')?>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" placeholder="password" type="password" name="password" value="<?= set_value('password');?>">
                                            <?= form_error('password','<small style="color: red;">','</small>')?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn--radius-2 btn--blue" type="submit">Register</button>
                            
                            
                        </div>
                         

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="<?= base_url()?>assets3/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="<?= base_url()?>assets3/vendor/select2/select2.min.js"></script>
    <script src="<?= base_url()?>assets3/vendor/datepicker/moment.min.js"></script>
    <script src="<?= base_url()?>assets3/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="<?= base_url()?>assets3/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->