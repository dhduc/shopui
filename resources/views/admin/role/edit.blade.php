@extends('layouts.admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal form-row-seperated" action="{{ URL::action('Admin\RoleController@update', $result->id) }}" method="Post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="id" value="{{ $result['id'] }}">
                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-list-alt"></i><?php echo Lang::get('messages.edit_rol'); ?>
                        </div>
                        <div class="actions btn-set">
                            <a href="{{ URL::action('Admin\RoleController@index') }}" name="back" class="btn default"><i class="fa fa-angle-left"></i> <?php echo Lang::get('messages.list_role'); ?></a>
                            <button class="btn default" type="reset"><i class="fa fa-reply"></i> <?php echo Lang::get('messages.reset'); ?></button>
                            <button class="btn green" type="submit"><i class="fa fa-check"></i>  <?php echo Lang::get('messages.update'); ?></button>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="form-group">
                            <label for=role" class="col-sm-2 control-label"><?php echo Lang::get('messages.role_role'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="role" value="{{ old('role', $result['role'])}}" id="role" placeholder="<?php echo Lang::get('messages.role_role'); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="form-group">
                            <label for=role_name" class="col-sm-2 control-label"><?php echo Lang::get('messages.role_role_name'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="role_name" value="{{ old('role_name', $result['role_name'])}}" id="role_name" placeholder="<?php echo Lang::get('messages.role_role_name'); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="form-group">
                            <label for=created_at" class="col-sm-2 control-label"><?php echo Lang::get('messages.role_created_at'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" name="created_at" value="{{ old('created_at', $result['created_at'])}}" id="created_at" placeholder="<?php echo Lang::get('messages.role_created_at'); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="form-group">
                            <label for=updated_at" class="col-sm-2 control-label"><?php echo Lang::get('messages.role_updated_at'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" name="updated_at" value="{{ old('updated_at', $result['updated_at'])}}" id="updated_at" placeholder="<?php echo Lang::get('messages.role_updated_at'); ?>">
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
@stop