<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<title><?php echo $title ?></title>
<meta name="description" content="<?php echo $description ?>"> 
<meta name="keywords" content="<?php echo $keywords ?>">

<link href="<?php echo base_url()?>assets/backend/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Custom Css -->
<link href="<?php echo base_url()?>assets/backend/css/main.css" rel="stylesheet">
<link href="<?php echo base_url()?>assets/backend/css/login.css" rel="stylesheet">

<!-- Swift Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="<?php echo base_url()?>assets/backend/css/themes/all-themes.css" rel="stylesheet" />
</head>
<body class="theme-cyan login-page authentication">

<div class="container">
    <div class="card-top"></div>
    <div class="card">
        <h1 class="title"><span>Heavlypedia</span>Reset Password <div class="msg"></div></h1>
        <div class="col-md-12">
            <?php 
                foreach ($data_akun as $p) :
                    $username = $p['username'];
                
             ?>
            <form id="sign_in" method="POST" action="<?php echo site_url('Admin/Login/Confirm_reset_password')?>">
                <input type="hidden" name="username" class="form-control" value="<?php echo $username;?>">
                <div class="input-group" id="password_div"> 
                    <span class="input-group-addon"> <i class="zmdi zmdi-lock"></i></span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" placeholder="Masukan Password">
                        <span id="password_error"></span>
                    </div>
                </div>  
                <div class="input-group" id="password2_div"> 
                    <span class="input-group-addon"> <i class="zmdi zmdi-lock"></i></span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password2" placeholder="Masukan Ulang Password">
                        <span id="password2_error"></span>
                    </div>
                </div>            
                <div class="row">                    
                    <div class="col-sm-12 text-center">
                        <button class="btn btn-raised waves-effect g-bg-cyan" type="submit">RESET MY PASSWORD</button>
                    </div>
                </div>
            </form>
            <?php endforeach ?>
        </div>
    </div>    
</div>
<div class="theme-bg"></div>

<!-- Jquery Core Js --> 
<script src="<?php echo base_url()?>assets/backend/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="<?php echo base_url()?>assets/backend/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

<script src="<?php echo base_url()?>assets/backend/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->

<script type="text/javascript">
    // validation function
    function Validate() {
       // SELECTING ALL TEXT ELEMENTS
        var password = $('#addForm' + ' input[name=password]');
        var password2 = $('#addForm' + ' input[name=password2]');

        var password_div = $('#addForm' + ' #password_div');
        var password2_div = $('#addForm' + ' #password2_div');

        // SELECTING ALL ERROR DISPLAY ELEMENTS
        var password_error = $('#addForm' + ' #password_error');
        var password2_error = $('#addForm' + ' #password2_error');

        // RESET
        password.css('border', "1px solid #ccc");
        password_div.css('color', "#555");

        password2.css('border', "1px solid #ccc");
        password2_div.css('color', "#555");

        password_error.html("");
        password2_error.html("");

      // validate username

        var letters = /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/;
        var alphanumeric = /^[0-9a-zA-Z]+$/;
        var status = true;

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

        if (password2.val() == "") {
            password2.css('border', "1px solid red");
            password2_div.css('color', "red");
            password2_error.html("Password Tidak Boleh Kosong");
            password2.focus();
            status = false;
        }

        else if (password2.val() != password.val()) {
            password2.css('border', "1px solid red");
            password2_div.css('color', "red");
            password2_error.html("Password Tidak Sama");
            password2.focus();
            status = false;
        }
        else{
            password_error.val("");
        }

      return status;
    }
</script>

</body>
</html>