<div id="last-work">
    <div class="text-center">
        <h4 class="m-0 text-light pt-3">
            <img src="{{asset('resources/site/images/hash-left.svg')}}" alt="left hash"/>
            معرض التغطيات
            <img src="{{asset('resources/site/images/hash-right.svg')}}" alt="right hash"/>
        </h4>
        <img src="{{asset('resources/site/images/hash-bottom.svg')}}" alt="bottom hash"/>
    </div>
    <div class="container">
        <div class="row">
            @foreach($featuredAlbums as $album)
                @include("site.modules.album_item",['album'=>$album])
            @endforeach
        </div>
        <div class="text-center show-more">
            <button onclick="window.location.href='{{route("site.albums")}}'">عرض المزيد</button>
        </div>
    </div>
</div>
<br>
<style>
    #last-work .row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .album-item {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .lastwork-img img {
        width: 100%;
        height: auto;
        max-width: 30rem; /* Ensure it doesn't grow beyond 30rem on larger screens */
    }

    @media (max-width: 768px) {
        .album-item {
            flex: 1 1 100%;
            max-width: 100%;
        }
    }

    @media (min-width: 769px) {
        .album-item {
            flex: 1 1 48%; /* Two items per row on tablet */
        }
    }

    @media (min-width: 992px) {
        .album-item {
            flex: 1 1 31%; /* Three items per row on larger screens */
        }
    }

    @media (min-width: 1200px) {
        .album-item {
            flex: 1 1 23%; /* Four items per row on extra-large screens */
        }
    }

</style>