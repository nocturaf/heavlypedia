<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<title><?php echo $title ?></title>
<meta name="description" content="<?php echo $description ?>"> 
<meta name="keywords" content="<?php echo $keywords ?>">

<link rel="icon" href="favicon.ico" type="image/x-icon">
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
                    <form method="POST" action="<?php echo site_url('Superadmin/Home/Tambah_data')?>" onsubmit="return Validate()" id="addForm" enctype="multipart/form-data">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group" id="nama_div">
                                    <div class="form-line">
                                        <label style="color: black;"><strong>Nama Rumah Sakit / Klinik</strong></label>
                                        <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Rumah Sakit / Klinik">
                                        <span id="nama_error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group" id="username_div">
                                    <div class="form-line">
                                        <label style="color: black;"><strong>Username</strong></label>
                                        <br><span id="username_result"></span>
                                        <input type="text" name="username" id="username" class="form-control" placeholder="Masukan Username" >
                                        <span id="username_error"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group" id="password_div">
                                    <div class="form-line">
                                        <label style="color: black;"><strong>Password</strong></label>
                                        <input type="password" name="password" class="form-control" placeholder="Masukan Password">
                                        <span id="password_error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group" id="latitude_div">
                                    <div class="form-line">
                                        <label style="color: black;"><strong>Latitude</strong></label>
                                        <input type="text" name="latitude" class="form-control" placeholder="Masukan Koordinat Latitude">
                                        <span id="latitude_error"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group" id="longtitude_div">
                                    <div class="form-line">
                                        <label style="color: black;"><strong>Longtitude</strong></label>
                                        <input type="text" name="longtitude" class="form-control" placeholder="Masukan Koordinat Longtitude">
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
                                        <input type="text" name="no_telp" class="form-control" placeholder="Masukan Nomor Kontak">
                                        <span id="no_telp_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group" id="email_div">
                                    <div class="form-line">
                                        <label style="color: black;"><strong>Email</strong></label>
                                        <input type="email" name="email" class="form-control" placeholder="Masukan Email">
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
                                        <textarea rows="7" cols="80" name="alamat" placeholder="Masukan Alamat"></textarea>
                                        <span id="alamat_error"></span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-raised g-bg-cyan">Submit</button>
                            </div>
                        </div>
                        
                    </form>
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

<script>  
    $(document).ready(function(){  
      $('#username').change(function(){  
           var username = $('#username').val();  
           if(username != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>Superadmin/Home/cek_username",  
                     method:"POST",  
                     data:{username:username}, 
                     success:function(data){  
                          $('#username_result').html(data);  
                     }  
                });  
           }
      });  
    });  
</script>

<script type="text/javascript">
    // validation function
    function Validate() {
       // SELECTING ALL TEXT ELEMENTS
        var nama = $('#addForm' + ' input[name=nama]');
        var username = $('#addForm' + ' input[name=username]');
        var password = $('#addForm' + ' input[name=password]');
        var latitude = $('#addForm' + ' input[name=latitude]');
        var longtitude = $('#addForm' + ' input[name=longtitude]');
        var alamat = $('#addForm' + ' textarea[name=alamat]');
        var no_telp = $('#addForm' + ' input[name=no_telp]');
        var email = $('#addForm' + ' input[name=email]');

        var nama_div = $('#addForm' + ' #nama_div');
        var username_div = $('#addForm' + ' #username_div');
        var password_div = $('#addForm' + ' #password_div');
        var latitude_div = $('#addForm' + ' #latitude_div');
        var longtitude_div = $('#addForm' + ' #longtitude_div');
        var alamat_div = $('#addForm' + ' #alamat_div');
        var no_telp_div = $('#addForm' + ' #no_telp_div');
        var email_div = $('#addForm' + ' #email_div');

        // SELECTING ALL ERROR DISPLAY ELEMENTS
        var nama_error = $('#addForm' + ' #nama_error');
        var username_error = $('#addForm' + ' #username_error');
        var password_error = $('#addForm' + ' #password_error');
        var latitude_error = $('#addForm' + ' #latitude_error');
        var longtitude_error = $('#addForm' + ' #longtitude_error');
        var alamat_error = $('#addForm' + ' #alamat_error');
        var no_telp_error = $('#addForm' + ' #no_telp_error');
        var email_error = $('#addForm' + ' #email_error');

        // RESET
        nama.css('border', "1px solid #ccc");
        nama_div.css('color', "#555");

        username.css('border', "1px solid #ccc");
        username_div.css('color', "#555");

        password.css('border', "1px solid #ccc");
        password_div.css('color', "#555");

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
        username_error.html("");
        password_error.html("");
        latitude_error.html("");
        longtitude_error.html("");
        alamat_error.html("");
        no_telp_error.html("");
        email_error.html("");

        var usernameData = JSON.parse('<?php echo json_encode($data_username) ?>');
        var status_username;
        usernameData.forEach(function(data) {
            if (data.username == username.val()) {
                status_username = false;
            }
        })

      // validate username

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

        if (username.val() == "") {
            username.css('border', "1px solid red");
            username_div.css('color', "red");
            username_error.html("Username Tidak Boleh Kosong");
            username.focus();
            status = false;
        }

        else if (!(username.val().match(alphanumeric))) {
            username.css('border', "1px solid red");
            username_div.css('color', "red");
            username_error.html("Username Hanya Huruf dan Angka");
            username.focus();
            status = false;
        }

        else if (status_username == false) {
            username.css('border', "1px solid red");
            username_div.css('color', "red");
            username_error.html("");
            username.focus();
            status = false;
        }
        else{
            username_error.val("");
        }

        if (password.val() == "") {
            password.css('border', "1px solid red");
            password_div.css('color', "red");
            password_error.html("Password Tidak Boleh Kosong");
            password.focus();
            status = false;
        }

        else if (password.val().length < 6) {
            password.css('border', "1px solid red");
            password_div.css('color', "red");
            password_error.html("Password Minimal 6 Karakter");
            password.focus();
            status = false;
        }
        else{
            password_error.val("");
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