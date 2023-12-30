@extends("site.layout.master")
@section("home-active")
    <span class="sr-only">(current)</span>
@endsection
@section("content")
    <div id="main-page" class="text-right">
        <section class="top-bar my-2">
            <div id="magicCarousel" class="carousel slide my-2" data-ride="carousel">

                <ol class="carousel-indicators">
                    @foreach($sliders as $index => $slider)
                        <li data-target="#magicCarousel" data-slide-to="{{$index}}"
                            @if($index == 0) class="active" @endif></li>
                    @endforeach
                </ol>
                <div class="carousel-inner" role="listbox">
                    @foreach($sliders as $index => $slider)
                        <div data-interval="10000"
                             class="carousel-item {{$index == 0 ? " active" : ""}}">
                            <div class="row">
                                <div class="col-md-6 col-sm-7 col-12">
                                    <img src="{{images_path($slider->image)}}" class="img-fluid" style="height: 425px"/>
                                </div>
                                <div class="col-md-6 col-sm-7 col-12 order-lg-1">
                                    <div class="caption" dir="rtl">
                                        <h3>{{$slider->title}}</h3>
                                        <p>{{$slider->description}}</p>
                                        @if(!empty($slider->url))
                                            <a href="{{$slider->url}}">{{$slider->btn_title}}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <div id="group" class=" w-90 ml-auto my-5" dir="rtl">
            <div class="text-center">
                <h2 class="m-0 text-light pt-3">
                    <img class="" src="{{asset("resources/site/images/hash-right.svg")}}"/> من نحن <img class=""
                                                                                                        src="{{asset("resources/site/images/hash-left.svg")}}"/>
                </h2>
                <img class="" src="{{asset("resources/site/images/hash-bottom.svg")}}"/>
            </div>
            <img src="{{images_path($settings->site_bout_us_image) }}" class="group" alt="">
            <div class="row mx-0" dir="rtl">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="content px-lg-5">
                        <h3>{{$settings->site_about_us_title_ar}}</h3>
                        <p style="width: 90%">{{$settings->site_about_us_desc_ar}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="services" class=" my-5">
            <div class="row mx-0 px-lg-5 justify-content-evenly">
                <div class="col-md-1">
                </div>
                <div class="col-md-5 col-sm-12 order-lg-2  order-md-2">
                    <div class="head">
                        <h2 class="head-title">{{$settings->site_services_title_ar}}</h2>
                        <p class="head-des">{{$settings->site_services_desc_ar}}</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="row all-card">
                        @foreach($groupedCategories as $categories)
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                @foreach($categories as $index => $category)
                                    <div class="card">
                                        @if(empty($category['is_more']))
                                            <img src="{{ images_path($category['image']) }}" class="img-fluid"/>
                                        @else
                                            <a style="padding-top: 10px" href="{{route("site.categories")}}">
                                                <img src="{{asset("resources/site/images/moresvg.svg")}}"
                                                     class="img-fluid"/>
                                            </a>
                                        @endif
                                        <p>{{ $category['title']}}</p>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div id="last-work">
            <div class="text-center">
                <h4 class="m-0 text-light pt-3"><img class="" src="{{asset("resources/site/images/hash-left.svg")}}"/>
                    معرض التغطيات <img class="" src="{{asset("resources/site/images/hash-right.svg")}}"/></h4>
                <img class="" src="{{asset("resources/site/images/hash-bottom.svg")}}"/>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                        <div class="lastwork-img">
                            <img src="{{asset("resources/site/images/unsplash_MTZTGvDsHFY.png")}}" class="img-fluid"
                                 alt="">
                            <p>qwertyuiop</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                        <div class="lastwork-img">
                            <img src="{{asset("resources/site/images/unsplash_MTZTGvDsHFY.png")}}" class="img-fluid"
                                 alt="">
                            <p>qwertyuiop</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                        <div class="lastwork-img">
                            <img src="{{asset("resources/site/images/unsplash_MTZTGvDsHFY.png")}}" class="img-fluid"
                                 alt="">
                            <p>qwertyuiop</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                        <div class="lastwork-img">
                            <img src="{{asset("resources/site/images/unsplash_MTZTGvDsHFY.png")}}" class="img-fluid"
                                 alt="">
                            <p>qwertyuiop</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                        <div class="lastwork-img">
                            <img src="{{asset("resources/site/images/unsplash_MTZTGvDsHFY.png")}}" class="img-fluid"
                                 alt="">
                            <p>qwertyuiop</p>
                        </div>
                    </div>
                </div>
                <div class="text-center show-more">
                    <button onclick="window.location.href='{{route("site.about")}}'">عرض المزيد</button>
                </div>
            </div>
        </div>
        <div id="slider-2" class="py-5 my-3">
            <div class="vid-slider-2">
                <div id="craouselContainer" class="swiper-container">
                    <div class="swiper-wrapper" id="slideHolder">
                        <div class="swiper-slide">
                            <div class="ImgHolder">
                                <iframe width="100%" height="315"
                                        src="https://www.youtube.com/embed/mTCOyzyJdag?si=3v_jCSQj44FsQtJ1"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>
                            </div>
                            <div class="ContentHolder">
                                <h3>Simonette Lindermann</h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ImgHolder">
                                <iframe width="100%" height="315"
                                        src="https://www.youtube-nocookie.com/embed/Zf3BvhjWTKg?si=0dSCcci8jEYPt6Dl"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>
                            </div>
                            <div class="ContentHolder">
                                <h3>Simonette Lindermann 2</h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ImgHolder">
                                <iframe width="100%" height="315"
                                        src="https://www.youtube-nocookie.com/embed/Zf3BvhjWTKg?si=0dSCcci8jEYPt6Dl"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>
                            </div>
                            <div class="ContentHolder">
                                <h3>Simonette Lindermann 2</h3>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="text-center show-more">
                <button>عرض المزيد</button>
            </div>
        </div>
    </div>
    <section class="client-opi">
        <div class="content container">
            <div class="text-center">
                <h4 class="m-0 pt-3">
                    <img class=" d-md-inline d-none" src="{{asset("resources/site/images/hash-left-dark.svg")}}"/>
                    <strong style="color: goldenrod"> شركاء النجاح</strong> <img class=" d-md-inline d-none"
                                                                                 src="{{asset("resources/site/images/hash-right-dark.svg")}}"/>
                </h4>
                <img class=" d-md-inline d-none" src="{{asset("resources/site/images/hash-bottom-dark.svg")}}"/>
            </div>
            <div class="d-md-block d-none">

                <div class="row my-3" style=" justify-content:space-evenly">
                    <div class="col-md-3">
                        <img src="{{asset("resources/site/images/uber-eats.svg")}}" alt="logo" width="120" height="50">
                    </div>
                    <div class="col-md-3">
                        <img src="{{asset("resources/site/images/google.svg")}}" alt="logo" width="120" height="50">
                    </div>
                    <div class="col-md-3">
                        <img src="{{asset("resources/site/images/amazon.svg")}}" alt="logo" width="120" height="50">
                    </div>

                    <div class="col-md-3">
                        <img src="{{asset("resources/site/images/airbnb.svg")}}" alt="logo" width="120" height="50">
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@push("styles")
    <link rel="stylesheet" href="{{asset("resources/site/css/index.css")}}">
@endpush