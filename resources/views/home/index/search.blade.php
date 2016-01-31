@extends('layouts.home.master')
@section('css')
    <style>
        ul.pagination {
            margin-bottom: 20px;
        }
    </style>

@stop
@include('layouts.home.alert')
@section('content')

    <?php if(isset($keyword)){ ?>
    <div class="content-search margin-bottom-20">
        <div class="row">
            <div class="col-md-6">
                <h1>Search result for <em>{{ $keyword }}</em></h1>
            </div>
            <div class="col-md-6">
                <form action="{{ URL::action('Home\SearchController@search') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="input-group">
                        <input type="text" placeholder="Search again" class="form-control" name="search">
                      <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit">Search</button>
                      </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php } ?>

    <div class="row previews">

        <?php
            if($allProductInView != null){
                echo $allProductInView;
            }
            else {
                echo "<h1>NO RESULT FOUND</h1>";
            }
        ?>

    </div>
    <center>

        <?php echo $pagination; ?>
    </center>


@stop