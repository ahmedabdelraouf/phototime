<div id="slider-2" class="py-5 my-3">
    <div class="vid-slider-2">
        <div id="craouselContainer" class="swiper-container">
            <div class="swiper-wrapper" id="slideHolder">
                @foreach($youtubeLinks as $youtubeLink)
                    <div class="swiper-slide">
                        <div class="ImgHolder">
                            <iframe width="100%" height="315"
                                    src="{{$youtubeLink->url}}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                        </div>
                        <div class="ContentHolder">
                            <h3>{{$youtubeLink->title}}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <div class="text-center show-more">
        <button onclick="window.location.href='{{route("site.youtubechannel")}}'">عرض المزيد</button>
    </div>
</div>