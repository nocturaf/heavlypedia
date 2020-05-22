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
                        <h2>Edit Poli</h2>
                    </div>
                    <div class="body">
                    <div id="notifications"><?php echo $this->session->flashdata('pesan'); ?></div>
                    <?php 
                      foreach($data_poli as $p) :
                        $id = $p['id_poli'];
                        $nama = $p['nama_poli'];
                    ?>
                    <form method="POST" action="<?php echo site_url('Superadmin/Poli/Edit_data')?>" onsubmit="return Validate_edit('<?php echo $id ?>')" id="editForm<?php echo $id ?>" enctype="multipart/form-data">
                        <input type="hidden" name="id_poli" class="form-control" value="<?php echo $id;?>">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group" id="nama_div">
                                    <div class="form-line">
                                        <label style="color: black;"><strong>Nama Poli</strong></label>
                                        <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Poli" value="<?php echo $nama;?>">
                                        <span id="nama_error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">                            
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

        var nama_div = $('#editForm' + id + ' #nama_div');

        // SELECTING ALL ERROR DISPLAY ELEMENTS
        var nama_error = $('#editForm' + id + ' #nama_error');

        // RESET
        nama.css('border', "1px solid #ccc");
        nama_div.css('color', "#555");

        nama_error.html("");

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

      return status;
    }
</script> 
</body>
</html>