<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui">

    <title><?php if (isset($page_title)) echo $page_title; ?></title>
    <meta name="description" content="<?php if (isset($meta_description)) echo $meta_description; ?>"/>
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">

    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/jquery-ui.css">
    <link rel="stylesheet" href="/assets/css/jquery-ui-timepicker-addon.css">
    <link rel="stylesheet" href="/assets/css/toastr.min.css">

    <link rel="stylesheet" href="/plugins/jstree/dist/themes/default/style.min.css">
    <link rel="stylesheet" href="/plugins/lou-multi-select/css/multi-select.css">

<!--    --><?php
//    if (isset($this->outputData['css']) and is_array($this->outputData['css'])) {
//        foreach ($this->outputData['css'] as $css) {
//            echo '<link rel="stylesheet" href="' . base_url($css) . '">' . "\n";
//        }
//    }
//    ?>

<!-- jQuery -->
</head>
<body class="page-template-default page page-id-116 logged-in admin-bar  customize-support" cz-shortcut-listen="true">

<div id="dialog" class="modal fade">
    <?php $this->load->view('dialog'); ?>
</div>

  <header id="masthead" class="site-header" role="banner">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div id="logo">
                        <div class="site-header-inner col-sm-12">
                            <div class="site-branding">
                                <h1 class="site-title">
                                    CI CRUD operations test
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
    <div id="header-main" class="header-bottom">
        <div class="header-bottom-inner">
            <div class="container">
                <div class="row">                 
                    <div class="col-sm-12">
                        <ul class="nav nav-pills">
                            <li class="nav-item <?php echo $active_tab == 'categories'?'active':'';?>">
                                <a class="nav-link" href="<?php echo site_url()?>">Categories</a>
                            </li>
                            <li class="nav-item <?php echo $active_tab == 'items'?'active':'';?>">
                                <a class="nav-link" href="<?php echo site_url()?>item/index">Items</a>
                            </li>
                            <li class="nav-item <?php echo $active_tab == 'dependencies'?'active':'';?>">
                                <a class="nav-link" href="<?php echo site_url()?>dependencies/index">Dependencies</a>
                            </li>
                        </ul>
                    </div>
                </div><!--.row-->
            </div><!-- .container -->
        </div><!--.header-bottom-inner-->
    </div><!--.header-bottom-->

</header><!-- #masthead -->

<div class="main-content">
    <div class="container">
        <div id="content" class="main-content-inner">

<div class="row">
    <div class="col-sm-12">
	<div class="row box">
