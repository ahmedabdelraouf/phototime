@extends("site.layout.master")

@section("page-title")
    <div class="overlay"></div>
    <div class="content">
        <div class="head">
            <h3 class="pb-3">{{$YoutubeChannelUrl->title}}</h3>
        </div>
    </div>
@endsection

@section("body-id")
    id="contact_us"
@endsection
@section("body-class")
    class="text-right" dir="rtl"
@endsection

@section("footer")
    @include("site.partials.footer")
@endsection

@section("content")
    <br>
    <div class="mt-1">
        <div class="container">
            <div class="swiper-slide">
                <div class="ImgHolder">
                    <iframe width="100%" height="500rem"
                            src="{{$YoutubeChannelUrl->url}}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection

@push("styles")
    <link rel="stylesheet" href="{{asset("resources/site/css/contact-us.css")}}">
    <!-- lightgallery -->
    <link rel="stylesheet" href="{{asset("resources/site/css/lightgallery-bundle.min.css")}}">

    <style>
        .lg-content .lg-inner .lg-item.lg-loaded.lg-current {
            position: relative !important;
        }
    </style>
@endpush

@push("scripts")
    <!-- lightgallery -->
    <script src="{{asset("resources/site/scripts/lightgallery-new.min.js")}}"></script>
    <script src="{{asset("resources/site/scripts/lg-thumbnail.umd.min.js")}}"></script>
    <script src="{{asset("resources/site/scripts/lg-zoom.umd.min.js")}}"></script>
    <script type="text/javascript">
        lightGallery(document.getElementById('lightgallery'), {
            plugins: [lgZoom, lgThumbnail],
            //speed: 500,
            // ... other settings
        });
    </script>
@endpush