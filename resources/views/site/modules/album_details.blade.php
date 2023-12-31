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
        <div class="row" style="margin: 5rem;margin-top: -0.1rem;align-content: center">
            @foreach ($album->images as $index => $image)
                    <img  src="{{ images_path($image->image) }}" alt="Image {{ $album->title }}" class="img-fluid"
                         style="width: 200px; height: 150px;margin: 0.2rem">
            @endforeach
        </div>

    </div>
    <br>
    <br>
    </div>

@endsection


@push("styles")
    <link rel="stylesheet" href="{{asset("resources/site/css/contact-us.css")}}">
@endpush