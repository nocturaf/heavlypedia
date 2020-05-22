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
					<h1>Reset Password</h1>
					<div class="box_form">
						<?php 
						 	foreach ($data_akun as $p) :
						 		$username = $p['username'];
						 	
						 ?>
						<form method="POST" action="<?php echo site_url('Register/Confirm_reset_password')?>" onsubmit="return Validate()" id="addForm">
							<input type="hidden" name="username" class="form-control" value="<?php echo $username;?>">
							<div class="form-group" id="password_div">								
								<input type="password" name="password" class="form-control" placeholder="Masukan Password">
								<span id="password_error"></span>
							</div>
							<div class="form-group" id="password2_div">
								<input type="password" name="password2" class="form-control" placeholder="Masukan Ulang Password">
								<span id="password2_error"></span>
							</div>
							<div class="form-group text-center add_top_20">
								<input class="btn_1 medium" type="submit" value="Submit">
							</div>
						</form>
						<?php endforeach ?>
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