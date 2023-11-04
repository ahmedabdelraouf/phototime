<div class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <img id="main-logo" src="{{asset("resources/site/img/logo.png")}}" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="{{route("site.home")}}" class="nav-item nav-link @yield('home-active')">{{__("site.top_menu.home")}}</a>
                @foreach($menu_data as $one_menu)
                    @if(!empty($one_menu["child"]))
                        <div class="nav-item dropdown">
                            <a href="{{$one_menu["url"]}}" title="{{$one_menu["a_title"]}}" class="nav-link dropdown-toggle">{{$one_menu["title"]}}</a>
                            <div class="dropdown-menu m-0">
                                @foreach($one_menu["child"] as $child)
                                    <a href="{{$child["url"]}}" title="{{$child["a_title"]}}" class="dropdown-item">{{$child["title"]}}</a>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <a href="{{$one_menu["url"]}}" title="{{$one_menu["a_title"]}}" class="nav-item nav-link">{{$one_menu["title"]}}</a>
                    @endif
                @endforeach
            </div>
        </div>
    </nav>
    @yield("slider")
</div>