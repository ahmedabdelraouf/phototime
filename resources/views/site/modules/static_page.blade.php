@extends("site.layout.master")

@section("page-title")
    <div class="overlay"></div>
    <div class="content">
        <div class="head">
            <h1 class="pb-3">{{$page->title}}</h1>
        </div>
    </div>
@endsection

@push('browser_title')
    {{$page->meta_title}} ::
@endpush

@section("site-metas")
    <meta name="description" content="{{$page->meta_description}}"/>
    <meta name="keywords" content="{{$page->meta_keywords}}"/>
    <meta property="og:locale" content="ar_SA" />
    <meta property="og:type" content="about_us" />
    <meta property="og:title" content="{{$page->meta_title}}" />
    <meta property="og:description" content="{{$page->meta_description}}" />
    <meta property="article:published_time" content="{{$page->created_at}}" />
    <meta property="article:modified_time" content="{{$page->updated_at}}" />
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
    <div class="mt-5">
        <div class="container">
            {!! $page->content !!}
        </div>
    </div>
@endsection

@push("styles")
    <link rel="stylesheet" href="{{asset("resources/site/css/contact-us.css")}}">
@endpush