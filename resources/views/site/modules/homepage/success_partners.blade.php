<section class="client-opi">
    <div class="content container">
        <div class="text-center">
            <h4 class="m-0 pt-3">
                <img class=" d-md-inline d-none" src="{{asset("resources/site/images/hash-left-dark.svg")}}"/>
                <strong style="color: goldenrod"> شركاء النجاح</strong> <img class=" d-md-inline d-none"
                                                                             src="{{asset("resources/site/images/hash-right-dark.svg")}}"/>
            </h4>
            <img class=" d-md-inline d-none" src="{{asset("resources/site/images/hash-bottom-dark.svg")}}"/>
        </div>
        <div class="d-md-block d-none">
            <div class="row my-3" style=" justify-content:space-evenly">
                @foreach($successPartners as $successPartner)
                    <div class="col-md-3">
                        <a href="{{$successPartner->url}}">
                            <img src="{{images_path($successPartner->image)}}" alt="logo" width="120" height="50">
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="text-center show-more">
                <button onclick="window.location.href='{{route("site.view_any",["slug"=>"success-partners"])}}'">عرض
                    المزيد
                </button>
            </div>

        </div>
    </div>
</section>
