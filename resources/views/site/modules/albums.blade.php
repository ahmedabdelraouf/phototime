@extends("site.layout.master")

@section("page-title")
    <div class="overlay"></div>
    <div class="content">
        <div class="head">
            <h1 class="pb-3">{{!empty($page) ? $page->title : "أقسام الألبومات"}}</h1>
            @if(!empty($page) && !empty($page->short_desc))
                <p>{{$page->short_desc}}</p>
            @endif
        </div>
    </div>
@endsection

@push('browser_title')
    {{!empty($page) ? $page->meta_title : "أقسام الألبومات"}} ::
@endpush

@if(!empty($page))
    @section("site-metas")
        <meta name="description" content="{{$page->meta_description}}"/>
        <meta name="keywords" content="{{$page->meta_keywords}}"/>
        <meta property="og:locale" content="ar_SA"/>
        <meta property="og:type" content="about_us"/>
        <meta property="og:title" content="{{$page->meta_title}}"/>
        <meta property="og:description" content="{{$page->meta_description}}"/>
        <meta property="article:published_time" content="{{$page->created_at}}"/>
        <meta property="article:modified_time" content="{{$page->updated_at}}"/>
    @endsection
@endif

@section("body-id")
    id="blog"
@endsection
@section("body-class")
    class="text-right"
@endsection

@section("footer")
    @include("site.partials.footer")
@endsection

@section("content")
    <div class="all-blogs mt-5">
        <div class="container">
            <div class="row">
                @forelse($albums as $album)
                    @include("site.modules.album_item",['album'=>$album])
                @empty
                    <h3 style="width: 100%;color: red">تحت الانشاء</h3>
                @endforelse
            </div>
        </div>
    </div>
@endsection

@push("styles")
    <link rel="stylesheet" href="{{asset("resources/site/css/blog.css")}}">
    <style>
        #blog .home-main {
            min-height: 300px !important;
        }
    </style>
@endpush