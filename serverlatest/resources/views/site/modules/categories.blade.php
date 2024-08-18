@extends("site.layout.master")

@section("page-title")
    <div class="overlay"></div>
    <div class="content">
        <div class="head">
            <h1 class="pb-3">{{!empty($page) ? $page->title : "أقسام الخدمات"}}</h1>
            @if(!empty($page) && !empty($page->short_desc))
                <p>{{$page->short_desc}}</p>
            @endif
        </div>
    </div>
@endsection

@push('browser_title')
    {{!empty($page) ? $page->meta_title : "أقسام الخدمات"}} ::
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
                @forelse($categories as $category)
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="blog" style="background-image: url('{{images_path($category->image)}}')">
                        </div>
                        <div style="text-align: center">
                            <h3 class="blog-title">{{$category->title}}</h3>
                            <p class="blog-description">{{$category->meta_description}}</p>
                        </div>
                        <p class="show-more text-end">
                            {{--                            <a href="{{route("site.view_any", $category->slugData->slug)}}">عرض المزيد</a>--}}
                        </p>
                    </div>
                @empty
                    <h3 style="width: 100%;color: red">تحت الانشاء</h3>
                @endforelse
            </div>
        </div>
    </div>
@endsection

@push("styles")
    <link rel="stylesheet" href="{{asset("resources/site/css/blog.css")}}">

@endpush