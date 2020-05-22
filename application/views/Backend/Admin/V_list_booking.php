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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="theme-cyan">
<!-- page loader -->
    <?php $this->load->view('Backend/Admin/Pelengkap/V_page_loader') ?>
<!-- end page loader -->

<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->

<!-- header -->
    <?php $this->load->view('Backend/Admin/Pelengkap/V_header') ?>
<!-- end header -->

<!-- left sidebar -->
    <?php $this->load->view('Backend/Admin/Pelengkap/V_left_sidebar') ?>
<!-- end left sidebar -->

<section class="content home">
    <div class="container-fluid">
        <!-- Isi Konten -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2> List Booking </h2>
                        <a href="<?php echo site_url('Admin/List_booking/Refresh');?>">
                            <button type="button" class="btn btn-raised btn-info waves-effect"> Refresh</button>
                        </a><br>
                        <div style="float: right; clear: both;">
                            <form method="POST" action="<?php echo site_url('Admin/List_booking/Search');?>">
                                <input type="text" name="search" placeholder="Search">
                                <button type="submit" class="btn btn-raised btn-info waves-effect"> Search</button>
                            </form>                         
                        </div>
                        
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">Nama Pasien</th>
                                <th style="text-align: center;">Nama Dokter</th>
                                <th style="text-align: center;">Hari dan Tanggal</th>
                                <th style="text-align: center;">Jam</th>
                                <th style="text-align: center;">Poli</th>
                                <th style="text-align: center;">Kode Booking</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Konfirmasi</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    foreach($list as $p) :
                                        $id_booking = $p['id_booking'];
                                        $nama_pasien = $p['nama_pasien'];
                                        $nama_dokter = $p['nama_dokter'];
                                        $tgl_booking = $p['tgl_booking'];
                                        $jam_booking = $p['jam_booking'];
                                        $poli = $p['poli']; 
                                        $status = $p['status']; 

                                        $temp = explode(" ", $tgl_booking);
                                        $hari = $temp[0];
                                        $tanggal = $temp[1];
                                        $bulan = $temp[2];
                                        $tahun = $temp[3];

                                        if($hari == 'Sunday'){
                                            $hari = 'Minggu';
                                        }
                                        else if($hari == 'Monday'){
                                            $hari = 'Senin';
                                        }
                                        else if($hari == 'Tuesday'){
                                            $hari = 'Selasa';
                                        }
                                        else if($hari == 'Wednesday'){
                                            $hari = 'Rabu';
                                        }
                                        else if($hari == 'Thursday'){
                                            $hari = 'Kamis';
                                        }
                                        else if($hari == 'Friday'){
                                            $hari = 'Jumat';
                                        }
                                        else if($hari == 'Saturday'){
                                            $hari = 'Sabtu';
                                        }

                                        $tgl_booking = $hari." ".$tanggal." ".$bulan." ".$tahun;
                                ?>
                                <tr>
                                    <td style="text-align: center; padding-top: 2em;"><?php echo $no; ?></td>
                                    <td style="text-align: center; padding-top: 2em;"><?php echo $nama_pasien; ?></td>
                                    <td style="text-align: center; padding-top: 2em;"><?php echo $nama_dokter; ?></td>
                                    <td style="text-align: center; padding-top: 2em;"><?php echo $tgl_booking; ?></td>
                                    <td style="text-align: center; padding-top: 2em;"><?php echo $jam_booking; ?></td>
                                    <td style="text-align: center; padding-top: 2em;"><?php echo $poli; ?></td>
                                    <td style="text-align: center; padding-top: 2em;"><?php echo $id_booking; ?></td>
                                    <?php  
                                        if($status == 'Dikonfirmasi'){
                                    ?>
                                        <td style="text-align: center; padding-top: 2em;color: green;"><b><?php echo $status; ?></b></td>
                                    <?php 
                                        } else if ($status == 'Menunggu Konfirmasi'){
                                    ?>
                                        <td style="text-align: center; padding-top: 2em; color: orange;"><b><?php echo $status; ?></b></td>
                                    <?php 
                                        } else {
                                    ?>
                                        <td style="text-align: center; padding-top: 2em; color: red;"><b><?php echo $status; ?></b></td>
                                    <?php } ?>

                                    <?php  
                                        if($status == 'Menunggu Konfirmasi'){
                                    ?>
                                        <td style="text-align: center;">
                                            <a data-toggle="modal" data-target="#ModalConfirm<?php echo $p['id_booking'];?>">
                                                <button type="button" class="btn btn-raised btn-info waves-effect">Confirm</button>
                                            </a>
                                        </td>
                                    <?php 
                                        }
                                    ?>
                                </tr>
                                <?php 
                                    $no++;
                                    endforeach;  
                                ?>
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Isi Konten -->
    </div>

    <!-- Modal Konfirmasi Booking -->
        <?php 
        foreach($list as $k) :
            $id     = $k['id_booking'];
            $nama   = $k['nama_pasien'];
        ?>
        <!--Modal Hapus Karyawan-->
        <div class="modal fade" id="ModalConfirm<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Konfirmasi Booking</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo site_url('Admin/List_booking/Konfirmasi_booking');?>" method="POST">
                        <div class="modal-body">
                            <input type="hidden" name="id_booking" value="<?php echo $id;?>"/>
                            <p>Apakah kamu yakin ingin mengkonfirmasi pemesanan atas nama <?php echo $nama; ?></b> ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-raised btn-default waves-effect" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn  btn-raised btn-info waves-effect" id="simpan">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <!-- End Modal Konfirmasi Booking -->
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