<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title><?php echo $title ?></title>
	<meta name="description" content="<?php echo $description ?>"> 
	<meta name="keywords" content="<?php echo $keywords ?>">

	<!-- Favicons-->
	<link rel="shortcut icon" href="<?php echo base_url()?>assets/frontend/img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="<?php echo base_url()?>assets/frontend/img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?php echo base_url()?>assets/frontend/img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?php echo base_url()?>assets/frontend/img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?php echo base_url()?>assets/frontend/img/apple-touch-icon-144x144-precomposed.png">
    
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
    
	<!-- BASE CSS -->
	<link href="<?php echo base_url()?>assets/frontend/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/frontend/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/frontend/css/menu.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/frontend/css/vendors.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/frontend/css/icon_fonts/<?php echo base_url()?>assets/frontend/css/all_icons_min.css" rel="stylesheet">
    
	<!-- YOUR CUSTOM CSS -->
	<link href="<?php echo base_url()?>assets/frontend/css/custom.css" rel="stylesheet">

</head>

<body>

	<div class="layer"></div>
	<!-- Mobile menu overlay mask -->

	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<!-- End Preload -->
    
	<!-- header -->
        <?php $this->load->view('Frontend/V_header') ?>
    <!-- end header -->
	
	<main>
		<div class="bg_color_2">
			<div class="container margin_60_35">
				<div id="login">
					<h1>Forget Password</h1>
					<div class="box_form">
						<form method="POST" action="<?php echo site_url('Register/Confirm_forget_password')?>" onsubmit="return Validate()" id="addForm">
							<div class="form-group" id="username_div">
								<input type="text" name="username" class="form-control" placeholder="Masukan Username">
								<span id="username_error"></span>
							</div>
							<div class="form-group text-center add_top_20">
								<input class="btn_1 medium" type="submit" value="Submit">
							</div>
						</form>
					</div>
				</div>
				<!-- /login -->
			</div>
			<br><br><br><br><br><br>
		</div>
	</main>
	<!-- /main -->
	
	<!-- footer -->
        <?php $this->load->view('Frontend/V_footer') ?>
    <!-- end footer -->

	<div id="toTop"></div>
	<!-- Back to top button -->

	<!-- COMMON SCRIPTS -->
	<script src="<?php echo base_url()?>assets/frontend/js/jquery-2.2.4.min.js"></script>
	<script src="<?php echo base_url()?>assets/frontend/js/common_scripts.min.js"></script>
	<script src="<?php echo base_url()?>assets/frontend/js/functions.js"></script>
     
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