<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="E-Klinik System">
        <meta name="keywords" content="Klinik">
        <meta name="author" content="WCS">
        <link rel="icon" type="image/png" href="<?php echo base_url().'/'?>assets/images/hospital.png" />
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!-- Title -->
        <title><?= $this->config->item('site_title') ?></title>

        <!-- Styles -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">-->
        <link href="<?php echo base_url().'/'?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url().'/'?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url().'/'?>assets/plugins/icomoon/style.css" rel="stylesheet">
        <link href="<?php echo base_url().'/'?>assets/plugins/uniform/css/default.css" rel="stylesheet"/>
        <link href="<?php echo base_url().'/'?>assets/plugins/switchery/switchery.min.css" rel="stylesheet"/>
        <link href="<?php echo base_url().'/'?>assets/plugins/nvd3/nv.d3.min.css" rel="stylesheet">

        <?php if (isset($css)) {
            $this->load->view('css/' . $css);
        } ?>

        <!-- Theme Styles -->
        <link href="<?php echo base_url().'/'?>assets/css/space.min.css" rel="stylesheet">
        <link href="<?php echo base_url().'/'?>assets/css/custom.css" rel="stylesheet">



        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body class="page-sidebar-collapsed">

        <!-- Page Container -->
        <div class="page-container">
