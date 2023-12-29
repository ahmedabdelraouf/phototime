<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title p-3" style="border: 0;">
            <img src="{{url("resources/dashboard/images/logo.svg")}}" alt="PhotoTime فوتوتايم"
                 style="max-width: 200px"/>
        </div>

        <div class="clearfix"></div>

        <br/>

        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li class="@yield('home-active')">
                        <a href="{{route('admin.home')}}">
                            <i class="fa fa-home"></i> Dashboard</a>
                    </li>
                    <li class="@yield('categories-active')">
                        <a href="{{route('admin.categories.list')}}">
                            <i class="fa fa-cogs"></i> Categories</a>
                    </li>
                    <li class="@yield('albums-active')">
                        <a href="{{route('admin.albums.list')}}">
                            <i class="fa fa-files-o"></i> Albums</a>
                    </li>
                    <li class="@yield('banners-active')">
                        <a href="{{route('admin.sliders.list')}}">
                            <i class="fa fa-file-image-o"></i> Slider banners</a>
                    </li>
                    <li class="@yield('blog-active')">
                        <a href="{{route('admin.blog.list')}}">
                            <i class="fa fa-arrow-circle-down"></i> Blog</a>
                    </li>
                    <li class="@yield('socila-media')">
                        <a href="{{route('admin.socialMedia.list')}}">
                            <i class="fa fa-link"></i>Social media Links</a>
                    </li>
                    <li class="@yield('success-partners')">
                        <a href="{{route('admin.successPartners.list')}}">
                            <i class="fa fa-heart"></i>Success Partners</a>
                    </li>
                    <li class="@yield('settings')">
                        <a href="{{route('admin.settings.index')}}">
                            <i class="fa fa-cogs"></i>Settings</a>
                    </li>
                    <li class="@yield('menus-active')">
                        <a href="{{route('admin.menus.list')}}">
                            <i class="fa fa-bars"></i> Top Menus</a>
                    </li>
                    <li class="@yield('pages-active')">
                        <a href="{{route('admin.pages.list')}}">
                            <i class="fa fa-link"></i> Pages & Links data</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
