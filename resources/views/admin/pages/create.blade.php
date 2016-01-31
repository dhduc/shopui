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
            height: 300px !important;
        }
    </style>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal form-row-seperated" action="{{ URL::action('Admin\PagesController@index') }}" method="Post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-share"></i><?php echo Lang::get('messages.create_pages'); ?>
                        </div>
                        <div class="actions btn-set">
                            <a href="{{ URL::action('Admin\PagesController@index') }}" name="back" class="btn default"><i class="fa fa-angle-left"></i> <?php echo Lang::get('messages.list_pages'); ?></a>
                            <button class="btn default" type="reset"><i class="fa fa-reply"></i><?php echo Lang::get('messages.reset'); ?></button>
                            <button class="btn green" type="submit"><i class="fa fa-check"></i> <?php echo Lang::get('messages.create'); ?></button>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label"><?php echo Lang::get('messages.pages_title'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="title" value="{{ old('title', '')}}" id="title" placeholder="<?php echo Lang::get('messages.pages_title'); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="form-group">
                            <label for="content" class="col-sm-2 control-label"><?php echo Lang::get('messages.pages_content'); ?></label>
                            <div class="col-sm-8">
                                <textarea class="wysihtml5 form-control" name="content">{{ old('content') }}</textarea>
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