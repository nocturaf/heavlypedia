<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<title><?php echo $title ?></title>
<meta name="description" content="<?php echo $description ?>"> 
<meta name="keywords" content="<?php echo $keywords ?>">

<link rel="icon" href="<?php echo base_url()?>assets/backend/images/favicon.ico" type="image/x-icon">
<link href="<?php echo base_url()?>assets/backend/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>assets/backend/plugins/morrisjs/morris.css" rel="stylesheet" />
<!-- Custom Css -->
<link href="<?php echo base_url()?>assets/backend/css/main.css" rel="stylesheet">
<!-- Swift Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="<?php echo base_url()?>assets/backend/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-cyan">
<!-- page loader -->
    <?php $this->load->view('Backend/User/Pelengkap/V_page_loader') ?>
<!-- end page loader -->

<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->

<!-- header -->
    <?php $this->load->view('Backend/User/Pelengkap/V_header') ?>
<!-- end header -->

<!-- left sidebar -->
    <?php $this->load->view('Backend/User/Pelengkap/V_left_sidebar') ?>
<!-- end left sidebar -->

<section class="content home">
    <div class="container-fluid">

        <!-- End Menu Bagian Atas -->
        <br>
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="body">
                        <div>
                            <center>
                                <img src="<?php echo base_url()?>assets/backend/images/404.jpg" style="width: 720px; height: 480px;">
                                <br>
                                <a href="<?php echo site_url('Booking');?>">
                                    <button type="button" class="btn btn-raised btn-info waves-effect"></i> Kembali </button>
                                </a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Menu Bagian Atas -->
    </div>
</section>

<div class="color-bg"></div>
<!-- Jquery Core Js --> 
<script src="<?php echo base_url()?>assets/backend/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="<?php echo base_url()?>assets/backend/bundles/morphingsearchscripts.bundle.js"></script> <!-- morphing search Js --> 
<script src="<?php echo base_url()?>assets/backend/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<script src="<?php echo base_url()?>assets/backend/plugins/jquery-sparkline/jquery.sparkline.min.js"></script> <!-- Sparkline Plugin Js -->
<script src="<?php echo base_url()?>assets/backend/plugins/chartjs/Chart.bundle.min.js"></script> <!-- Chart Plugins Js --> 

<script src="<?php echo base_url()?>assets/backend/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="<?php echo base_url()?>assets/backend/bundles/morphingscripts.bundle.js"></script><!-- morphing search page js --> 
<script src="<?php echo base_url()?>assets/backend/js/pages/index.js"></script>
<script src="<?php echo base_url()?>assets/backend/js/pages/charts/sparkline.min.js"></script>
</body>
</html>