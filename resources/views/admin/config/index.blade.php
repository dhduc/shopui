@extends('layouts.admin.master')
@section('css')
    <style>
        img.config {
            width: 150px;
            height: auto;
        }
        .nav-tabs>li {
            width: 150px;
            text-align: center;
        }
    </style>
@stop
@section('js')
    <script>
        $("#logo").change(function(){
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.logo').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
        $("#favicon").change(function(){
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.favicon').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal form-row-seperated" action="{{ URL::action('Admin\ConfigController@update') }}" method="Post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cog"></i>Default Config
                        </div>
                        <div class="actions btn-set">
                            <button class="btn default" type="reset"><i class="fa fa-reply"></i> <?php echo Lang::get('messages.reset'); ?></button>
                            <button class="btn green" type="submit"><i class="fa fa-check"></i>  <?php echo Lang::get('messages.update'); ?></button>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <ul class="nav nav-tabs margin-bottom-20">
                            <li class="active">
                                <a href="#tab_1_1" data-toggle="tab">
                                    Home </a>
                            </li>
                            <li class="">
                                <a href="#tab_1_2" data-toggle="tab">
                                    Profile </a>
                            </li>
                            <li class="">
                                <a href="#tab_1_3" data-toggle="tab">
                                    Payment </a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="tab_1_1">
                                <div class="portlet-body">
                                    <div class="form-group">
                                        <label for=logo" class="col-sm-2 control-label"><?php echo Lang::get('messages.config_logo'); ?></label>
                                        <div class="col-sm-3">
                                            <img class="logo config" src="{{ URL::to('/').'/'.$result['logo'] }}" alt=""/>
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="file" class="form-control" name="logo" id="logo" >
                                        </div>
                                    </div>
                                </div>

                                <div class="portlet-body">
                                    <div class="form-group">
                                        <label for=favicon" class="col-sm-2 control-label"><?php echo Lang::get('messages.config_favicon'); ?></label>
                                        <div class="col-sm-3">
                                            <img class="favicon config" src="{{ URL::to('/').'/'.$result['favicon'] }}" alt=""/>
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="file" class="form-control" name="favicon" id="favicon" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab_1_2">
                                <div class="portlet-body">
                                    <div class="form-group">
                                        <label for=title" class="col-sm-2 control-label"><?php echo Lang::get('messages.config_title'); ?></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="title" value="{{ old('title', $result['title'])}}" id="title" placeholder="<?php echo Lang::get('messages.config_title'); ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="portlet-body">
                                    <div class="form-group">
                                        <label for=email" class="col-sm-2 control-label"><?php echo Lang::get('messages.config_email'); ?></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="email" value="{{ old('email', $result['email'])}}" id="email" placeholder="<?php echo Lang::get('messages.config_email'); ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="portlet-body">
                                    <div class="form-group">
                                        <label for=telephone" class="col-sm-2 control-label"><?php echo Lang::get('messages.config_telephone'); ?></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="telephone" value="{{ old('telephone', $result['telephone'])}}" id="telephone" placeholder="<?php echo Lang::get('messages.config_telephone'); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab_1_3">
                                <div class="portlet-body">
                                    <div class="form-group">
                                        <label for=tax" class="col-sm-2 control-label"><?php echo Lang::get('messages.config_tax'); ?></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="tax" value="{{ old('tax', $result['tax'])}}" id="tax" placeholder="<?php echo Lang::get('messages.config_tax'); ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="portlet-body">
                                    <div class="form-group">
                                        <label for=ship" class="col-sm-2 control-label"><?php echo Lang::get('messages.config_ship'); ?></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="ship" value="{{ old('ship', $result['ship'])}}" id="ship" placeholder="<?php echo Lang::get('messages.config_ship'); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
@stop