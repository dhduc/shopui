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