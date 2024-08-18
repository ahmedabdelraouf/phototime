@extends("site.layout.master")
@section("home-active")
    <span class="sr-only">(current)</span>
@endsection
@section("content")
    @include("site.modules.homepage.sliders")
    @include("site.modules.homepage.about_us")
    @include("site.modules.homepage.services")
    @include("site.modules.homepage.latest_work")
    @include("site.modules.homepage.youtube_links")
    @include("site.modules.homepage.success_partners")

@endsection

@push("styles")
    <link rel="stylesheet" href="{{asset("resources/site/css/index.css")}}">
@endpush