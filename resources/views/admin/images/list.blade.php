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
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-shopping-cart"></i><?php echo Lang::get('messages.list_images'); ?> of {{ $productName }}
                    </div>

                </div>
                <div class="portlet-body" style="">
                    <form class="form-horizontal form-row-seperated" action="{{ URL::action('Admin\ImagesController@index') }}"
                          method="Post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="image" class="col-sm-2 control-label">Insert image to product</label>
                        <div class="col-sm-8">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div id="filediv"><input name="images[]" type="file" id="file"/></div>
                            <input type="button" id="add_more" class="upload btn btn-primary" value="Add More Files"/>
                            <input type="hidden" name="productID" value="{{ $productID }}" />
                            <input type="submit" value="Upload File" name="submit" id="upload" class="upload btn btn-primary"/>

                        </div>
                    </div>
                    </form>
                </div>

                <div class="portlet-body" style="padding-top: 20px !important;">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>
                                    ID
                                </th>

                                <th>
                                    Images
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Delete
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
@stop