@extends('layouts.admin.master')
@section('css')
    <link rel="stylesheet" type="text/css"
          href="{{ URL::to('/') }}/../theme/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
    <link rel="stylesheet" type="text/css"
          href="{{ URL::to('/') }}/../theme/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::to('/') }}/../theme/assets/global/plugins/bootstrap-summernote/summernote.css">
    <style>
        .note-font.btn-group, .note-fontname.btn-group, .note-para.btn-group {
            display: none;
        }
        ul.wysihtml5-toolbar li:nth-child(4), ul.wysihtml5-toolbar li:nth-child(6){
            display: none;
        }
        iframe {
            height: 150px !important;
        }
    </style>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal form-row-seperated" action="{{ URL::action('Admin\ProductController@update', $result->id) }}" method="Post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-screen-desktop"></i><?php echo Lang::get('messages.edit_product'); ?>
                        </div>
                        <div class="actions btn-set">
                            <a href="{{ URL::action('Admin\ProductController@index') }}" name="back" class="btn default"><i class="fa fa-angle-left"></i> <?php echo Lang::get('messages.list_product'); ?></a>
                            <button class="btn default" type="reset"><i class="fa fa-reply"></i> <?php echo Lang::get('messages.reset'); ?></button>
                            <button class="btn green" type="submit"><i class="fa fa-check"></i>  <?php echo Lang::get('messages.update'); ?></button>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="form-group">
                            <label for=name" class="col-sm-2 control-label"><?php echo Lang::get('messages.product_name'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" value="{{ old('name', $result['name'])}}" id="name" placeholder="<?php echo Lang::get('messages.product_name'); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="form-group">
                            <label for=category_id" class="col-sm-2 control-label"><?php echo Lang::get('messages.product_category_id'); ?></label>
                            <div class="col-sm-8">
                                <select class="form-control" name="category_id" id="">
                                    <?php echo $allCategoriesInView; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="form-group">
                            <label for=seller_id" class="col-sm-2 control-label"><?php echo Lang::get('messages.product_seller_id'); ?></label>
                            <div class="col-sm-8">
                                <input type="hidden" class="form-control" name="seller_id"
                                       value="{{ Auth::user()->id }}">
                                <input type="text" readonly disabled class="form-control" name=""
                                       value="{{ Auth::user()->name }}">
                            </div>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="form-group">
                            <label for=image" class="col-sm-2 control-label"><?php echo Lang::get('messages.product_image'); ?></label>
                            <div class="col-sm-8">
                                <a class="btn btn-default" target="_blank" href="{{ URL::TO('/admin/images/'.$result['id'].'') }}">Edit</a>
                            </div>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="form-group">
                            <label for=cost" class="col-sm-2 control-label"><?php echo Lang::get('messages.product_cost'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="cost" value="{{ old('cost', $result['cost'])}}" id="cost" placeholder="<?php echo Lang::get('messages.product_cost'); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="form-group">
                            <label for=price" class="col-sm-2 control-label"><?php echo Lang::get('messages.product_price'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="price" value="{{ old('price', $result['price'])}}" id="price" placeholder="<?php echo Lang::get('messages.product_price'); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="form-group">
                            <label for=producer" class="col-sm-2 control-label"><?php echo Lang::get('messages.product_producer'); ?></label>
                            <div class="col-sm-8">
                                <select name="producer" class="form-control">
                                    <?php echo $allProducers; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="form-group">
                            <label for=description" class="col-sm-2 control-label"><?php echo Lang::get('messages.product_description'); ?></label>
                            <div class="col-sm-8">
                                <textarea class="form-control" noresize name="description" id="" cols="30" rows="5" placeholder="Product's Description">{{ old('description', $result['description'])}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="form-group">
                            <label for=information" class="col-sm-2 control-label"><?php echo Lang::get('messages.product_information'); ?></label>
                            <div class="col-sm-8">
                                <textarea class="wysihtml5 form-control" name="information">{{ old('information', $result['information'])}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="form-group">
                            <label for=number" class="col-sm-2 control-label"><?php echo Lang::get('messages.product_number'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="number" value="{{ old('number', $result['number'])}}" id="number" placeholder="<?php echo Lang::get('messages.product_number'); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="form-group">
                            <label for=purchase" class="col-sm-2 control-label"><?php echo Lang::get('messages.product_purchase'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" name="purchase" value="{{ old('purchase', $result['purchase'])}}" id="purchase" placeholder="<?php echo Lang::get('messages.product_purchase'); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="form-group">
                            <label for=status" class="col-sm-2 control-label"><?php echo Lang::get('messages.product_status'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="status" value="{{ old('status', $result['status'])}}" id="status" placeholder="<?php echo Lang::get('messages.product_status'); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="form-group">
                            <label for=created_at" class="col-sm-2 control-label"><?php echo Lang::get('messages.product_created_at'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" readonly disabled class="form-control" name="created_at" value="{{ old('created_at', $result['created_at'])}}" id="created_at" placeholder="<?php echo Lang::get('messages.product_created_at'); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="form-group">
                            <label for=updated_at" class="col-sm-2 control-label"><?php echo Lang::get('messages.product_updated_at'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" readonly disabled class="form-control" name="updated_at" value="{{ old('updated_at', $result['updated_at'])}}" id="updated_at" placeholder="<?php echo Lang::get('messages.product_updated_at'); ?>">
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
@stop
@section('js')
    <script type="text/javascript"
            src="{{ URL::to('/') }}/../theme/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
    <script type="text/javascript"
            src="{{ URL::to('/') }}/../theme/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
    <script src="{{ URL::to('/') }}/../theme/assets/global/plugins/bootstrap-markdown/lib/markdown.js"
            type="text/javascript"></script>
    <script src="{{ URL::to('/') }}/../theme/assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js"
            type="text/javascript"></script>
    <script src="{{ URL::to('/') }}/../theme/assets/global/plugins/bootstrap-summernote/summernote.min.js"
            type="text/javascript"></script>
    <script src="{{ URL::to('/') }}/../theme/assets/admin/pages/scripts/components-editors.js"></script>
@stop
@section('jscode')

    <script>
        $(function(){

        });
    </script>
    <script>
        jQuery(document).ready(function () {
            ComponentsEditors.init();
            jQuery('#summernote').summernote();

        });
    </script>
@stop