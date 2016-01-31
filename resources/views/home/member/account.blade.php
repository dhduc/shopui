@extends('layouts.home.master')
@include('layouts.home.alert')
@section('content')
    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>

                <li class="active">My Account Page</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN SIDEBAR -->
                <div class="sidebar col-md-3 col-sm-3">
                    <ul class="list-group margin-bottom-25 sidebar-menu">
                        <li class="list-group-item clearfix"><a href="{{ URL::to('/') }}/account/{{ $result['id'] }}"><i class="fa fa-angle-right"></i> My Account</a></li>
                        <li class="list-group-item clearfix"><a href="{{ URL::to('/') }}/password/email"><i class="fa fa-angle-right"></i> Restore Password</a></li>
                        <li class="list-group-item clearfix"><a href="{{ URL::to('/') }}/account/{{ $result['id'] }}/history"><i class="fa fa-angle-right"></i> History Order</a></li>

                    </ul>
                </div>
                <!-- END SIDEBAR -->

                <!-- BEGIN CONTENT -->
                <div class="col-md-9 col-sm-7">
                    <h1>My Account Page</h1>
                    <div class="content-page">
                        <form class="form-horizontal form-row-seperated" action="{{ URL::action('Home\MemberController@update', $result['id']) }}" method="Post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="name">UserName</label>
                                <div class="col-lg-8">
                                    <input type="text" id="name" class="form-control" name="name" value="{{ $result['name'] }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="email">E-Mail</label>
                                <div class="col-lg-8">
                                    <input type="text" id="email" class="form-control" name="email" value="{{ $result['email'] }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="phone">Telephone</label>
                                <div class="col-lg-8">
                                    <input type="text" id="phone" class="form-control" name="telephone" value="{{ $result['phone'] }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="password">Password</label>
                                <div class="col-lg-8">
                                    <input type="password" id="password" class="form-control" name="password" value="{{ substr($result['password'], 0, 20) }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-2">

                                </div>

                                <div class="col-lg-2">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                                <div class="col-lg-2 checkbox-list">
                                    <label>
                                        <div class="checker"><span><input type="checkbox"></span></div> Edit
                                    </label>

                                </div>

                            </div>


                        </form>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>
@stop