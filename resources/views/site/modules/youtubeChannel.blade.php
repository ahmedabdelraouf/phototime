@extends("site.layout.master")

@section("page-title")
    <div class="overlay"></div>
    <div class="content">
        <div class="head">
            <h1 class="pb-3">{{!empty($page) ? $page->title : "قناة اليوتيوب"}}</h1>
            @if(!empty($page) && !empty($page->short_desc))
                <p>{{$page->short_desc}}</p>
            @endif
        </div>
    </div>
@endsection

@push('browser_title')
    {{!empty($page) ? $page->meta_title : "قناة اليوتيوب"}} ::
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
            <?php $youtubeChannleLink = \App\Models\SocialMediaLink::where('is_active', 1)
                ->where("title","Youtube")->first()->url; ?>
            <a href="{{$youtubeChannleLink}}" class="youtube-button" target="_blank">
                <span class="youtube-logo"></span>
                الإنتقال إلى قناة اليوتيوب للمزيد من الفيديوهات
            </a>
            <br>
            <br>
            <div class="row">
                @forelse($youtubeChannelLinks as $youtubeChannelLink)
                    @include("site.modules.youtube_item",['youtubeChannelLink'=>$youtubeChannelLink])
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

        .youtube-button {
            display: inline-flex;
            align-items: center;
            padding: 10px 20px;
            background-color: #ff0000; /* Red YouTube color */
            color: #ffffff; /* White text */
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
        }

        .youtube-button:hover {
            background-color: #cc0000; /* Darker red on hover */
        }

        .youtube-logo {
            display: inline-block;
            width: 24px;
            height: 24px;
            background: url('https://upload.wikimedia.org/wikipedia/commons/4/42/YouTube_icon_%282013-2017%29.png') no-repeat center center;
            background-size: contain;
            margin-right: 10px;
        }
    </style>
@endpush