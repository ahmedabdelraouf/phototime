@extends("site.layout.master")

@section("page-title")
    <div class="overlay"></div>
    <div class="content">
        <div class="head">
            <h1 class="pb-3">{{$category->title}}</h1>
            @if(!empty($category->meta_description))
                <p>{{$category->meta_description}}</p>
            @endif
        </div>
    </div>
@endsection

@push('browser_title')
    {{$category->meta_title}} ::
@endpush

@section("site-metas")
    <meta name="description" content="{{$category->meta_description}}"/>
    <meta name="keywords" content="{{$category->meta_keywords}}"/>
    <meta property="og:locale" content="ar_SA" />
    <meta property="og:type" content="about_us" />
    <meta property="og:title" content="{{$category->meta_title}}" />
    <meta property="og:description" content="{{$category->meta_description}}" />
    <meta property="article:published_time" content="{{$category->created_at}}" />
    <meta property="article:modified_time" content="{{$category->updated_at}}" />
@endsection

@section("body-id")
    id="blog"
@endsection
@section("body-class")
    class="text-right"
@endsection
@section("footer")
@endsection

@section("content")
    <div class="all-blogs mt-5">
        <div class="container">
            <div class="blog-content">
                {{$category->short_desc}}
            </div>
            <div class="row">
                @forelse($albums as $album)
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="blog" style="background-image: url('{{images_path($category->image)}}')">

                        </div>
                        <h3 class="blog-title">
                            فرحة الاطفال باليوم الوطني 93 في اشيقر
                        </h3>
                        <p class="blog-description">
                            هي ليست مجموعة تضم أمهر المصورين والممنتجين وأكثرهم إبداعاً فحسب! بل هي أكثر من ذلك .. في عام 2013م اسست على يد شابين سعوديين تربطهما علاقة الأخوة والموهبة والطموح وخلال خمس سنوات وحتى الآن كونوا فريقاً من 15 شاباً يجمعهم نفس الطموح والشغف.
                        </p>
                        <p class="show-more text-end">
                            <a href="{{route("site.view_any", $category->slugData->slug)}}">عرض المزيد</a>
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
    <style>
        #blog .home-main{
            min-height: 300px !important;
        }
    </style>
@endpush