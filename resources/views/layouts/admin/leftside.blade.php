<?php $class_name = isset($class_name) ? $class_name : '' ?>
<?php $action_name = isset($action_name) ? $action_name : '' ?>
<div class="page-sidebar-wrapper">

    <div class="page-sidebar navbar-collapse collapse">

        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler">
                </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <li class="sidebar-search-wrapper">
               <form class="sidebar-search " action="extra_search.html" method="POST">
                    <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                    </a>

                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
							<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
							</span>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <li class="start ">
                <a href="{{ URL::to('/admin/dashboard') }}">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>

                </a>

            </li>

            <li <?php if ($class_name == "UsersController") echo 'class="start active open"'; ?>>
                <a href="javascript:;">
                    <i class="icon-user"></i>
                    <span class="title">Users</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li <?php if ($action_name == "index") echo 'class="active"'; ?>>
                        <a href="{{ URL::action('Admin\UsersController@index') }}">
                            List Users</a>
                    </li>
                    <li <?php if ($action_name == "create") echo 'class="active"'; ?>>
                        <a href="{{ URL::action('Admin\UsersController@create') }}">
                            Create Users</a>
                    </li>

                </ul>
            </li>


            <li <?php if ($class_name == "RoleController") echo 'class="start active open"'; ?>>
                <a href="javascript:;">
                    <i class="icon-list"></i>
                    <span class="title">Role</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li <?php if ($action_name == "index") echo 'class="active"'; ?>>
                        <a href="{{ URL::action('Admin\RoleController@index') }}">
                            List Role</a>
                    </li>
                    <li <?php if ($action_name == "create") echo 'class="active"'; ?>>
                        <a href="{{ URL::action('Admin\RoleController@create') }}">
                            Create Role</a>
                    </li>

                </ul>
            </li>


            <li <?php if ($class_name == "PermissionController") echo 'class="start active open"'; ?>>
                <a href="javascript:;">
                    <i class="icon-check"></i>
                    <span class="title">Permission</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li <?php if ($action_name == "index") echo 'class="active"'; ?>>
                        <a href="{{ URL::action('Admin\PermissionController@index') }}">
                            Management</a>
                    </li>


                </ul>
            </li>

            <li <?php if($class_name=="CategoryController") echo 'class="start active open"'; ?>>
                <a href="javascript:;">
                    <i class="icon-folder"></i>
                    <span class="title">Category</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li <?php if($action_name=="index") echo 'class="active"'; ?>>
                        <a href="{{ URL::action('Admin\CategoryController@index') }}">
                            List Category</a>
                    </li>
                    <li <?php if($action_name=="create") echo 'class="active"'; ?>>
                        <a href="{{ URL::action('Admin\CategoryController@create') }}">
                            Create Category</a>
                    </li>

                </ul>
            </li>

            <li <?php if($class_name=="ProducerController") echo 'class="start active open"'; ?>>
                <a href="javascript:;">
                    <i class="icon-notebook"></i>
                    <span class="title">Producer</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li <?php if($action_name=="index") echo 'class="active"'; ?>>
                        <a href="{{ URL::action('Admin\ProducerController@index') }}">
                            List Producer</a>
                    </li>
                    <li <?php if($action_name=="create") echo 'class="active"'; ?>>
                        <a href="{{ URL::action('Admin\ProducerController@create') }}">
                            Create Producer</a>
                    </li>

                </ul>
            </li>

            <li <?php if($class_name=="ProductController") echo 'class="start active open"'; ?>>
                <a href="javascript:;">
                    <i class="icon-screen-desktop"></i>
                    <span class="title">Product</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li <?php if($action_name=="index") echo 'class="active"'; ?>>
                        <a href="{{ URL::action('Admin\ProductController@index') }}">
                            List All Product</a>
                    </li>
                    <li <?php if($action_name=="stock") echo 'class="active"'; ?>>
                        <a href="{{ URL::action('Admin\ProductController@stock') }}">
                            List Product Stock</a>
                    </li>
                    <li <?php if($action_name=="closed") echo 'class="active"'; ?>>
                        <a href="{{ URL::action('Admin\ProductController@closed') }}">
                            List Product Closed</a>
                    </li>
                    <li <?php if($action_name=="create") echo 'class="active"'; ?>>
                        <a href="{{ URL::action('Admin\ProductController@create') }}">
                            Create Product</a>
                    </li>

                </ul>
            </li>

            <li <?php if($class_name=="OrderController") echo 'class="start active open"'; ?>>
                <a href="javascript:;">
                    <i class="icon-basket"></i>
                    <span class="title">Order</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li <?php if($action_name=="index") echo 'class="active"'; ?>>
                        <a href="{{ URL::action('Admin\OrderController@index') }}">
                            List All Order</a>
                    </li>
                    <li <?php if($action_name=="pending") echo 'class="active"'; ?>>
                        <a href="{{ URL::action('Admin\OrderController@pending') }}">
                            List Order Pending</a>
                    </li>
                    <li <?php if($action_name=="on_hold") echo 'class="active"'; ?>>
                        <a href="{{ URL::action('Admin\OrderController@on_hold') }}">
                            List Order On Hold</a>
                    </li>
                    <li <?php if($action_name=="closed") echo 'class="active"'; ?>>
                        <a href="{{ URL::action('Admin\OrderController@closed') }}">
                            List Order Closed</a>
                    </li>
                    <li <?php if($action_name=="cancelled") echo 'class="active"'; ?>>
                        <a href="{{ URL::action('Admin\OrderController@cancelled') }}">
                            List Order Cancelled</a>
                    </li>


                </ul>
            </li>




            <li class="heading">
                <h3 class="uppercase">More</h3>
            </li>

            <li <?php if($class_name=="SlideController") echo 'class="start active open"'; ?>>
                <a href="javascript:;">
                    <i class="icon-puzzle"></i>
                    <span class="title">Slider</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li <?php if($action_name=="index") echo 'class="active"'; ?>>
                        <a href="{{ URL::action('Admin\SliderController@index') }}">
                            Management</a>
                    </li>


                </ul>
            </li>

            <li <?php if($class_name=="PagesController") echo 'class="start active open"'; ?>>
                <a href="javascript:;">
                    <i class="icon-share"></i>
                    <span class="title">Pages</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li <?php if($action_name=="index") echo 'class="active"'; ?>>
                        <a href="{{ URL::action('Admin\PagesController@index') }}">
                            List Pages</a>
                    </li>
                    <li <?php if($action_name=="create") echo 'class="active"'; ?>>
                        <a href="{{ URL::action('Admin\PagesController@create') }}">
                            Create Pages</a>
                    </li>

                </ul>
            </li>

            <li <?php if($class_name=="ConfigController") echo 'class="start active open"'; ?>>
                <a href="javascript:;">
                    <i class="icon-settings"></i>
                    <span class="title">Config</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li <?php if($action_name=="index") echo 'class="active"'; ?>>
                        <a href="{{ URL::action('Admin\ConfigController@index') }}">
                            Website Config</a>
                    </li>


                </ul>
            </li>

            <li>
                <a href="{{ URL::to('/') }}" target="_blank">
                    <i class="icon-screen-tablet"></i>
                    <span class="title">Website</span>
                </a>

            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>