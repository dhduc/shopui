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
    </script>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal form-row-seperated" action="{{ URL::action('Admin\ProducerController@update', $result->id) }}"
                  method="Post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-notebook"></i></i><?php echo Lang::get('messages.edit_producer'); ?>
                        </div>
                        <div class="actions btn-set">
                            <a href="{{ URL::action('Admin\ProducerController@index') }}" name="back" class="btn default"><i class="fa fa-angle-left"></i> <?php echo Lang::get('messages.list_producer'); ?></a>
                            <button class="btn default" type="reset"><i class="fa fa-reply"></i> <?php echo Lang::get('messages.reset'); ?></button>
                            <button class="btn green" type="submit"><i class="fa fa-check"></i>  <?php echo Lang::get('messages.update'); ?></button>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="form-group">
                            <label for=producer" class="col-sm-2 control-label"><?php echo Lang::get('messages.producer_producer'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="producer" value="{{ old('producer', $result['producer'])}}" id="producer" placeholder="<?php echo Lang::get('messages.producer_producer'); ?>">
                            </div>
                        </div>
                    </div>

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
                            <label for=information" class="col-sm-2 control-label"><?php echo Lang::get('messages.producer_information'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="information" value="{{ old('information', $result['information'])}}" id="information" placeholder="<?php echo Lang::get('messages.producer_information'); ?>">
                            </div>
                        </div>
                    </div>



                </div>
            </form>
        </div>
    </div>
@stop