<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="nav-close"><i class="fa fa-times-circle"></i>
    </div>
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span><img alt="image" class="img-circle" src="/assets/backend/images/profile_small.jpg"/></span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                               <span class="block m-t-xs"><strong class="font-bold">Beaut-zihan</strong></span>
                                <span class="text-muted text-xs block">超级管理员<b class="caret"></b></span>
                                </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{ URL::action('Auth\AuthController@getLogout') }}">安全退出</a>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">SAME
                </div>
            </li>

            {!! $mainPresenter->renderSidebar($menus,$route) !!}

        </ul>
    </div>
</nav>
