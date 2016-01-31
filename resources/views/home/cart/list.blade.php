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
            <h1>Shopping cart</h1>

            <div class="goods-page">
                <form action="{{ URL::to('/cart/updateCart') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

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
                                    <strong class="price"><span>$</span><?php echo $total; ?>
                                    </strong>
                                </li>
                                <li>
                                    <em>Shipping cost</em>
                                    <strong class="price"><span>$</span>{{ $config['ship'] }}</strong>
                                </li>
                                <li class="shopping-total-price">
                                    <em>Total</em>
                                    <strong class="price"><span>$</span><?php echo $total + $config['ship']; ?></strong>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a class="btn btn-default" href="{{ URL::to('/') }}">Continue shopping <i
                                class="fa fa-share"></i></a>&nbsp;
                    <button type="submit" class="btn btn-primary" href="">Update Cart <i class="fa fa-edit"></i></button>&nbsp;
                    <a class="btn btn-primary" href="{{ URL::to('/') }}/cart/empty">Empty Cart <i
                                class="fa fa-trash"></i></a>
                    <a class="btn btn-primary" href="{{ URL::to('/') }}/cart/checkout">Checkout <i class="fa fa-check"></i></a>
                </form>
            </div>
        </div>
        <!-- END CONTENT -->
    </div>
@stop