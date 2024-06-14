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
            <div>
                <form action="{{ route('site.albums') }}" method="GET" class="row"
                      style="direction: rtl; border: 1px solid #ccc; padding: 15px; border-radius: 5px;">
                    <div class="col-md-3 form-group">
                        <strong for="album_title">الأسم:</strong>
                        <input type="text" class="form-control" name="album_title" id="album_title"
                               value="{{ request()->get('album_title') }}"
                               style="border: 1px solid #ccc; border-radius: 5px;">
                    </div>

                    <div class="col-md-3 form-group">
                        <strong for="photo_date">التاريخ:</strong>
                        <input type="date" class="form-control" name="photo_date" id="photo_date"
                               value="{{ request()->get('photo_date') }}"
                               style="border: 1px solid #ccc; border-radius: 5px;">
                    </div>

                    <div class="col-md-3 form-group">
                        <strong for="category_id">القسم/الخدمة</strong>
                        <select name="category_id" class="category_id form-control">
                            <option value="0">اختار قسم المناسبه</option>
                            @foreach($categories as $category)
                                <option value="{{$category['id']}}"
                                        @if(request()->get('category_id') == $category['id'] ) selected @endif
                                >{{$category['title']}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3 form-group">
                        <button type="submit" class="form-control btn btn-primary mt-4"
                                style="border: 1px solid #ccc; border-radius: 5px;">بحث
                        </button>
                    </div>
                </form>

                <br>
            </div>
            <div class="row">
                @forelse($albums as $album)
                    @include("site.modules.album_item",['album'=>$album])
                @empty
                    <h3 style="width: 100%;color: red">لا يوجد نتائج للبحث جرب البحث</h3>
                @endforelse
            </div>
            @include('admin.layout.pagination', ['paginator' => $albums])
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