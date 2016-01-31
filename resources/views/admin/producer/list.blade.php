@extends('layouts.admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-notebook"></i><?php echo Lang::get('messages.list_producer'); ?>
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
                            <th data-column-id="logo" data-formatter="logo"><?php echo Lang::get('messages.producer_logo'); ?></th>
                            <th data-column-id="producer" data-formatter="link"><?php echo Lang::get('messages.producer_producer'); ?></th>
                            <th data-column-id="information"><?php echo Lang::get('messages.producer_information'); ?></th>
                            <th data-column-id="created_at"><?php echo Lang::get('messages.producer_created_at'); ?></th>
                            <th data-column-id="updated_at"><?php echo Lang::get('messages.producer_updated_at'); ?></th>

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
                                _token: "{{csrf_token()}}"
                            };
                        },
                        url: "{{url('admin/producer/getDataAjax')}}",
                        formatters: {
                            "logo": function(column, row) {
                                return "<img id='logo' src='../" + row.logo + "' />";
                            },
                            "link": function(column, row) {
                                return "<a id=''  href='producer/" + row.id +"/edit'>" + row.producer + "</a>";
                            }
                        }
                    });
                })

            </script>

@stop