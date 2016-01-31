@extends('layouts.admin.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-list-alt"></i><?php echo Lang::get('messages.list_role'); ?>
                    </div>
                    <div class="actions">
                        <a href="{{ URL::action('Admin\RoleController@create') }}" class="btn default yellow-stripe">
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
                            <th data-column-id="role_name"><?php echo Lang::get('messages.role_role_name'); ?></th>
                            <th data-column-id="role"><?php echo Lang::get('messages.role_role'); ?></th>
                            <th data-column-id="created_at"><?php echo Lang::get('messages.role_created_at'); ?></th>
                            <th data-column-id="updated_at"><?php echo Lang::get('messages.role_updated_at'); ?></th>
                            <th data-column-id="action"><?php echo Lang::get('messages.action'); ?></th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop

@section('jscode')
    <script>
        jQuery(document).ready(function () {

            $("#grid-data-api").bootgrid({
                ajax: true,
                post: function () {
                    /* To accumulate custom parameter with the request object */
                    return {
                        _token: "{{csrf_token()}}"
                    };
                },
                url: "{{url('admin/role/getDataAjax')}}"


            });
        })

    </script>

@stop