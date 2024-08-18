<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                        <img src="{{url("resources/dashboard/images/user.png")}}" alt="">{{ADMIN_NAME}}
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
{{--                        <a class="dropdown-item" href=""> {{__("me::general.my_profile")}}</a>--}}
                        <a class="dropdown-item" href="{{route("admin.auth.logout")}}"><i class="fa fa-sign-out pull-right"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>
