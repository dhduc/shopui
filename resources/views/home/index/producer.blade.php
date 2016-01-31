@extends('layouts.home.master')
@section('css')
    <style>
        ul.pagination {
            margin-bottom: 20px;
        }
        ul.sidebar-menu {
            background: #fff;
            padding: 15px 15px 20px;
        }
        ul.sidebar-menu li {
            line-height: 2;
        }
        ul.sidebar-menu li.active {
            color: #67bd3c;
        }
        .product-list .col-md-4 {
            height: 457px !important;
        }
    </style>

@stop
@include('layouts.home.alert')
@section('content')

    <div class="row">

        <div class="col-md-9 col-sm-7" style="border-right: 1px solid #d7d7d7;">
            <div class="row product-list">
                <?php echo $allProductInView; ?>
            </div>
            <div class="row">

                <center>
                    <?php echo $pagination; ?>
                </center>

            </div>
        </div>

        <div class="sidebar col-md-3 col-sm-5">
            <ul class="list-group margin-bottom-25 sidebar-menu">
                <h2><span>Sort&nbsp;By:</span></h2>
                <?php echo $sort; ?>

            </ul>
            <div class="sidebar-products clearfix">
                <h2>Bestsellers</h2>
                <?php echo $bestSeller; ?>
            </div>
        </div>

    </div>




@stop