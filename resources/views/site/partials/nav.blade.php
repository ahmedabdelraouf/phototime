<section class="home-main">
    <header class="mb-2">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-sm navbar-light" dir="rtl">
                <a class="navbar-brand" href="{{url("/")}}">
                    <img src="{{asset("resources/site/images/logo.svg")}}" alt="logo" width="150">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
                        aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route("site.home")}}">{{__("site.top_menu.home")}} @yield('home-active')</a>
                        </li>
                        @foreach($menu_data as $one_menu)
                            <li class="nav-item">
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
                            </li>
                        @endforeach
                    </ul>
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item" id="call-number">
                            <a href="tel:0543608171" class="call-number">
                                0543608171
                                <i class="fa fa-whatsapp"></i>
                            </a>
                        </li>
                        <li class="nav-item search-icon">
                            <a href="#search">

                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div id="search">
            <button type="button" class="close">×</button>
            <form>
                <input type="search" value="" placeholder="type keyword(s) here" />
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </header>
    @yield("page-title")
</section>
