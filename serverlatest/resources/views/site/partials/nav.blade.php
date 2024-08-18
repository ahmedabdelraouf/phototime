<section class="home-main">
    <header class="mb-2">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-sm navbar-light" dir="rtl">
                <a class="navbar-brand" href="{{url("/")}}">
                    <?php $whatsPhoneNumber = \App\Models\Setting::where("key", "whatsapp_phone")->first()->value ?>

                    <img src="{{asset("resources/site/images/logo.svg")}}" alt="logo" width="150">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
                        aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        @foreach($menu_data as $one_menu)
                            <li class="nav-item dropdown">
                                @if(!empty($one_menu["child"]))
                                    <a href="{{$one_menu["url"]}}" title="{{$one_menu["a_title"]}}"
                                       class="nav-link dropdown-toggle" data-toggle="dropdown">
                                        {{$one_menu["title"]}}
                                    </a>
                                    <div class="dropdown-menu">
                                        @foreach($one_menu["child"] as $child)
                                            @if(isset($child['image']))
{{--                                                <img src="{{ images_path($child['image']) }}" class="img-fluid"/>--}}
                                            @endif
                                            <a style="font-weight: bold" href="{{$child["url"]}}" title="{{$child["a_title"]}}"
                                               class="dropdown-item">{{$child["title"]}}</a>
                                        @endforeach
                                    </div>
                                @else
                                    <a href="{{$one_menu["url"]}}" title="{{$one_menu["a_title"]}}"
                                       class="nav-link">{{$one_menu["title"]}}</a>
                                @endif
                            </li>
                        @endforeach
                    </ul>

                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item" id="call-number">
                            <?php $whatsPhoneNumber = \App\Models\Setting::where("key", "whatsapp_phone")->first()->value ?>
                            <a href="tel:{{$whatsPhoneNumber}}" class="call-number">
                                {{$whatsPhoneNumber}}
                                <i class="fa fa-whatsapp"></i>
                            </a>
                        </li>
                        <li class="nav-item search-icon">
                            {{--                            <a href="#search">--}}
                            {{--                                <i class="fa fa-search"></i>--}}
                            {{--                            </a>--}}
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div id="search">
            <button type="button" class="close">×</button>
            {{--            <form>--}}
            {{--                <input type="search" value="" placeholder="type keyword(s) here"/>--}}
            {{--                <button type="submit" class="btn btn-primary">Search</button>--}}
            {{--            </form>--}}
        </div>
    </header>
    @yield("page-title")
</section>

<style>
    .navbar-nav .dropdown:hover > .dropdown-menu {
        display: block;
    }

    .navbar-nav .dropdown-menu {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1000;
        float: left;
        min-width: 10rem;
        padding: 0.5rem 0;
        margin: 0;
        font-size: 1rem;
        color: #212529;
        text-align: left;
        list-style: none;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid rgba(0, 0, 0, 0.15);
        border-radius: 0.25rem;
    }

</style>