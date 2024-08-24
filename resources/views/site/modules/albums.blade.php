@extends("site.layout.master")

@section("page-title")
    <div class="overlay"></div>
    <div class="content">
        <div class="head">
            {{--            <h1 class="pb-3"> أقسام الألبومات</h1>--}}
            @if(!empty(request()->get('is_public')) && request()->get('is_public') ==1)
                <h1 class="pb-3">تغطيات عامة</h1>
            @elseif(!empty(request()->get('album_title')) && str_contains(request()->get('album_title'),"حفل"))
                <h1 class="pb-3">ليلة العمر</h1>
            @else
                <h1 class="pb-3"> أقسام الألبومات</h1>
            @endif
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
            <div class="align-center">
                <form action="{{ route('site.albums') }}" method="GET" class="form-container"
                      style="direction: rtl; border: 1px solid #ccc; padding: 15px; border-radius: 5px; display: flex; flex-direction: column; align-items: center;">
                    <div class="form-row" style="display: flex; justify-content: center; width: 100%; gap: 15px;">
                        <div class="form-group" style="display: flex; flex-direction: column; align-items: center; width: 100%; max-width: 200px;">
                            <strong for="album_title">الأسم:</strong>
                            <input type="text" class="form-control" name="album_title" id="album_title"
                                   value="{{ request()->get('album_title') }}"
                                   style="border: 1px solid #ccc; border-radius: 5px; width: 100%;">
                        </div>

                        <div class="form-group" style="display: flex; flex-direction: column; align-items: center; width: 100%; max-width: 200px;">
                            <strong for="photo_date">التاريخ:</strong>
                            <input type="date" class="form-control" name="photo_date" id="photo_date"
                                   value="{{ request()->get('photo_date') }}"
                                   style="border: 1px solid #ccc; border-radius: 5px; width: 100%;">
                        </div>

                        <div class="form-group" style="display: flex; flex-direction: column; align-items: center; width: 100%; max-width: 200px;">
                            <button type="submit" class="btn btn-primary"
                                    style="border: 1px solid #ccc; border-radius: 5px; width: 100%; margin-top: 32px;">بحث
                            </button>
                        </div>
                    </div>
                </form>

                <br>
            </div>
            <div class="row" style="direction: rtl">
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
