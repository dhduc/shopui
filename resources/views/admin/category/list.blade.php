@extends('layouts.admin.master')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/../theme/assets/global/plugins/jstree/dist/themes/default/style.min.css"/>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="portlet blue-hoki box">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Category Tree
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title="">
                        </a>

                        <a href="javascript:;" class="reload" data-original-title="" title="">
                        </a>

                    </div>
                </div>

                <div class="portlet-body">
                    <div id="tree_1" class="tree-demo jstree jstree-1 jstree-default" role="tree" aria-activedescendant="j1_1">
                    <ul class="jstree-container-ul jstree-children"><li role="treeitem" aria-expanded="true" id="j1_1" class="jstree-node  jstree-open" aria-selected="true">
                            <i class="jstree-icon jstree-ocl"></i><a class="jstree-anchor" href="#">
                                <i class="jstree-icon jstree-themeicon fa fa-folder icon-state-warning icon-lg jstree-themeicon-custom"></i>
                                Website
                            </a>

                            <ul role="group" class="jstree-children">
                                <?php
                                  echo $allCategoriesInView;
                                ?>
                            </ul>

                    </ul>
                        </div>

                    <a class="btn blue" href="{{ URL::to("/")."/admin/category/create" }}"><i class="fa fa-plus"></i>  Create</a>

                    </div>
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <div class="portlet">

                <div class="portlet-body">
                    <table id="grid-data-api" class="table table-condensed table-hover table-striped">
                        <thead>
                        <tr>
                            <th data-column-id="name"><?php echo Lang::get('messages.category_name'); ?></th>
                            <th data-column-id="parent_id"><?php echo Lang::get('messages.category_parent_id'); ?></th>
                            <th data-column-id="created_at"><?php echo Lang::get('messages.category_created_at'); ?></th>
                            <th data-column-id="updated_at"><?php echo Lang::get('messages.category_updated_at'); ?></th>

                            <th data-column-id="action"><?php echo Lang::get('messages.action'); ?></th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>


@stop
@section('js')

<script src="{{ URL::to('/') }}/../theme/assets/global/plugins/jstree/dist/jstree.min.js"></script>
<script src="{{ URL::to('/') }}/../theme/assets/admin/pages/scripts/ui-tree.js"></script>

@stop
@section('jscode')
<script>
    jQuery(document).ready(function() {
        UITree.init();
    });
</script>
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
            url: "{{url('admin/category/getDataAjax')}}"


        });
    })

</script>

@stop


