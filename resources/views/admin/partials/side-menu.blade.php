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

                    <?php $user = \App\Models\Admin::where("id", ADMIN_ID)->first(); ?>
                    @if(SUPER_ADMIN || $user->hasRole('dashboard'))
                        <li class="@yield('home-active')">
                            <a href="{{route('admin.home')}}">
                                <i class="fa fa-home"></i>Dashboard</a>
                        </li>
                    @endif
                    @if(SUPER_ADMIN || $user->hasRole('categories'))
                        <li class="@yield('categories-active')">
                            <a href="{{route('admin.categories.list')}}">
                                <i class="fa fa-cogs"></i> Categories</a>
                        </li>
                    @endif
                    @if(SUPER_ADMIN || $user->hasRole('albums'))
                        <li class="@yield('albums-active')">
                            <a href="{{route('admin.albums.list')}}">
                                <i class="fa fa-files-o"></i> Albums</a>
                        </li>
                    @endif
                    @if(SUPER_ADMIN || $user->hasRole('youtube channels'))
                        <li class="@yield('youtubeChannel-active')">
                            <a href="{{route('admin.youtubeChannel.list')}}">
                                <i class="fa fa-files-o"></i> Youtube channel</a>
                        </li>
                    @endif
                    @if(SUPER_ADMIN || $user->hasRole('slide banners'))
                        <li class="@yield('banners-active')">
                            <a href="{{route('admin.sliders.list')}}">
                                <i class="fa fa-file-image-o"></i> Slider banners</a>
                        </li>
                    @endif
                    @if(SUPER_ADMIN || $user->hasRole('blog'))
                        <li class="@yield('blog-active')">
                            <a href="{{route('admin.blog.list')}}">
                                <i class="fa fa-arrow-circle-down"></i> Blog</a>
                        </li>
                    @endif
                    @if(SUPER_ADMIN || $user->hasRole('social media links'))
                        <li class="@yield('socila-media')">
                            <a href="{{route('admin.socialMedia.list')}}">
                                <i class="fa fa-link"></i>Social media Links</a>
                        </li>
                    @endif
                    @if(SUPER_ADMIN || $user->hasRole('success partners'))
                        <li class="@yield('success-partners')">
                            <a href="{{route('admin.successPartners.list')}}">
                                <i class="fa fa-heart"></i>Success Partners</a>
                        </li>
                    @endif
                    @if(SUPER_ADMIN || $user->hasRole('settings'))
                        <li class="@yield('settings')">
                            <a href="{{route('admin.settings.index')}}">
                                <i class="fa fa-cogs"></i>Settings</a>
                        </li>
                    @endif
                    @if(SUPER_ADMIN || $user->hasRole('top menus'))
                        <li class="@yield('menus-active')">
                            <a href="{{route('admin.menus.list')}}">
                                <i class="fa fa-bars"></i> Top Menus</a>
                        </li>
                    @endif
                    @if(SUPER_ADMIN || $user->hasRole('pages and links'))
                        <li class="@yield('pages-active')">
                            <a href="{{route('admin.pages.list')}}">
                                <i class="fa fa-link"></i> Pages & Links data</a>
                        </li>
                    @endif
                    @if(SUPER_ADMIN || $user->hasRole('roles'))
                        <li class="@yield('roles-active')">
                            <a href="{{route('admin.roles.list')}}">
                                <i class="fa fa-link"></i> Roles</a>
                        </li>
                    @endif
                    @if(SUPER_ADMIN || $user->hasRole('admins'))
                        <li class="@yield('admins-active')">
                            <a href="{{route('admin.admins.list')}}">
                                <i class="fa fa-link"></i> Admins</a>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </div>
</div>
