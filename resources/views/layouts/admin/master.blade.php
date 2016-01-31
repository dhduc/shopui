<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>{{ $title or 'Admin Dashboard' }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{{ asset("/") }}/font/css.css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link href="<?php echo url("/"); ?>/../theme/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo url("/"); ?>/../theme/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo url("/"); ?>/../theme/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo url("/"); ?>/../theme/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo url("/"); ?>/../theme/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="<?php echo url("/"); ?>/../theme/assets/global/css/components.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo url("/"); ?>/../theme/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo url("/"); ?>/../theme/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="<?php echo url("/"); ?>/../theme/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo url("/"); ?>/../theme/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    @yield('css')
    <link href="{{ asset('/') }}css/jquery.bootgrid.min.css" rel="stylesheet">
    <link href="{{ asset("/") }}css/style.css" rel="stylesheet" type="text/css"/>


</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed page-quick-sidebar-over-content">
<!-- BEGIN HEADER -->
@include("layouts.admin.header")
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
<!-- BEGIN SIDEBAR -->
@include('layouts.admin.leftside')
<!-- END SIDEBAR -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">



        @include('pages.notification')


        @yield('content', 'chưa tạo vùng content')

    </div>
</div>
<!-- END CONTENT -->
<!-- BEGIN QUICK SIDEBAR -->

<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
@include('layouts.admin.footer')
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>

<script src=" <?php echo url('/'); ?>/../theme/assets/global/plugins/respond.min.js"></script>
<script src=" <?php echo url('/'); ?>/../theme/assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="<?php echo url("/"); ?>/../theme/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo url("/"); ?>/../theme/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo url("/"); ?>/../theme/assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="<?php echo url("/"); ?>/../theme/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo url("/"); ?>/../theme/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo url("/"); ?>/../theme/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo url("/"); ?>/../theme/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo url("/"); ?>/../theme/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo url("/"); ?>/../theme/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo url("/"); ?>/../theme/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="<?php echo url("/"); ?>/../theme/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo url("/"); ?>/../theme/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo url("/"); ?>/../theme/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="<?php echo url("/"); ?>/../theme/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
@yield('js')
<script src="{{ asset('/') }}js/jquery.bootgrid.fa.min.js "></script>
<script src="{{ asset('/') }}js/jquery.bootgrid.min.js"></script>
<script>
    jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        QuickSidebar.init(); // init quick sidebar
        Demo.init(); // init demo features
    });
</script>
<!-- END JAVASCRIPTS -->
@yield('jscode')
</body>
<!-- END BODY -->
</html>