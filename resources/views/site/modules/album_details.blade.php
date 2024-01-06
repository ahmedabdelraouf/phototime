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
            <h3 style="color: #0000FF;">{{$album->title}}</h3>
            <br>
            <p style="color: #0b2e13;width: 70%">{!! $album->short_desc !!}</p>

            <div class="row">
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
                        style="width: 200px; height: 150px;margin: 0.2rem"
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lightgallery-bundle.min.css" integrity="sha512-nUqPe0+ak577sKSMThGcKJauRI7ENhKC2FQAOOmdyCYSrUh0GnwLsZNYqwilpMmplN+3nO3zso8CWUgu33BDag==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .lg-content .lg-inner .lg-item.lg-loaded.lg-current {
            position: relative !important;
        }
    </style>
@endpush

@push("scripts")
    <!-- lightgallery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/lightgallery.min.js" integrity="sha512-jEJ0OA9fwz5wUn6rVfGhAXiiCSGrjYCwtQRUwI/wRGEuWRZxrnxoeDoNc+Pnhx8qwKVHs2BRQrVR9RE6T4UHBg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/plugins/thumbnail/lg-thumbnail.umd.min.js" integrity="sha512-dc8xJSGs0ib9uo0fLT/v4wp2LG7+4OSzc+UpFiIKiv6QP/e4hZH/S8manUCTtO3tNVGzcje8uJjSdL+NH29blQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/plugins/zoom/lg-zoom.umd.min.js" integrity="sha512-OUF2jbRheQR5yXPCvXN71udWa5cvwPf+shcXM+5GrW1vtNurTn7az8LCP3hS50gm17ULXdh3cdkhiPa0Qqyczw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        lightGallery(document.getElementById('lightgallery'), {
            plugins: [lgZoom, lgThumbnail],
            //licenseKey: 'your_license_key',
            //speed: 500,
            // ... other settings
        });
    </script>
@endpush