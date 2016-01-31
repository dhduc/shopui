@extends('layouts.admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal form-row-seperated" action="{{ URL::action('Admin\CategoryController@update', $result->id) }}" method="Post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-folder"></i>Category Edit
                        </div>
                        <div class="actions btn-set">
                            <a href="{{ URL::action('Admin\CategoryController@index') }}" name="back" class="btn default"><i class="fa fa-angle-left"></i> <?php echo Lang::get('messages.list_category'); ?></a>
                            <button class="btn default" type="reset"><i class="fa fa-reply"></i> <?php echo Lang::get('messages.reset'); ?></button>
                            <button class="btn green" type="submit"><i class="fa fa-check"></i>  <?php echo Lang::get('messages.update'); ?></button>
                            <a class="btn red" href="{{ URL::to("/")."/admin/category/".$result['id']."/del" }}"><i class="fa fa-plus"></i>Delete</a>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="form-group">
                            <label for=name" class="col-sm-2 control-label"><?php echo Lang::get('messages.category_name'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" value="{{ old('name', $result['name'])}}" id="name" placeholder="<?php echo Lang::get('messages.category_name'); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="form-group">
                            <label for="parent" class="col-sm-2 control-label">Parent</label>
                            <div class="col-sm-5">
                                <ul class="category_tree">
                                    <li>
                                        <input type="radio" name="parent_id" id="" value="0">None
                                    </li>
                                    <?php
                                    echo $allCategoriesInView;
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>



                </div>
            </form>
        </div>
    </div>
@stop