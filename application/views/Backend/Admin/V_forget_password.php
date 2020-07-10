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
<link rel="icon" href="<?php echo base_url()?>assets/backend/images/favicon.ico" type="image/x-icon">
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
        <h1 class="title"><span>Heavlypedia</span>Forgot Password <div class="msg"></div></h1>
        <div class="col-md-12">
            <form method="POST" action="<?php echo site_url('Admin/Login/Confirm_forget_password')?>" onsubmit="return Validate()" id="addForm">
                <div class="input-group" id="username_div"> <span class="input-group-addon"> <i class="zmdi zmdi-account"></i> </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="username" placeholder="Masukan Username">
                        <span id="username_error"></span>
                    </div>
                </div>

                <div>
                    <div class="text-center">
                        <input class="btn btn-raised waves-effect g-bg-cyan" type="submit" value="Submit">
                    </div>
                    <div class="text-center"> <a href="<?php echo site_url('Admin/Login')?>">Log in</a></div>
                </div>
            </form>
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
        var username = $('#addForm' + ' input[name=username]');

        var username_div = $('#addForm' + ' #username_div');

        // SELECTING ALL ERROR DISPLAY ELEMENTS
        var username_error = $('#addForm' + ' #username_error');

        // RESET
        username.css('border', "1px solid #ccc");
        username_div.css('color', "#555");

        username_error.html("");

        var usernameData = JSON.parse('<?php echo json_encode($data_username) ?>');
        var status_username = false;
        usernameData.forEach(function(data) {
            if (data.username == username.val()) {
                status_username = true;
            }
        })


      // validate username

        var letters = /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/;
        var alphanumeric = /^[0-9a-zA-Z]+$/;
        var status = true;

        if (username.val() == "") {
            username.css('border', "1px solid red");
            username_div.css('color', "red");
            username_error.html("Username Tidak Boleh Kosong");
            username.focus();
            status = false;
        }

        else if (status_username == false) {
            username.css('border', "1px solid red");
            username_div.css('color', "red");
            username_error.html("Username Tidak Tersedia");
            username.focus();
            status = false;
        }
        else{
            username_error.val("");
        }

      return status;
    }
</script>
</body>
</html>