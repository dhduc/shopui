@extends('auth.master')
@section('css')
    <style>

        form{
            background-color:#fff
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
        form{
            padding:40px 20px;
            box-shadow:0 0 10px;
            border-radius:2px
        }
        h2{
            margin-left:30px
        }

        #file{
            color:green;
            padding:5px;
            border:1px dashed #123456;
            background-color:#f9ffe5;
            margin: 0 auto;
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
        .abcd{
            text-align:center;
            height: 110px
        }
        .abcd img{
            height:100px;
            width:100px;
            padding:5px;
            border:1px solid #e8debd
        }
        b{
            color:red
        }
    </style>
@stop
@section('content')
    <div id="maindiv">
        @if (Session::get('success'))
            <div class="alert alert-success alert-dismissible col-sm-2" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ Session::get('success') }}
            </div>
            <style>
                .alert{
                    position: fixed !important;
                    right: 10px;
                    top: 10px;
                    z-index: 1000;
                }
            </style>
        @endif
        <div id="formdiv">
            <form enctype="multipart/form-data" action="{{ URL::action('DemoController@postImageUpload') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div id="filediv"><input name="images[]" type="file" id="file"/></div>
                <input type="button" id="add_more" class="upload btn btn-primary" value="Add More Files"/>
                <input type="submit" value="Upload File" name="submit" id="upload" class="upload btn btn-primary"/>
            </form>
        </div>
    </div>
@stop
@section('js')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        var abc = 0;      // Declaring and defining global increment variable.
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
                    abc += 1; // Incrementing global variable by 1.
                    var z = abc - 1;
                    var x = $(this).parent().find('#previewimg' + z).remove();
                    $(this).before("<div id='abcd" + abc + "' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);
                    $(this).hide();
                    $("#abcd" + abc).append($("<i id='img' class='glyphicon glyphicon-remove'></i>").click(function() {
                        $(this).parent().parent().remove();
                    }));
                }
            });
// To Preview Image
            function imageIsLoaded(e) {
                $('#previewimg' + abc).attr('src', e.target.result);
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