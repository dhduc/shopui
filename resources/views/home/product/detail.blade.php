@extends('layouts.home.master')
@section('css')
    <link href="{{ URL::to('/') }}/../theme/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
    <link href="{{ asset("/") }}css/jquery-ui.css" rel="stylesheet" type="text/css"><!-- for slider-range -->
    <link href="{{ URL::to('/') }}/../theme/assets/global/plugins/rateit/src/rateit.css" rel="stylesheet" type="text/css">
    <style>

    </style>

@stop
@include('layouts.home.alert')
@section('content')
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>


    <div class="row margin-bottom-40">


        <!-- BEGIN CONTENT -->
        <div class="col-md-9 col-sm-7">
            <div class="product-page">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="product-image">
                            <?php echo $thumbnailImage; ?>
                        </div>
                        <div class="product-other-images">
                            <?php echo $listImages; ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <h1>{{ $product['name'] }}</h1>
                        <div class="price-availability-block clearfix">
                            <div class="price">
                                <strong><span>$</span>{{ $product['price'] }}</strong>

                            </div>
                            <div class="availability">
                                Purchases: <strong>{{ $product['purchase'] }}</strong><br/>
                                Status:
                                <strong style="color: #E84D1C;">
                                    <?php
                                    if($product['number']>0) echo "Stock";
                                    else echo "Closed";
                                    ?>
                                </strong>
                            </div>
                        </div>
                        <div class="description">
                            <p>
                                {{ substr($product['description'], 0, 100) }}
                            </p>
                        </div>
                        <div class="product-page-options">
                            <div class="pull-left">
                                {{-- Product Producer --}}
                                <label class="control-label"><h4>Producer: <?php echo $producer; ?></h4></label>

                            </div>

                        </div>
                        <div class="product-page-cart">
                            <?php if($product['number'] > 0) { ?>
                            <form action="{{ URL::to('/cart/insert') }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="product-quantity">
                                    <input name="number" id="product-quantity" type="text" value="1" class="form-control input-sm">
                                </div>

                                <input type="hidden" name="id" value="{{ $product['id'] }}"/>
                                <button class="btn btn-primary" type="submit">Add to cart</button>
                            </form>
                            <?php } ?>
                        </div>

                        <ul class="social-icons">
                            <span class='st_facebook_large' displayText='Facebook'></span>
                            <span class='st_googleplus_large' displayText='Google +'></span>
                            <span class='st_twitter_large' displayText='Tweet'></span>
                            <span class='st_linkedin_large' displayText='LinkedIn'></span>
                            <span class='st_pinterest_large' displayText='Pinterest'></span>
                            <span class='st_email_large' displayText='Email'></span>
                        </ul>
                    </div>

                    <div class="product-page-content">
                        <ul id="myTab" class="nav nav-tabs">
                            <li class="active"><a href="#Description" data-toggle="tab">Description</a></li>
                            <li><a href="#Information" data-toggle="tab">Information</a></li>
                            <li><a href="#Review" data-toggle="tab">Review</a></li>

                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade in active" id="Description">
                                {{-- Product Description --}}
                                <p>
                                    {{ $product['description'] }}
                                </p>
                            </div>
                            <div class="tab-pane fade" id="Information">
                                {{-- Product Information --}}
                                <?php echo $product['information'] ?>
                            </div>
                            <div class="tab-pane fade" id="Review">
                                {{-- Product Review --}}
                                <?php echo $review ?>

                            </div>

                        </div>
                    </div>

                    {{--<div class="sticker sticker-sale"></div>--}}
                </div>
            </div>
        </div>
        <!-- END CONTENT -->
        <!-- BEGIN SIDEBAR -->
        <div class="sidebar col-md-3 col-sm-5">
            <div class="sidebar-products clearfix">
                <h2>Bestsellers</h2>
                <?php echo $bestSeller; ?>
            </div>
        </div>
        <!-- END SIDEBAR -->
    </div>
@stop
@section('js')
    <script src="{{ URL::to('/') }}/../theme/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <script src="{{ URL::to('/') }}/../theme/assets/global/plugins/rateit/src/jquery.rateit.js" type="text/javascript"></script>
    <script src="{{ URL::to('/') }}/../theme/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>



@stop
@section('jscode')
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.initTwitter();
            Layout.initUniform();
        });
    </script>

    <script type="text/javascript">var switchTo5x=true;</script>
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "21986ac7-20ab-4bcb-a309-0b8b0a55e386", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
@stop