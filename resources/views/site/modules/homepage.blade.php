@extends("site.layout.master")

@section("home-active")
    active
@endsection

@section("slider")
    <div class="container-xxl bg-primary hero-header">
        <div class="container px-lg-5">
            <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner" style="height: 500px">
                    @foreach($sliders as $index => $slider)
                        <div class="carousel-item{{$index == 0 ? " active" : ""}}">
                            <div class="row g-5 align-items-end">
                                <div class="col-lg-6 text-center text-lg-start">
                                    <img class="img-fluid animated zoomIn" src="{{images_path($slider->image)}}" alt="">
                                </div>
                                <div class="col-lg-6 text-center text-lg-end arabic-direction">
                                    <h1 class="text-white mb-4 animated slideInDown">{{$slider->title}}</h1>
                                    <p class="text-white pb-3 animated slideInDown">{{$slider->description}}</p>
                                    @if(!empty($slider->url))
                                        <a href="{{$slider->url}}" class="btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">إقرأ المزيد</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                        data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                        data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

@endsection

@section("content")
    <div class="container-xxl pb-5" style="margin-top: -4rem">
        <div class="container py-5 px-lg-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <img class="img-fluid wow zoomIn" data-wow-delay="0.5s" src="{{asset("resources/site/img/about.png")}}" alt="{{__("site.about_us")}}">
                </div>
                <div class="arabic-direction col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="section-title text-secondary">{{__("site.about_us")}}<span></span></p>
                    <h1 class="mb-5">{{__("site.about_us_home_title")}}</h1>
                    <p class="mb-4">{!! __("site.about_us_home_desc") !!}</p>
                    <a href="{{route("site.about")}}" class="btn btn-primary py-sm-3 px-sm-5 rounded-pill mt-3">المزيد</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl pb-5">
        <div class="container py-5 px-lg-5">
            <div class="row g-4">
                @foreach($services as $service)
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="feature-item bg-light rounded text-center p-4">
                            <a href="{{route("site.view_posts", ["id" => $service->id, "slug" => $service->slugData->slug])}}">
                                <img class="img-fluid text-primary mb-4" style="max-height: 200px" src="{{!empty($service->image) ? images_path($service->image) : asset("resources/site/img/about.png")}}" alt="{{$service->title_lang}}"></a>
                            <h5 class="mb-3" style="height: 75px">
                                <a href="{{route("site.view_posts", ["id" => $service->id, "slug" => $service->slugData->slug])}}">{{$service->title_lang}}</a></h5>
                            <p class="m-0">{{\Illuminate\Support\Str::limit($service->short_desc_lang, 200)}}</p>
                            <a href="{{route("site.view_posts", ["id" => $service->id, "slug" => $service->slugData->slug])}}" class="btn btn-primary py-sm-2 px-sm-3 rounded-pill mt-3">المزيد</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection