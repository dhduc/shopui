@extends('layouts.admin.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-screen-desktop"></i><?php echo Lang::get('messages.list_product'); ?> of {{ $categoryName }}
                    </div>
                    <div class="actions">
                        <a href="{{ URL::action('Admin\ProducerController@create') }}" class="btn default yellow-stripe">
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
                            <th data-column-id="name"><?php echo Lang::get('messages.product_name'); ?></th>
                            <th data-column-id="cost"><?php echo Lang::get('messages.product_cost'); ?></th>
                            <th data-column-id="price"><?php echo Lang::get('messages.product_price'); ?></th>
                            <th data-column-id="number"><?php echo Lang::get('messages.product_number'); ?></th>
                            <th data-column-id="purchase"><?php echo Lang::get('messages.product_purchase'); ?></th>
                            <th data-column-id="status"><?php echo Lang::get('messages.product_status'); ?></th>
                            <th data-column-id="created_at"><?php echo Lang::get('messages.product_created_at'); ?></th>
                            <th data-column-id="updated_at"><?php echo Lang::get('messages.product_updated_at'); ?></th>
                            <th data-column-id="action"><?php echo Lang::get('messages.action'); ?></th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
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
                                _token: "{{csrf_token()}}",
                                allID: "{{ $allID }}"
                            };
                        },
                        url: "{{url('admin/category/list')}}"


                    });
                })

            </script>

@stop