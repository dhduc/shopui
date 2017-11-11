<!DOCTYPE html>

<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
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
    <meta property="og:image" content="-CUSTOMER VALUE-">
    <!-- link to image for socio -->
    <meta property="og:url" content="-CUSTOMER VALUE-">
    <meta property="fb:app_id" content="1623235901267989"/>
    <meta property="fb:admins" content="100004638813695"/>
    <link rel="shortcut icon" href="{{ asset('/').$config['favicon'] }}"/>
    <!-- Fonts START -->
    <link href="{{ asset('/font') }}/css.css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all"
          rel="stylesheet" type="text/css">
    <link href="{{ asset('/font') }}/css.css?family=Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all"
          rel="stylesheet" type="text/css">
    <!--- fonts for slider on the index page -->
    <!-- Fonts END -->
    <!-- Global styles START -->
    <link href="<?php echo url("/"); ?>/../theme/assets/global/plugins/font-awesome/css/font-awesome.min.css"
          rel="stylesheet">
    <link href="<?php echo url("/"); ?>/../theme/assets/global/plugins/bootstrap/css/bootstrap.min.css"
          rel="stylesheet">
    <!-- Global styles END -->
    <!-- Page level plugin styles START -->
    <link href="<?php echo url("/"); ?>/../theme/assets/global/plugins/fancybox/source/jquery.fancybox.css"
          rel="stylesheet">
    <link href="<?php echo url("/"); ?>/../theme/assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css"
          rel="stylesheet">
    <link href="<?php echo url("/"); ?>/../theme/assets/global/plugins/slider-layer-slider/css/layerslider.css"
          rel="stylesheet">
    <link href="<?php echo url("/"); ?>/../theme/assets/global/plugins/slider-layer-slider/skins/fullwidth/skin.css"
          rel="stylesheet">
    <link href="<?php echo url("/"); ?>/../theme/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet"
          type="text/css">


    <!-- Page level plugin styles END -->
    <!-- Theme styles START -->
    <link href="<?php echo url("/"); ?>/../theme/assets/global/css/components.css" rel="stylesheet">
    <link href="<?php echo url("/"); ?>/../theme/assets/frontend/layout/css/style.css" rel="stylesheet">
    <link href="<?php echo url("/"); ?>/../theme/assets/frontend/pages/css/style-shop.css" rel="stylesheet"
          type="text/css">
    <link href="<?php echo url("/"); ?>/../theme/assets/frontend/pages/css/style-layer-slider.css" rel="stylesheet">
    <link href="<?php echo url("/"); ?>/../theme/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
    <link href="<?php echo url("/"); ?>/../theme/assets/frontend/layout/css/themes/green.css" rel="stylesheet"
          id="style-color">
    <link href="<?php echo url("/"); ?>/../theme/assets/frontend/layout/css/custom.css" rel="stylesheet">

    @yield('css')

    <link rel="stylesheet" href="{{ asset('/') }}css/home.style.css"/>

</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="ecommerce">

@include("layouts.home.header")
<div class="page-container">
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">

            </div>
            <!-- END PAGE TITLE -->

        </div>
    </div>

    <?php if($action_name == 'index'){ ?>
    <div class="page-slider margin-bottom-20 margin-top-10">
        <div id="layerslider" style="width: 95%; height: 400px; margin: 0 auto;">
            <?php echo $slider; ?>
        </div>
    </div>
    <?php } ?>
    <!-- END PAGE HEAD -->
    <!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">


            <!-- BEGIN PAGE CONTENT INNER -->
            <div class="row">

            </div>
            <!-- BEGIN PAGE BREADCRUMB -->
            @if (isset($breadcrumb))
                <ul class="page-breadcrumb breadcrumb">
                    <?php echo $breadcrumb; ?>
                </ul>
                @endif
                        <!-- END PAGE BREADCRUMB -->

                @yield('content')

                <!-- END PAGE CONTENT INNER -->
        </div>
    </div>
    <!-- END PAGE CONTENT -->

</div>

@include("layouts.home.footer")

<!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
<!--[if lt IE 9]>
<script src="<?php echo url("/"); ?>/../theme/assets/global/plugins/respond.min.js"></script>
<![endif]-->
<script src="<?php echo url("/"); ?>/../theme/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo url("/"); ?>/../theme/assets/global/plugins/jquery-migrate.min.js"
        type="text/javascript"></script>
<script src="<?php echo url("/"); ?>/../theme/assets/global/plugins/bootstrap/js/bootstrap.min.js"
        type="text/javascript"></script>
<script src="<?php echo url("/"); ?>/../theme/assets/frontend/layout/scripts/back-to-top.js"
        type="text/javascript"></script>
<script src="<?php echo url("/"); ?>/../theme/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"
        type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
<script src="<?php echo url("/"); ?>/../theme/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js"
        type="text/javascript"></script>
<!-- pop up -->
<script src="<?php echo url("/"); ?>/../theme/assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js"
        type="text/javascript"></script>
<!-- slider for products -->
<script src='<?php echo url("/"); ?>/../theme/assets/global/plugins/zoom/jquery.zoom.min.js'
        type="text/javascript"></script>
<!-- product zoom -->
<script src="<?php echo url("/"); ?>/../theme/assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js"
        type="text/javascript"></script>
<!-- Quantity -->
<!-- BEGIN LayerSlider -->
<script src="<?php echo url("/"); ?>/../theme/assets/global/plugins/slider-layer-slider/js/greensock.js"
        type="text/javascript"></script>
<!-- External libraries: GreenSock -->
<script src="<?php echo url("/"); ?>/../theme/assets/global/plugins/slider-layer-slider/js/layerslider.transitions.js"
        type="text/javascript"></script>
<!-- LayerSlider script files -->
<script src="<?php echo url("/"); ?>/../theme/assets/global/plugins/slider-layer-slider/js/layerslider.kreaturamedia.jquery.js"
        type="text/javascript"></script>
<!-- LayerSlider script files -->
<script src="<?php echo url("/"); ?>/../theme/assets/frontend/pages/scripts/layerslider-init.js"
        type="text/javascript"></script>
<!-- END LayerSlider -->
<script src="<?php echo url("/"); ?>/../theme/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
<script src="{{ asset("/") }}js/script.js" type="text/javascript"></script>
@yield('js')
@yield('jscode')
<script type="text/javascript">
    jQuery(document).ready(function () {
        Layout.init();
        Layout.initOWL();
        LayersliderInit.initLayerSlider();
        Layout.initImageZoom();
        Layout.initTouchspin();
    });
</script>
<!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>