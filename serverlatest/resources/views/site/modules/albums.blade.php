@extends("site.layout.master")

@section("page-title")
    <div class="overlay"></div>
    <div class="content">
        <div class="head">
            <h1 class="pb-3"> أقسام الألبومات</h1>
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
    <link rel="stylesheet" href="{{asset("resources/site/css/contact-us.css")}}">
@endpush

@section("footer")
    @include("site.partials.footer")
@endsection
