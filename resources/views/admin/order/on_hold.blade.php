@extends('layouts.admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-shopping-cart"></i><?php echo Lang::get('messages.list_order'); ?> On Hold
                    </div>
                    <div class="actions">

                    </div>
                </div>
                <div class="portlet-body">
                    <table id="grid-data-api" class="table table-condensed table-hover table-striped">
                        <thead>
                        <tr>
                            <th data-column-id="id" data-formatter="order">OrderID</th>
                            <th data-column-id="userID"><?php echo Lang::get('messages.order_userID'); ?></th>
                            <th data-column-id="customerID"><?php echo Lang::get('messages.order_customerID'); ?></th>
                            <th data-column-id="datetime"><?php echo Lang::get('messages.order_datetime'); ?></th>
                            <th data-column-id="total"><?php echo Lang::get('messages.order_total'); ?></th>

                            <th data-column-id="status"><?php echo Lang::get('messages.order_status'); ?></th>


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
                                type: "on_hold"
                            };
                        },
                        url: "{{url('admin/order/getDataAjax')}}",
                        formatters: {
                            "order": function(column, row) {
                                return "<a href='../order/"+ row.id +"/edit'>DH"+ row.id +"</a>";
                            }
                        }


                    });
                })

            </script>

@stop