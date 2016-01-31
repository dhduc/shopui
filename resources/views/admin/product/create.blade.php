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
        .wysihtml5-sandbox {
            height: 150px !important;
        }
        #maindiv{
            width:960px;
            margin:10px auto;
            padding:10px;
            font-family:'Droid Sans',sans-serif
        }
        #formdiv{
            width:500px;
            float:left;
            text-align:center
        }
        #file{

            padding:5px;
            border:1px dashed #123456;
            margin-bottom: 10px;
        }
        #upload{
            margin-left:45px
        }
        #noerror{
            color:green;
            text-align:left
        }
        #error{
            color:red;
            text-align:left
        }
        #img{
            width:17px;
            border:none;
            height:17px;
            margin-left:-20px;
            margin-bottom:91px
        }
        .imgUpload{
            /*text-align:center;*/
            height: 110px
        }
        .imgUpload img{
            height:100px;
            width:100px;
            padding:5px;
            border:1px solid #e8debd
        }
        .input-button {
            margin: 0 auto;
            margin-bottom: 5px;
        }
    </style>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal form-row-seperated" action="{{ URL::action('Admin\ProductController@index') }}"
                  method="Post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-screen-desktop"></i><?php echo Lang::get('messages.create_product'); ?>
                        </div>
                        <div class="actions btn-set">
                            <a href="{{ URL::action('Admin\ProductController@index') }}" name="back" class="btn default"><i
                                        class="fa fa-angle-left"></i> <?php echo Lang::get('messages.list_product'); ?>
                            </a>
                            <button class="btn default" type="reset"><i
                                        class="fa fa-reply"></i><?php echo Lang::get('messages.reset'); ?></button>
                            <button class="btn green" type="submit" id="upload"><i
                                        class="fa fa-check"></i> <?php echo Lang::get('messages.create'); ?></button>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="form-group">
                            <label for="name"
                                   class="col-sm-2 control-label"><?php echo Lang::get('messages.product_name'); ?></label>

                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" value="{{ old('name', '')}}"
                                       id="name" placeholder="<?php echo Lang::get('messages.product_name'); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="form-group">
                            <label for="category_id"
                                   class="col-sm-2 control-label"><?php echo Lang::get('messages.product_category_id'); ?></label>

                            <div class="col-sm-8">
                                <select name="category_id" class="form-control">
                                    <?php echo $allCategoriesInView; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="form-group">
                            <label for="seller_id"
                                   class="col-sm-2 control-label"><?php echo Lang::get('messages.product_seller_id'); ?></label>

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
                            <label for="image"
                                   class="col-sm-2 control-label"><?php echo Lang::get('messages.product_image'); ?></label>

                           <div class="col-sm-8">
                               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                               <div id="filediv"><input name="images[]" type="file" id="file"/></div>

                               <input type="button" id="add_more" class="upload btn btn-primary" value="Add More Files"/>

                           </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="form-group">
                            <label for="cost"
                                   class="col-sm-2 control-label"><?php echo Lang::get('messages.product_cost'); ?></label>

                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="cost" value="{{ old('cost', '')}}"
                                       id="cost" placeholder="<?php echo Lang::get('messages.product_cost'); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="form-group">
                            <label for="price"
                                   class="col-sm-2 control-label"><?php echo Lang::get('messages.product_price'); ?></label>

                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="price" value="{{ old('price', '')}}"
                                       id="price" placeholder="<?php echo Lang::get('messages.product_price'); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="form-group">
                            <label for="producer"
                                   class="col-sm-2 control-label"><?php echo Lang::get('messages.product_producer'); ?></label>

                            <div class="col-sm-8">
                                <select name="producer" class="form-control">
                                    <?php echo $allProducers; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="form-group">
                            <label for="description"
                                   class="col-sm-2 control-label"><?php echo Lang::get('messages.product_description'); ?></label>

                            <div class="col-sm-8">
                                <textarea class="form-control" noresize name="description" id="" cols="30" rows="5"
                                          placeholder="Product's Description">{{ old('description', '')}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="form-group">
                            <label for="information"
                                   class="col-sm-2 control-label"><?php echo Lang::get('messages.product_information'); ?>
                            </label>
                            <div class="col-sm-8">
                                <textarea class="wysihtml5 form-control" name="information">{{ old('information') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="form-group">
                            <label for="number" class="col-sm-2 control-label"><?php echo Lang::get('messages.product_number'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="number" value="{{ old('number', '')}}" id="number" placeholder="<?php echo Lang::get('messages.product_number'); ?>">
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
        var i = 0;      // Declaring and defining global increment variable.
        $(document).ready(function() {
        //  To add new input file field dynamically, on click of "Add More Files" button below function will be executed.
            $('#add_more').click(function() {
                $(this).before($("<div/>", {
                    id: 'filediv'
                }).fadeIn('slow').append($("<input/>", {
                    name: 'images[]',
                    type: 'file',
                    id: 'file'
                }), $("<br/><br/>z")));
            });
        // Following function will executes on change event of file input to select different file.
            $('body').on('change', '#file', function() {
                if (this.files && this.files[0]) {
                    i += 1; // Incrementing global variable by 1.
                    var z = i - 1;
                    var x = $(this).parent().find('#previewimg' + z).remove();
                    $(this).before("<div id='imgUpload" + i + "' class='imgUpload'><img id='previewimg" + i + "' src=''/></div>");
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);
                    $(this).hide();
                    $("#imgUpload" + i).append($("<i id='img' class='glyphicon glyphicon-remove'></i>").click(function() {
                        $(this).parent().parent().remove();
                    }));
                }
            });
            // To Preview Image
            function imageIsLoaded(e) {
                $('#previewimg' + i).attr('src', e.target.result);
            };
            $('#upload').click(function(e) {
                var name = $(":file").val();
                if (!name) {
                    alert("First Image Must Be Selected");
                    e.preventDefault();
                }
            });
        });
    </script>
    <script>
        jQuery(document).ready(function () {
            ComponentsEditors.init();
            jQuery('#summernote').summernote();

        });
    </script>
@stop