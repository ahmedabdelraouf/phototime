<section class="client-opi">
    <div class="content container">
        <div class="text-center">
            <h4 class="m-0 pt-3">
                <img class="d-inline" src="{{asset('resources/site/images/hash-left-dark.svg')}}" />
                <strong style="color: goldenrod"> شركاء النجاح</strong>
                <img class="d-inline" src="{{asset('resources/site/images/hash-right-dark.svg')}}" />
            </h4>
            <img class="d-inline" src="{{asset('resources/site/images/hash-bottom-dark.svg')}}" />
        </div>

        <div class="d-block text-center">
            <div class="row my-1 justify-content-center row-desktop"> <!-- Apply row-desktop here -->
                @foreach($successPartners as $successPartner)
                    <div class="text-center show-more">
                        <a href="{{$successPartner->url}}" class="d-flex justify-content-center align-items-center w-100 h-100">
                            <img src="{{images_path($successPartner->image)}}"
                                 class="d-flex justify-content-center align-items-center w-100 h-100"
                                 alt="logo" style="max-width: 15rem; height: 15rem;">
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="text-center show-more">
                <button onclick="window.location.href='{{route("site.view_any",["slug"=>"success-partners"])}}'">عرض المزيد</button>
            </div>
        </div>
    </div>
</section>
