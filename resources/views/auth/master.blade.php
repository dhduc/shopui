<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->
<head>
    <meta charset="utf-8">
    <title>{{ $config['title'] or 'Metronic Shop UI' }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content="Metronic Shop UI description" name="description">
    <meta content="Metronic Shop UI keywords" name="keywords">
    <meta content="keenthemes" name="author">
    <meta property="og:site_name" content="-CUSTOMER VALUE-">
    <meta property="og:title" content="-CUSTOMER VALUE-">
    <meta property="og:description" content="-CUSTOMER VALUE-">
    <meta property="og:type" content="website">
    <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
    <meta property="og:url" content="-CUSTOMER VALUE-">
    <link rel="shortcut icon" href="{{ URL::to('/').'/'.$config['favicon'] }}"/>
    <!-- Fonts START -->
    <link href="{{ asset("/font") }}/css.css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
    <link href="{{ asset("/font") }}/css.css?family=Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css"><!--- fonts for slider on the index page -->
    <!-- Fonts END -->
    <!-- Global styles START -->
    <link href="<?php echo url("/"); ?>/../theme/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo url("/"); ?>/../theme/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Global styles END -->

    <!-- Theme styles START -->
    <link href="<?php echo url("/"); ?>/../theme/assets/global/css/components.css" rel="stylesheet">
    <link href="<?php echo url("/"); ?>/../theme/assets/frontend/layout/css/style.css" rel="stylesheet">
    <link href="<?php echo url("/"); ?>/../theme/assets/frontend/pages/css/style-shop.css" rel="stylesheet" type="text/css">

    <link href="<?php echo url("/"); ?>/../theme/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
    <link href="<?php echo url("/"); ?>/../theme/assets/frontend/layout/css/themes/green.css" rel="stylesheet" id="style-color">
    @yield('css')
    <style>
        .main {
            padding-top: 30px;
        }
    </style>
    <!-- Theme styles END -->
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="ecommerce">
<!-- BEGIN TOP BAR -->
<div class="pre-header">
    <div class="container">
        <div class="row">
            <!-- BEGIN TOP BAR LEFT PART -->
            <div class="col-md-6 col-sm-6 additional-shop-info">
                <ul class="list-unstyled list-inline">
                    <li><i class="fa fa-phone"></i><span>{{ $config['telephone'] }}</span></li>
                    <li><i class="fa fa-envelope-o"></i><span>{{ $config['email'] }}</span></li>
                </ul>
            </div>
            <!-- END TOP BAR LEFT PART -->
            <!-- BEGIN TOP BAR MENU -->
            <div class="col-md-6 col-sm-6 additional-nav">
                <ul class="list-unstyled list-inline pull-right">
                    @if( Auth::guest() )
                        <li><a href="{{ URL::to('/') }}"><i class="fa fa-fw fa-home"></i>Home</a></li>
                        <li><a href="{{ URL::to('auth/login') }}"><i class="fa fa-fw fa-sign-in"></i>Log In</a></li>
                        <li><a href="{{ URL::to('auth/register') }}"><i class="fa fa-fw fa-sign-out"></i>Sign Up</a></li>
                    @else
                        <li><i class="fa fa-user"></i>Welcome {{ Auth::user()->name }}</li>
                        <?php
                        if(checkMember()) {
                        ?>
                        <li><a href="{{ URL::to('account') }}">Account</a></li>
                        <li><a href="{{ URL::to('account/history') }}">History</a></li>
                        <?php } else { ?>
                        <li><a href="{{ URL::to('admin/dashboard') }}">Dashboard</a></li>
                        <?php } ?>


                        <li><a href="{{ URL::to('auth/logout') }}">Logout</a></li>

                    @endif
                </ul>
            </div>
            <!-- END TOP BAR MENU -->
        </div>
    </div>
</div>
<!-- END TOP BAR -->
<div class="main">
    <div class="container">

        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">

            <div class="sidebar col-md-2 col-sm-2">

            </div>
            @yield('content')
        </div>
        <!-- END SIDEBAR & CONTENT -->
    </div>
</div>

{{--@include("layouts.home.footer")--}}

<!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
<!--[if lt IE 9]>
<script src="<?php echo url("/"); ?>/../theme/assets/global/plugins/respond.min.js"></script>
<![endif]-->
<script src="<?php echo url("/"); ?>/../theme/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo url("/"); ?>/../theme/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo url("/"); ?>/../theme/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo url("/"); ?>/../theme/assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
<script src="<?php echo url("/"); ?>/../theme/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<script src="<?php echo url("/"); ?>/../theme/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        Layout.init();
        Layout.initOWL();
        LayersliderInit.initLayerSlider();
        Layout.initImageZoom();
        Layout.initTouchspin();
        Layout.initTwitter();
    });
</script>
@yield('js')
<!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>