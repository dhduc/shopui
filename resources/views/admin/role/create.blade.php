@extends('layouts.admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal form-row-seperated" action="{{ URL::action('Admin\RoleController@index') }}" method="Post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-list-alt"></i><?php echo Lang::get('messages.create_rol'); ?>
                        </div>
                        <div class="actions btn-set">
                            <a href="{{ URL::action('Admin\RoleController@index') }}" name="back" class="btn default"><i class="fa fa-angle-left"></i> <?php echo Lang::get('messages.list_role'); ?></a>
                            <button class="btn default" type="reset"><i class="fa fa-reply"></i><?php echo Lang::get('messages.reset'); ?></button>
                            <button class="btn green" type="submit"><i class="fa fa-check"></i> <?php echo Lang::get('messages.create'); ?></button>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="form-group">
                            <label for="role" class="col-sm-2 control-label"><?php echo Lang::get('messages.role_role'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="role" value="{{ old('role', '')}}" id="role" placeholder="<?php echo Lang::get('messages.role_role'); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="form-group">
                            <label for="role_name" class="col-sm-2 control-label"><?php echo Lang::get('messages.role_role_name'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="role_name" value="{{ old('role_name', '')}}" id="role_name" placeholder="<?php echo Lang::get('messages.role_role_name'); ?>">
                            </div>
                        </div>
                    </div>

                    

            </form>
        </div>
    </div>
@stop