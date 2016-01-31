@extends('layouts.admin.master')
@section('js')
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script>
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#avatar_pre').attr('src', e.target.result);
                    $('#avatar_pre').css('display', 'inline');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#avatar").change(function(){

            readURL(this);
        });
    </script>
@stop
@section('content')
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal form-row-seperated" action="{{ URL::action('Admin\UsersController@update', $result->id) }}" method="Post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT">
            <div class="portlet" id="edit-user">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-user"></i><?php echo Lang::get('messages.edit_user'); ?>
                    </div>
                    <div class="actions btn-set">
                        <a href="{{ URL::action('Admin\UsersController@index') }}" name="back" class="btn default"><i class="fa fa-angle-left"></i> <?php echo Lang::get('messages.list_users'); ?></a>
                        <button class="btn default" type="reset"><i class="fa fa-reply"></i> <?php echo Lang::get('messages.reset'); ?></button>
                        <button class="btn green" type="submit"><i class="fa fa-check"></i>  <?php echo Lang::get('messages.update'); ?></button>
                    </div>
                </div>

                <div class="user_edit_left col-sm-9">
                    <div class="portlet-body">
                        <div class="form-group">
                            <label for=name" class="col-sm-2 control-label"><?php echo Lang::get('messages.users_name'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" value="{{ old('name', $result['name'])}}" id="name" placeholder="<?php echo Lang::get('messages.users_name'); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="form-group">
                            <label for=password" class="col-sm-2 control-label"><?php echo Lang::get('messages.users_password'); ?></label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="password" value="{{ old('password', substr($password, 0, 20))}}" id="password" placeholder="<?php echo Lang::get('messages.users_password'); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="form-group">
                            <label for=email" class="col-sm-2 control-label"><?php echo Lang::get('messages.users_email'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="email" value="{{ old('email', $result['email'])}}" id="email" placeholder="<?php echo Lang::get('messages.users_email'); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="form-group">
                            <label for=phone" class="col-sm-2 control-label"><?php echo Lang::get('messages.users_phone'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="phone" value="{{ old('phone', $result['phone'])}}" id="phone" placeholder="<?php echo Lang::get('messages.users_phone'); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="form-group">
                            <label for=avatar" class="col-sm-2 control-label"><?php echo Lang::get('messages.users_avatar'); ?></label>
                            <div class="col-sm-5">
                                <input type="file" class="form-control" name="avatar" id="avatar" >

                            </div>

                        </div>

                    </div>

                    <div class="portlet-body">
                        <div class="form-group">
                            <label for=status" class="col-sm-2 control-label"><?php echo Lang::get('messages.users_status'); ?></label>
                            <div class="col-sm-8">
                                <select class="form-control" class="col-lg-8" name="status">
                                    <?php
                                        echo $listStatus;
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="form-group">
                            <label for=role_id" class="col-sm-2 control-label"><?php echo Lang::get('messages.users_role_id'); ?></label>
                            <div class="col-sm-8">
                                <select class="form-control" class="col-lg-8" name="role_id">
                                    <?php
                                        echo $listRole;
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>





                    <div class="portlet-body">
                        <div class="form-group">
                            <label for=created_at" class="col-sm-2 control-label"><?php echo Lang::get('messages.users_created_at'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" name="created_at" value="{{ old('created_at', $result['created_at'])}}" id="created_at" placeholder="<?php echo Lang::get('messages.users_created_at'); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="form-group">
                            <label for=updated_at" class="col-sm-2 control-label"><?php echo Lang::get('messages.users_updated_at'); ?></label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" name="updated_at" value="{{ old('updated_at', $result['updated_at'])}}" id="updated_at" placeholder="<?php echo Lang::get('messages.users_updated_at'); ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="user_edit_right col-sm-3">
                    <div class="">
                        <img src="{{ URL::to('/') }}/{{ old('avatar', $result['avatar'])}}" id="avatar_pre" alt="Avatar Preview" width="150" height="150"/>
                    </div>
                </div>


            </div>

        </form>
    </div>
</div>
@stop
