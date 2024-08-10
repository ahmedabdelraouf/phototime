@extends("site.layout.master")

@section("page-title")
    <div class="overlay"></div>
    <div class="content">
        <div class="head">
            <h1 class="pb-3"> المدونة</h1>
        </div>
    </div>
@endsection

@section("body-id")
    id="contact_us"
@endsection
@section("body-class")
    class="text-right" dir="rtl"
@endsection


@section("content")
    <div class="mt-5">
        <div class="container">
            <div class="all-blogs mt-5">
                <div class="container">
                    <div class="row">
                        @forelse($blogs as $blog)
                            <div class="col-md-4 col-sm-6 col-12">
                                <a href="{{ route('site.blogDetails', $blog->id) }}">
                                    <img class="blog img-fluid" src="{{ images_path($blog->image) }}"
                                         alt="{{ $blog->title }}">
                                </a>
                                <h3 class="blog-title">{{ $blog->title }}</h3>
                                <p class="blog-description">{{ $blog->short_desc }}</p>
                                <p class="show-more text-end">
                                    <a href="{{ route('site.blogDetails', $blog->id) }}">عرض المزيد</a>
                                </p>
                            </div>
                        @empty
                            <h3 style="width: 100%;color: red">تحت الانشاء</h3>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push("styles")
    <link rel="stylesheet" href="{{asset("resources/site/css/contact-us.css")}}">
@endpush

@section("footer")
    @include("site.partials.footer")
@endsection
