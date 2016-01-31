@extends('layouts.home.master')
@section('css')
    <style>
        .goods-page-image {
            padding-top: 0px !important;
        }
    </style>
@stop
@include('layouts.home.alert')
@section('content')
    <div class="row margin-bottom-40">
        <!-- BEGIN CONTENT -->
        <div class="col-md-12 col-sm-12">
            <h1>Checkout</h1>
            <!-- BEGIN CHECKOUT PAGE -->
            <div class="panel-group checkout-page accordion scrollable" id="checkout-page">
                <form role="form" action="{{ URL::to('/') }}/cart/checkout" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <!-- BEGIN CHECKOUT -->
                <div id="checkout" class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">
                            <a data-toggle="collapse" data-parent="#checkout-page" href="#checkout-content" class="accordion-toggle collapsed">
                                Step 1: Checkout Options
                            </a>
                        </h2>
                    </div>
                    <div id="checkout-content" class="panel-collapse collapse" style="height: 0px;">
                        <div class="panel-body row">
                            <div class="col-md-6 col-sm-6">
                                <h3>New Customer</h3>
                                <p>Checkout Options:</p>
                                <div class="radio-list">


                                    @if(Auth::check())
                                        <label>
                                            <input type="radio" name="userID" value="{{ Auth::user()->id  }}" checked> Register Account
                                        </label>
                                    @else
                                        <label>
                                            <input type="radio" name="userID" value="0" checked> Guest Checkout
                                        </label>
                                    @endif

                                </div>
                                <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                                <a class="btn btn-primary collapsed"
                                        data-toggle="collapse" data-parent="#checkout-page" data-target="#payment-address-content">Continue</a>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                    @if(!Auth::check())
                                    <a class="btn btn-primary pull-right margin-right-20" target="_blank" href="{{ URL::to('/') }}/auth/login">Checkout as register account</a>
                                    @endif
                            </div>

                        </div>
                    </div>
                </div>
                <!-- END CHECKOUT -->

                <!-- BEGIN PAYMENT ADDRESS -->
                <div id="payment-address" class="panel panel-default" style="margin-top: 5px">
                    <div class="panel-heading">
                        <h2 class="panel-title">
                            <a data-toggle="collapse" data-parent="#checkout-page" href="#payment-address-content"
                               class="accordion-toggle collapsed">Step 2: Customer Details</a>
                        </h2>
                    </div>
                    <div id="payment-address-content" class="panel-collapse collapse" style="height: 0px;">
                        <div class="panel-body row">
                            <div class="col-md-6 col-sm-6">
                                <h3>Your Personal Details</h3>
                                <div class="form-group">
                                    <label for="fullname">Full Name<span class="require">*</span></label>
                                    <input type="text" name="fullname" id="fullname" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="email">E-Mail <span class="require">*</span></label>
                                    <input type="text" name="email" id="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="telephone">Telephone <span class="require">*</span></label>
                                    <input type="text" name="telephone" id="telephone" class="form-control">
                                </div>


                            </div>
                            <div class="col-md-6 col-sm-6">
                                <h3>Your Address</h3>

                                <div class="form-group">
                                    <label for="address">Address <span class="require">*</span></label>
                                    <input type="text" name="address" id="address" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="city">City <span class="require">*</span></label>
                                    <input type="text" name="city" id="city" class="form-control">
                                </div>

                            </div>
                            <hr>
                            <div class="col-md-12">

                                <a class="btn btn-primary collapsed"
                                   data-toggle="collapse" data-parent="#checkout-page" data-target="#shipping-method-content">Continue</a>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PAYMENT ADDRESS -->

                <!-- BEGIN SHIPPING METHOD -->
                <div id="shipping-method" class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">
                            <a data-toggle="collapse" data-parent="#checkout-page" href="#shipping-method-content" class="accordion-toggle collapsed">
                                Step 3: Delivery Method
                            </a>
                        </h2>
                    </div>
                    <div id="shipping-method-content" class="panel-collapse collapse" style="height: 0px;">
                        <div class="panel-body row">
                            <div class="col-md-12">
                                <p>Please select the preferred shipping method to use on this order.</p>
                                <h4>Flat Rate</h4>
                                <div class="radio-list">
                                    <label>
                                        <input type="radio" name="FlatShippingRate" value="FlatShippingRate" checked> Flat Shipping Rate
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="delivery-comments">Add Comments About Your Order</label>
                                    <textarea name="note" id="delivery-comments" rows="8" class="form-control"></textarea>
                                </div>
                                <a class="btn btn-primary  pull-right collapsed"
                                        id="button-shipping-method" data-toggle="collapse" data-parent="#checkout-page"
                                        data-target="#payment-method-content">Continue</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END SHIPPING METHOD -->

                <!-- BEGIN PAYMENT METHOD -->
                <div id="payment-method" class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">
                            <a data-toggle="collapse" data-parent="#checkout-page" href="#payment-method-content" class="accordion-toggle collapsed">
                                Step 4: Payment Method
                            </a>
                        </h2>
                    </div>
                    <div id="payment-method-content" class="panel-collapse collapse" style="height: 0px;">
                        <div class="panel-body row">
                            <div class="col-md-12">
                                <p>Please select the preferred payment method to use on this order.</p>
                                <div class="radio-list">
                                    <label>
                                        <input type="radio" name="CashOnDelivery" value="CashOnDelivery" checked> Cash On Delivery
                                    </label>
                                </div>
                                <a class="btn btn-primary  pull-right collapsed"
                                   id="button-shipping-method" data-toggle="collapse" data-parent="#checkout-page"
                                   data-target="#confirm-content">Continue</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PAYMENT METHOD -->

                <!-- BEGIN CONFIRM -->
                <div id="confirm" class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">
                            <a data-toggle="collapse" data-parent="#checkout-page" href="#confirm-content" class="accordion-toggle collapsed">
                                Step 5: Confirm Order
                            </a>
                        </h2>
                    </div>
                    <div id="confirm-content" class="panel-collapse collapse" style="height: 0px;">
                        <div class="panel-body row">
                            <div class="col-md-12 col-sm-12">
                                <h1>Shopping cart</h1>

                                <div class="goods-page">


                                        <div class="goods-data clearfix">
                                            <div class="table-wrapper-responsive">

                                                <table summary="Shopping cart">
                                                    <tbody>
                                                    <tr>
                                                        <th class="goods-page-image">Image</th>
                                                        <th class="goods-page-description">Description</th>

                                                        <th class="goods-page-quantity">Quantity</th>
                                                        <th class="goods-page-price">Unit price</th>
                                                        <th class="goods-page-total" colspan="2">Total</th>
                                                    </tr>
                                                    <?php echo $allItem; ?>

                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="shopping-total">

                                                <ul>
                                                    <li>
                                                        <em>Sub total</em>
                                                        <strong class="price"><span>$</span><?php echo $total; ?></strong>
                                                    </li>

                                                    <li>
                                                        <em>VAT {{ $config['tax'] }}%</em>
                                                        <strong class="price"><span>$</span><?php echo $total*($config['tax']/100); ?></strong>
                                                    </li>
                                                    <li>
                                                        <em>Shipping cost</em>
                                                        <strong class="price"><span>$</span>{{ $config['ship'] }}</strong>
                                                    </li>
                                                    <li class="checkout-total-price">
                                                        <em>Total</em>
                                                        <strong class="price"><span>$</span><?php echo $total+$total*($config['tax']/100)+$config['ship']; ?></strong>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <input type="submit" class="btn btn-primary pull-right" value="Confirm Order" />

                                        <a href="{{ URL::to("/") }}" class="btn btn-default pull-right margin-right-20">Cancel</a>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONFIRM -->
                </form>
            </div>
            <!-- END CHECKOUT PAGE -->
        </div>
        <!-- END CONTENT -->
    </div>
@stop