<div class="col-lg-4 col-md-6 col-sm-6 col-6">
    <a style="width: 10%;height: 10%" href="{{route('site.youtubeChannelDetails',['id'=>$youtubeChannelLink->id])}}">
        <div class="lastwork-img">
            @if(isset($youtubeChannelLink->image))
                <img src="{{ images_path($youtubeChannelLink->image) }}" class="img-fluid"
                     style="width: 30rem;height: 12rem"
                     alt="{{$youtubeChannelLink->title}}">
            @else
                <img src="{{asset("resources/site/images/logo.svg")}}" class="img-fluid"
                     style="width: 30rem;height: 12rem"
                     alt="{{$youtubeChannelLink->title}}">
            @endif
        </div>
        <p class="align-center text-center"><strong
                    style="color: #0b2e13">{{$youtubeChannelLink->title}}</strong></p>
    </a>
</div>