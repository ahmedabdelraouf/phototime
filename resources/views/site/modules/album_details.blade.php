@extends("site.layout.master")

@section("page-title")
    <div class="overlay"></div>
    <div class="content">
        <div class="head">
            <h3  class="pb-3">{{$album->title}}</h3>
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
    <div class="mt-1">
        <div class="container">
            <img
                    src="{{ images_path($album->default_image) }}"
                    alt="Image {{ $album->title }}"
                    class="img-fluid"
                    loading="lazy"
            />
            <br>
            <div class="row" style="align-content: center;margin-right: 1.5rem">
                <!-- First date container for photo date -->
                <span class="date-icon">📅</span>
                <span class="image-date">{{ $album->photo_date }}</span>

                <span style="margin-left: 3rem;margin-right: 1rem"></span>

                <!-- Second date container for images count -->
                <span class="count-icon">📷</span>
                <span class="image-count">{{ count($album->images) }}</span>
                <span style="margin-left: 3rem;margin-right: 1rem"></span>

                <!-- Third date container for views count -->
                <span class="views-icon">👁️</span>
                <span class="view-count">{{ $album->views_count }}</span>
            </div>
{{--            <h3 style="color: #0000FF;">{{$album->title}}</h3>--}}
            <br>
            <p style="color: #0b2e13;width: 70%">{!! $album->short_desc !!}</p>
        </div>

        <!-- album -->
        <div class="row" style="margin: 5rem;margin-top: -0.1rem;align-content: center" id="lightgallery">
            @foreach ($album->images as $index => $image)
                <a href="{{ images_path($image->image) }}" data-lg-size="1600-2400">
                    <img
                        src="{{ images_path($image->image) }}"
                        alt="Image {{ $album->title }}"
                        class="img-fluid"
                        loading="lazy"
                        style="width: 300px; height: 250px;margin: 0.2rem"
                    />
                </a>
            @endforeach
        </div>
    </div>
    <br>
    <br>
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