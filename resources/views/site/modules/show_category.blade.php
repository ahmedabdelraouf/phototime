@extends("site.layout.master")

@section("page-title")
    <div class="overlay"></div>
    <div class="content">
        <div class="head">
            <h1 class="pb-3">{{$category->title}}</h1>
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

@section("site-metas")
    <meta name="description" content="{{$category->meta_description}}"/>
    <meta name="keywords" content="{{$category->meta_keywords}}"/>
    <meta property="og:locale" content="ar_SA"/>
    <meta property="og:type" content="about_us"/>
    <meta property="og:title" content="{{$category->meta_title}}"/>
    <meta property="og:description" content="{{$category->meta_description}}"/>
    <meta property="article:published_time" content="{{$category->created_at}}"/>
    <meta property="article:modified_time" content="{{$category->updated_at}}"/>
@endsection

@section("content")
    <div class="all-blogs mt-5">
        <div class="container">
            <img
                    src="{{ images_path($category->image) }}"
                    alt="Image {{ $category->title }}"
                    class="img-fluid"
                    loading="lazy"
                    style="height: 10rem;direction: ltr"
            />
            <div class="blog-content">
                {!! $category->short_desc !!}
{{--                {{$category->short_desc}}--}}
            </div>
            <div class="row">
                @if(isset($albums))

                    @forelse($albums as $album)
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="blog" style="background-image: url('{{images_path($category->image)}}')">

                            </div>
                            <h3 class="blog-title">
                                فرحة الاطفال باليوم الوطني 93 في اشيقر
                            </h3>
                            <p class="blog-description">
                                هي ليست مجموعة تضم أمهر المصورين والممنتجين وأكثرهم إبداعاً فحسب! بل هي أكثر من ذلك ..
                                في عام 2013م اسست على يد شابين سعوديين تربطهما علاقة الأخوة والموهبة والطموح وخلال خمس
                                سنوات وحتى الآن كونوا فريقاً من 15 شاباً يجمعهم نفس الطموح والشغف.
                            </p>
                            <p class="show-more text-end">
                                <a href="{{route("site.view_any", $category->slugData->slug)}}">عرض المزيد</a>
                            </p>
                        </div>
                    @empty
                        <h3 style="width: 100%;color: red">تحت الانشاء</h3>
                    @endforelse
                @endif
            </div>
        </div>
    </div>
@endsection

@push("styles")
    <link rel="stylesheet" href="{{asset("resources/site/css/blog.css")}}">
@endpush

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