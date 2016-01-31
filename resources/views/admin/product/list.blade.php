@extends('layouts.admin.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-screen-desktop"></i><?php echo Lang::get('messages.list_product'); ?>
                    </div>
                    <div class="actions">
                        <a href="{{ URL::action('Admin\ProductController@create') }}" class="btn default yellow-stripe">
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

                            <th data-column-id="thumbnail" data-formatter="thumbnail"><?php echo Lang::get('messages.product_thumbnail'); ?></th>
                            <th data-column-id="name" data-formatter="link"><?php echo Lang::get('messages.product_name'); ?></th>
                            <th data-column-id="cost"><?php echo Lang::get('messages.product_cost'); ?></th>
                            <th data-column-id="price"><?php echo Lang::get('messages.product_price'); ?></th>
                            <th data-column-id="number"><?php echo Lang::get('messages.product_number'); ?></th>
                            <th data-column-id="purchase"><?php echo Lang::get('messages.product_purchase'); ?></th>
                            <th data-column-id="created_at"><?php echo Lang::get('messages.product_created_at'); ?></th>
                            <th data-column-id="action"><?php echo Lang::get('messages.action'); ?></th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <br/>

            <a class="btn btn-primary" data-toggle="modal" href="#basic"><i class="fa fa-cog"></i> Set Thumbnail</a>
            <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Set Thumbnail All Product</h4>
                        </div>
                        <div class="modal-body">
                            Are you want to set thumbnail to all product?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn default" data-dismiss="modal">Close</button>
                            <a class="btn btn-primary" href="{{ URL::action('Admin\ProductController@setThumbnail') }}"><i class="fa fa-check"></i> Set Thumbnail</a>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
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
                                type: "all"
                            };
                        },
                        url: "{{url('admin/product/getDataAjax')}}",
                        formatters: {
                            "thumbnail": function(column, row) {
                                return "<img id='thumbnail' src='../" + row.thumbnail + "' />";
                            },
                            "link": function(column, row) {
                                return "<a target='_blank'  href='../product/" + row.id +"/" + row.name + ".html'>" + row.name + "</a>";
                            }
                        }

                    });
                })

            </script>

@stop