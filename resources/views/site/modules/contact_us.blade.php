@extends("site.layout.master")

@section("page-title")
    <div class="overlay"></div>
    <div class="content">
        <div class="head">
            <h1 class="pb-3"> تواصل معنا</h1>
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

@section("content")
    <div class="mt-5">
        <div class="container">
            <form style="margin: 50px" class="form" action="{{route("site.contactUsPost")}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label for="user_full_name">الاسم بالكامل</label>
                        <input id="user_full_name" name="user_full_name" type="text" class="form-control"
                               placeholder=" " required>
                    </div>
                    <div class="col-md-4">
                        <label for="user_email">البريد الالكتروني</label>
                        <input id="user_email" name="user_email" type="email" class="form-control" placeholder=" "
                               required>
                    </div>
                    <div class="col-md-4">
                        <label for="user_phone_number">رقم الجوال</label>
                        <input id="user_phone_number" name="user_phone_number" type="text" class="form-control"
                               placeholder=" " required>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="subject">الموضوع</label>
                            <input id="subject" name="subject" type="text" class="form-control" placeholder="" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="message">الرساله</label>
                        <textarea id="message" name="message" rows="3" class="form-control" placeholder=""
                                  required></textarea>
                    </div>
                    <div class="col-12 text-center pt-4">
                        <button type="submit" class="btn btn-primary">ارسال</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


@push("styles")
    <link rel="stylesheet" href="{{asset("resources/site/css/contact-us.css")}}">
@endpush