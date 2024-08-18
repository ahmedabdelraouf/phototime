<div class="album-item col-lg-4 col-md-6 col-sm-6 col-12">
    <a href="{{route('site.albumDetails',['id'=>$album->id])}}">
        <div class="lastwork-img" style="border: 1rem">
            @if(isset($album->default_image))
                <img src="{{ images_path("albums/$album->id/$album->default_image") }}" class="img-fluid" alt="{{$album->title}}">
            @elseif(!empty($album->images) && count($album->images) > 0)
                <img src="{{ images_path($album->images[0]->image) }}" class="img-fluid" alt="{{$album->title}}">
            @else
                <img src="{{asset('resources/site/images/logo.svg')}}" class="img-fluid" alt="{{$album->title}}">
            @endif
        </div>
        <p class="align-center text-center" style="margin-top: 1rem"><strong style="color: #0b2e13">{{$album->title}}</strong></p>
    </a>
</div>
