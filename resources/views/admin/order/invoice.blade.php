@extends('layouts.admin.master')
@section('css')
    <link href="<?php echo url("/"); ?>/../theme/assets/admin/pages/css/invoice.css" rel="stylesheet" type="text/css"/>
@stop
@section('content')
    <h3 class="page-title">
        Invoice
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="index.html">Dashboard</a>
                <i class="fa fa-angle-right"></i>
            </li>

            <li>
                <a href="#">Invoice</a>
            </li>
        </ul>

    </div>
    <div class="invoice">
        <div class="row invoice-logo">
            <div class="col-xs-6 invoice-logo-space">
                <img src="{{ asset('images/img') }}/walmart.png" class="img-responsive" alt="">
            </div>
            <div class="col-xs-6">
                <p>
                    # DH{{ $orderInfo['id'] }} / <?php echo date('d M Y', strtotime($orderInfo['datetime'])); ?>
                    <span class="muted">Consectetuer adipiscing elit </span>
                </p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-4">
                <h3>Client:</h3>
                <ul class="list-unstyled">
                    <li>
                        {{ $customerInfo['fullname'] }}
                    </li>
                    <li>
                        {{ $customerInfo['email'] }}
                    </li>
                    <li>
                        {{ $customerInfo['telephone'] }}
                    </li>
                    <li>
                        {{ $customerInfo['address'] }},  {{ $customerInfo['city'] }}
                    </li>

                </ul>
            </div>
            <div class="col-xs-4">
                <h3>About:</h3>
                <ul class="list-unstyled">
                    <li>
                        Drem psum dolor sit amet
                    </li>
                    <li>
                        Laoreet dolore magna
                    </li>
                    <li>
                        Consectetuer adipiscing elit
                    </li>
                    <li>
                        Magna aliquam tincidunt erat volutpat
                    </li>

                </ul>
            </div>

        </div>
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Item
                        </th>
                        <th class="hidden-480">
                            Unit Price
                        </th>
                        <th class="hidden-480">
                            Quantity
                        </th>
                        <th>
                            Total
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php echo $productView; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4">
                <div class="well">
                    <address>
                        <strong>Loop, Inc.</strong><br>
                        12th Floor, Urban<br>
                        456 Doi Can, Ha Noi 1000<br>
                        <abbr title="Phone">P:</abbr> (84) 04-145-1810 </address>
                    <address>
                        <strong>Michael Jam</strong><br>
                        <a href="mailto:#">
                            info@email.com </a>
                    </address>
                </div>
            </div>
            <div class="col-xs-8 invoice-block">
                <ul class="list-unstyled amounts">
                    <li>
                        <strong>Sub - Total amount:</strong> {{ $payment['total'] }}
                    </li>
                    <li>
                        <strong>VAT {{ $payment['tax'] }}%:</strong> {{ $payment['tax_value'] }}
                    </li>
                    <li>
                        <strong>Ship:</strong> {{ $payment['ship'] }}
                    </li>
                    <li>
                        <strong>Grand Total:</strong> {{ $payment['paid'] }}
                    </li>
                </ul>
                <br>
                <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();">
                    Print <i class="fa fa-print"></i>
                </a>

            </div>
        </div>
    </div>
@stop