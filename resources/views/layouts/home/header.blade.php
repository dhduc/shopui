<!-- BEGIN TOP BAR -->
<div class="pre-header">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 additional-shop-info">
                <ul class="list-unstyled list-inline">
                    <li><i class="fa fa-phone"></i><span>{{ $config['telephone'] }}</span></li>
                    <li><i class="fa fa-envelope-o"></i><span>{{ $config['email'] }}</span></li>
                </ul>
            </div>
            <div class="col-md-6 col-sm-6 additional-nav">
                <ul class="list-unstyled list-inline pull-right">
                    @if( Auth::guest() )
                        <li><a href="{{ URL::to('/') }}"><i class="fa fa-fw fa-home"></i>Home</a></li>
                        <li><a href="{{ URL::to('auth/login') }}"><i class="fa fa-fw fa-sign-in"></i>Log In</a></li>
                        <li><a href="{{ URL::to('auth/register') }}"><i class="fa fa-fw fa-sign-out"></i>Sign Up</a></li>
                    @else
                        <li><i class="fa fa-user"></i>Welcome {{ Auth::user()->name }}</li>
                        <?php
                          if(checkMember()) {
                        ?>
                        <li><a href="{{ URL::to('account') }}/{{ Auth::user()->id }}">Account</a></li>
                        <li><a href="{{ URL::to('account/history') }}">History</a></li>
                        <?php } else { ?>
                        <li><a href="{{ URL::to('admin/dashboard') }}">Dashboard</a></li>
                        <?php } ?>


                        <li><a href="{{ URL::to('auth/logout') }}">Logout</a></li>

                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END TOP BAR -->
<!-- BEGIN HEADER -->
<div class="header">
    <div class="container">
        <a class="site-logo" href="{{ URL::TO('/') }}"><img src="{{ asset('/').$config['logo'] }}" alt="Shop"></a>
        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>
        <!-- BEGIN CART -->
        <div class="top-cart-block">
            <?php echo $cartItem; ?>
            <i class="fa fa-shopping-cart"></i>
        </div>
        <!--END CART -->

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation">
            <ul>
                <?php echo $allCategoriesInView; ?>
                <li class="menu-search">
                    <span class="sep"></span>
                    <i class="fa fa-search search-btn"></i>

                    <div class="search-box">
                        <form action="{{ URL::action('Home\SearchController@search') }}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="input-group">
                                <input type="text" placeholder="Search" class="form-control" name="search">
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit">Search</button>
                    </span>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
        <!-- END NAVIGATION -->
    </div>
</div>
<!-- Header END -->


