@extends('layouts.admin.master')

@section('content')
<div class="row">

    <div class="col-md-12">
        <div class="portlet">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i><?php echo Lang::get('messages.list_users'); ?>
                </div>
                <div class="actions">
                    <a href="{{ URL::action('Admin\UsersController@create') }}" class="btn default yellow-stripe">
                        <i class="fa fa-plus"></i>
         <span class="hidden-480">
         <?php echo Lang::get('messages.create_new'); ?> </span>
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <table id="grid-data-api" class="table table-condensed table-hover table-striped">
                    <thead>
                    <tr>
                        <th data-column-id="name"><?php echo Lang::get('messages.users_name'); ?></th>

                        <th data-column-id="email"><?php echo Lang::get('messages.users_email'); ?></th>


                        <th data-column-id="status"><?php echo Lang::get('messages.users_status'); ?></th>
                        <th data-column-id="role_id"><?php echo Lang::get('messages.users_role_id'); ?></th>

                        <th data-column-id="created_at"><?php echo Lang::get('messages.users_created_at'); ?></th>
                        <th data-column-id="updated_at"><?php echo Lang::get('messages.users_updated_at'); ?></th>

                        <th data-column-id="action"><?php echo Lang::get('messages.action'); ?></th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <a class="btn default" data-toggle="modal" href="#basic">
        View Demo </a>
    <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Modal Title</h4>
                </div>
                <div class="modal-body">
                    Modal body goes here
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn blue">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    @stop

    @section('jscode')
    <script>
        jQuery(document).ready(function() {

            $("#grid-data-api").bootgrid({
                ajax: true,
                post: function ()
                {
                    /* To accumulate custom parameter with the request object */
                    return {
                        _token: "{{csrf_token()}}"
                    };
                },
                url: "{{url('admin/users/getDataAjax')}}"


            });
        })

    </script>

    @stop

