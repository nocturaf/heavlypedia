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
<!-- Dropzone Css -->
<link href="<?php echo base_url()?>assets/backend/plugins/dropzone/dropzone.css" rel="stylesheet">
<!-- Bootstrap Material Datetime Picker Css -->
<link href="<?php echo base_url()?>assets/backend/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
<!-- Wait Me Css -->
<link href="<?php echo base_url()?>assets/backend/plugins/waitme/waitMe.css" rel="stylesheet" />
<!-- Bootstrap Select Css -->
<link href="<?php echo base_url()?>assets/backend/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<link href="<?php echo base_url()?>assets/backend/css/main.css" rel="stylesheet">
<!-- Custom Css -->

<!-- Swift Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="<?php echo base_url()?>assets/backend/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-cyan">
<!-- page loader -->
    <?php $this->load->view('Backend/Superadmin/Pelengkap/V_page_loader') ?>
<!-- end page loader -->

<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->

<!-- header -->
    <?php $this->load->view('Backend/Superadmin/Pelengkap/V_header') ?>
<!-- end header -->

<!-- left sidebar -->
    <?php $this->load->view('Backend/Superadmin/Pelengkap/V_left_sidebar') ?>
<!-- end left sidebar -->

<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Tmabah Data Rumah Sakit / Klinik</h2>
                    </div>
                    <div class="body">
                    <div id="notifications"><?php echo $this->session->flashdata('pesan'); ?></div>
                    <?php 
                      foreach($data_admin as $p) :
                        $id = $p['id_admin'];
                        $nama = $p['nama_admin'];
                        $username = $p['username'];
                        $password = $p['password'];
                        $alamat = $p['alamat'];
                        $no_telp = $p['no_telp'];
                        $email = $p['email'];
                        $latitude = $p['latitude'];
                        $longtitude = $p['longtitude'];
                    ?>
                    <form method="POST" action="<?php echo site_url('Superadmin/Home/Edit_data')?>" onsubmit="return Validate_edit('<?php echo $id ?>')" id="editForm<?php echo $id ?>" enctype="multipart/form-data">
                        <input type="hidden" name="id_admin" class="form-control" value="<?php echo $id;?>">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group" id="nama_div">
                                    <div class="form-line">
                                        <label style="color: black;"><strong>Nama Rumah Sakit / Klinik</strong></label>
                                        <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Lengkap" value="<?php echo $nama;?>">
                                        <span id="nama_error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group" id="latitude_div">
                                    <div class="form-line">
                                        <label style="color: black;"><strong>Latitude</strong></label>
                                        <input type="text" name="latitude" class="form-control" placeholder="Masukan Koordinat Latitude" value="<?php echo $latitude;?>">
                                        <span id="latitude_error"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group" id="longtitude_div">
                                    <div class="form-line">
                                        <label style="color: black;"><strong>Longtitude</strong></label>
                                        <input type="text" name="longtitude" class="form-control" placeholder="Masukan Koordinat Longtitude" value="<?php echo $longtitude;?>">
                                        <span id="longtitude_error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group" id="no_telp_div">
                                    <div class="form-line">
                                        <label style="color: black;"><strong>Nomor Kontak</strong></label>
                                        <input type="text" name="no_telp" class="form-control" placeholder="Masukan Nomor Kontak" value="<?php echo $no_telp;?>">
                                        <span id="no_telp_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group" id="email_div">
                                    <div class="form-line">
                                        <label style="color: black;"><strong>Email</strong></label>
                                        <input type="email" name="email" class="form-control" placeholder="Masukan Email" value="<?php echo $email;?>">
                                        <span id="email_error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group" id="alamat_div">
                                    <div class="form-line">
                                        <label style="color: black;"><strong>Alamat</strong></label><br>
                                        <textarea name="alamat" placeholder="Masukan Alamat" style="width: 100%; min-height: 150px;"><?php echo $alamat;?></textarea>
                                        <span id="alamat_error"></span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-raised g-bg-cyan">Submit</button>
                            </div>
                        </div>
                    </form>
                    <?php endforeach; ?>
                    </div>                
                </div>
            </div>
        </div>

    </div>
</section>

<div class="color-bg"></div>
<!-- Jquery Core Js --> 
<script src="<?php echo base_url()?>assets/backend/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="<?php echo base_url()?>assets/backend/bundles/morphingsearchscripts.bundle.js"></script> <!-- morphing search Js --> 
<script src="<?php echo base_url()?>assets/backend/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 


<script src="<?php echo base_url()?>assets/backend/plugins/autosize/autosize.js"></script> <!-- Autosize Plugin Js --> 
<script src="<?php echo base_url()?>assets/backend/plugins/momentjs/moment.js"></script> <!-- Moment Plugin Js --> 
<script src="<?php echo base_url()?>assets/backend/plugins/dropzone/dropzone.js"></script> <!-- Dropzone Plugin Js -->
<!-- Bootstrap Material Datetime Picker Plugin Js --> 
<script src="<?php echo base_url()?>assets/backend/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script> 

<script src="<?php echo base_url()?>assets/backend/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="<?php echo base_url()?>assets/backend/bundles/morphingscripts.bundle.js"></script><!-- morphing search page js --> 
<script src="<?php echo base_url()?>assets/backend/js/pages/forms/basic-form-elements.js"></script>

<script type="text/javascript">
    // validation function
    function Validate_edit(id) {
       // SELECTING ALL TEXT ELEMENTS
        var nama = $('#editForm' + id + ' input[name=nama]');
        var latitude = $('#editForm' + id + ' input[name=latitude]');
        var longtitude = $('#editForm' + id + ' input[name=longtitude]');
        var alamat = $('#editForm' + id + ' textarea[name=alamat]');
        var no_telp = $('#editForm' + id + ' input[name=no_telp]');
        var email = $('#editForm' + id + ' input[name=email]');

        var nama_div = $('#editForm' + id + ' #nama_div');
        var latitude_div = $('#editForm' + id + ' #latitude_div');
        var longtitude_div = $('#editForm' + id + ' #longtitude_div');
        var alamat_div = $('#editForm' + id + ' #alamat_div');
        var no_telp_div = $('#editForm' + id + ' #no_telp_div');
        var email_div = $('#editForm' + id + ' #email_div');

        // SELECTING ALL ERROR DISPLAY ELEMENTS
        var nama_error = $('#editForm' + id + ' #nama_error');
        var latitude_error = $('#editForm' + id + ' #latitude_error');
        var longtitude_error = $('#editForm' + id + ' #longtitude_error');
        var alamat_error = $('#editForm' + id + ' #alamat_error');
        var no_telp_error = $('#editForm' + id + ' #no_telp_error');
        var email_error = $('#editForm' + id + ' #email_error');

        // RESET
        nama.css('border', "1px solid #ccc");
        nama_div.css('color', "#555");

        latitude.css('border', "1px solid #ccc");
        latitude_div.css('color', "#555");

        longtitude.css('border', "1px solid #ccc");
        longtitude_div.css('color', "#555");


        alamat.css('border', "1px solid #ccc");
        alamat_div.css('color', "#555");

        no_telp.css('border', "1px solid #ccc");
        no_telp_div.css('color', "#555");

        email.css('border', "1px solid #ccc");
        email_div.css('color', "#555");

        nama_error.html("");
        latitude_error.html("");
        longtitude_error.html("");
        alamat_error.html("");
        no_telp_error.html("");
        email_error.html("");

        var letters = /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/;
        var alphanumeric = /^[0-9a-zA-Z]+$/;
        var status = true;

        if (nama.val() == "") {
            nama.css('border', "1px solid red");
            nama_div.css('color', "red");
            nama_error.html("Nama Tidak Boleh Kosong");
            nama.focus();
            status = false;
        }
        else if (!(nama.val().match(letters))) {
            nama.css('border', "1px solid red");
            nama_div.css('color', "red");
            nama_error.html("Nama Hanya Boleh Huruf");
            nama.focus();
            status = false;
        }
        else{
            nama_error.val("");
        }

        if (latitude.val() == "") {
            latitude.css('border', "1px solid red");
            latitude_div.css('color', "red");
            latitude_error.html("Koordinat Latitude Tidak Boleh Kosong");
            latitude.focus();
            status = false;
        }
        else if (isNaN(latitude.val())) {
            latitude.css('border', "1px solid red");
            latitude_div.css('color', "red");
            latitude_error.html("Nomor Kontak Harus Angka");
            latitude.focus();
            status = false;
        }
        else{
            latitude_error.val("");
        }

        if (longtitude.val() == "") {
            longtitude.css('border', "1px solid red");
            longtitude_div.css('color', "red");
            longtitude_error.html("Koordinat Longtitude Tidak Boleh Kosong");
            longtitude.focus();
            status = false;
        }
        else if (isNaN(longtitude.val())) {
            longtitude.css('border', "1px solid red");
            longtitude_div.css('color', "red");
            longtitude_error.html("Nomor Kontak Harus Angka");
            longtitude.focus();
            status = false;
        }
        else{
            longtitude_error.val("");
        }

        if (alamat.val() == "") {
            alamat.css('border', "1px solid red");
            alamat_div.css('color', "red");
            alamat_error.html("Alamat Tidak Boleh Kosong");
            alamat.focus();
            status = false;
        }
        else{
            alamat_error.val("");
        }

        if (no_telp.val() == "") {
            no_telp.css('border', "1px solid red");
            no_telp_div.css('color', "red");
            no_telp_error.html("Nomor Kontak Tidak Boleh Kosong");
            no_telp.focus();
            status = false;
        }
        else if (isNaN(no_telp.val())) {
            no_telp.css('border', "1px solid red");
            no_telp_div.css('color', "red");
            no_telp_error.html("Nomor Kontak Harus Angka");
            no_telp.focus();
            status = false;
        }
        else{
            no_telp_error.val("");
        }

        if (email.val() == "") {
            email.css('border', "1px solid red");
            email_div.css('color', "red");
            email_error.html("Email Tidak Boleh Kosong");
            email.focus();
            status = false;
        }
        else{
            email_error.val("");
        }

      return status;
    }
</script> 
</body>
</html>