<div class="col-lg-4 col-md-6 col-sm-6 col-6">
    <a style="width: 10%;height: 10%" href="{{route('site.albumDetails',['id'=>$album->id])}}">
        <div class="lastwork-img">
            @if(!empty($album->defaultImage)&&count($album->defaultImage)>0)
                <img src="{{ images_path($album->defaultImage[0]->image) }}" class="img-fluid"
                     style="width: 30rem;height: 12rem"
                     alt="{{$album->title}}">
            @elseif(!empty($album->images)&&count($album->images)>0)
                <img src="{{ images_path($album->images[0]->image) }}" class="img-fluid"
                     style="width: 30rem;height: 12rem"
                     alt="{{$album->title}}">
            @else
                <img src="{{asset("resources/site/images/logo.svg")}}" class="img-fluid"
                     style="width: 30rem;height: 12rem"
                     alt="{{$album->title}}">
            @endif
        </div>
        <p class="align-center text-center"><strong
                    style="color: #0b2e13">{{$album->title}}</strong></p>
    </a>
</div>