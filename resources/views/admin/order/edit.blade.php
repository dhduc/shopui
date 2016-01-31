@extends('layouts.admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Begin: life time stats -->
            <form class="" action="{{ URL::action('Admin\OrderController@update', $orderInfo['id']) }}" method="Post">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
            <div class="portlet">


                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-shopping-cart"></i>Order #{{ $orderInfo['id'] }} <span class="hidden-480">
								| {{ $orderInfo['datetime'] }} </span>
                        </div>
                        <div class="actions">

                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-cog"></i> Update
                            </button>
                            <div class="btn-group">

                                <?php
                                if ($orderInfo['status'] == 'On Hold') {
                                    echo '<a class="btn default yellow-stripe"
                                    href="' . URL::to('/') . '/admin/order/' . $orderInfo['id'] . '/invoice">
                                <i class="fa fa-cog"></i>
									<span class="hidden-480">
									Invoice </span> </a>';
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="tabbable">
                            <ul class="nav nav-tabs nav-tabs-lg">
                                <li class="active">
                                    <a href="#tab_1" data-toggle="tab">
                                        Details </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="portlet yellow-crusta box">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-cogs"></i>Order Details
                                                    </div>
                                                    <div class="actions">
                                                        <a href="#" class="btn btn-default btn-sm">
                                                            <i class="fa fa-pencil"></i> Edit </a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <div class="row static-info">
                                                        <div class="col-md-5 name">
                                                            Order #:
                                                        </div>
                                                        <div class="col-md-7 value">
                                                            DH{{ $orderInfo['id'] }}
                                                            <?php
                                                            if ($orderInfo['status'] == 'Pending') {
                                                                echo '<span class="label label-info label-sm">
																Phone confirmation was sent </span>';
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="row static-info">
                                                        <div class="col-md-5 name">
                                                            Order Date &amp; Time:
                                                        </div>
                                                        <div class="col-md-7 value">
                                                            {{ $orderInfo['datetime'] }}
                                                        </div>
                                                    </div>
                                                    <div class="row static-info">
                                                        <div class="col-md-5 name">
                                                            Order Status:
                                                        </div>
                                                        <div class="col-md-7 value">

                                                            <select name="status" class="form-control"
                                                                    style="width: 50%">
                                                                <?php echo $statusOrder; ?>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="row static-info">
                                                        <div class="col-md-5 name">
                                                            Grand Total:
                                                        </div>
                                                        <div class="col-md-7 value">
                                                            {{ $orderInfo['total'] }}
                                                        </div>
                                                    </div>
                                                    <div class="row static-info">
                                                        <div class="col-md-5 name">
                                                            Payment Information:
                                                        </div>
                                                        <div class="col-md-7 value">
                                                            Delivery
                                                        </div>
                                                    </div>
                                                    <div class="row static-info">
                                                        <div class="col-md-5 name">
                                                            Order Note:
                                                        </div>
                                                        <div class="col-md-7 value">
                                                            {{ $orderInfo['note'] }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="portlet blue-hoki box">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-cogs"></i>Customer Information
                                                    </div>
                                                    <div class="actions">
                                                        <a href="#" class="btn btn-default btn-sm">
                                                            <i class="fa fa-pencil"></i> Edit </a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <div class="row static-info">
                                                        <div class="col-md-5 name">
                                                            Customer Name:
                                                        </div>
                                                        <div class="col-md-7 value">
                                                            {{ $customerInfo['fullname'] }}
                                                        </div>
                                                    </div>
                                                    <div class="row static-info">
                                                        <div class="col-md-5 name">
                                                            Email:
                                                        </div>
                                                        <div class="col-md-7 value">
                                                            {{ $customerInfo['email'] }}
                                                        </div>
                                                    </div>
                                                    <div class="row static-info">
                                                        <div class="col-md-5 name">
                                                            State:
                                                        </div>
                                                        <div class="col-md-7 value">
                                                            {{ $customerInfo['address'] }}, {{ $customerInfo['city'] }}
                                                        </div>
                                                    </div>
                                                    <div class="row static-info">
                                                        <div class="col-md-5 name">
                                                            Phone Number:
                                                        </div>
                                                        <div class="col-md-7 value">
                                                            {{ $customerInfo['telephone'] }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="portlet grey-cascade box">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-cogs"></i>Shopping Cart
                                                    </div>
                                                    <div class="actions">
                                                        <a href="#" class="btn btn-default btn-sm">
                                                            <i class="fa fa-pencil"></i> Edit </a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-bordered table-striped">
                                                            <thead>
                                                            <tr>
                                                                <th>
                                                                    Product
                                                                </th>

                                                                <th>
                                                                    Cost
                                                                </th>
                                                                <th>
                                                                    Price
                                                                </th>
                                                                <th>
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
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="well">
                                                <div class="row static-info align-reverse">
                                                    <div class="col-md-8 name">
                                                        Sub Total:
                                                    </div>
                                                    <div class="col-md-3 value">
                                                        {{ $payment['total'] }}
                                                    </div>
                                                </div>
                                                <div class="row static-info align-reverse">
                                                    <div class="col-md-8 name">
                                                        Tax {{ $payment['tax'] }}%:
                                                    </div>
                                                    <div class="col-md-3 value">
                                                        {{ $payment['tax_value'] }}
                                                    </div>
                                                </div>
                                                <div class="row static-info align-reverse">
                                                    <div class="col-md-8 name">
                                                        Shipping:
                                                    </div>
                                                    <div class="col-md-3 value">
                                                        {{ $payment['ship'] }}
                                                    </div>
                                                </div>
                                                <div class="row static-info align-reverse">
                                                    <div class="col-md-8 name">
                                                        Total Paid:
                                                    </div>
                                                    <div class="col-md-3 value">
                                                        {{ $payment['paid'] }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

            </div>
            </form>
            <!-- End: life time stats -->
        </div>
    </div>
@stop