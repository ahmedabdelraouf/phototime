@extends("site.layout.master")

@section("page-title")
    <div class="overlay"></div>
    <div class="content">
        <div class="head">
            <div class="row" style="display: block; align-items: center;">
                <h1 class="pb-3" style="margin-right: 1rem">{{$category->title}}</h1>
            </div>
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

@section("site-metas")
    <meta name="description" content="{{$category->meta_description}}"/>
    <meta name="keywords" content="{{$category->meta_keywords}}"/>
    <meta property="og:locale" content="ar_SA"/>
    <meta property="og:type" content="about_us"/>
    <meta property="og:title" content="{{$category->meta_title}}"/>
    <meta property="og:description" content="{{$category->meta_description}}"/>
    <meta property="article:published_time" content="{{$category->created_at}}"/>
    <meta property="article:modified_time" content="{{$category->updated_at}}"/>
@endsection

@section("content")
    <div class="all-blogs mt-5">
        <div class="container">
            <style>
                .blog-content {
                    margin-top: 1rem;
                    max-width: 100%;
                    word-wrap: break-word;
                }

                .blog-content img {
                    max-width: 100%;
                    height: auto;
                }
            </style>
            @if(count($category->images) > 0)
                <div id="customCarousel" class="custom-carousel">
                    <div class="custom-carousel-indicators">
                        @foreach($category->images as $index => $sliderImage)
                            <span data-slide-to="{{$index}}" class="{{ $index == 0 ? 'active' : '' }}"></span>
                        @endforeach
                    </div>
                    <div class="custom-carousel-inner">
                        @foreach($category->images as $index => $sliderImage)
                            <div class="custom-carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ asset($sliderImage->image) }}"
                                     alt="Image {{ $category->title }} - {{ $index + 1 }}"
                                     onload="this.style.display='block'"
                                     onerror="this.style.display='none'"/>
                            </div>
                        @endforeach
                    </div>
                    <button class="custom-carousel-control-next" onclick="prevSlide()">&#10094;</button>
                    <button class="custom-carousel-control-prev" onclick="nextSlide()">&#10095;</button>
                </div>
            @endif

            <div class="blog-content">
                {!! $category->short_desc !!}
            </div>
            <div class="row">
                @if(isset($albums))
                    @forelse($albums as $album)
                        @include("site.modules.album_item", ['album' => $album])
                    @empty
                        <h3 style="width: 100%; color: red">تحت الانشاء</h3>
                    @endforelse
                @endif
            </div>
        </div>
    </div>
@endsection

@push("styles")
    <link rel="stylesheet" href="{{asset("resources/site/css/blog.css")}}">
@endpush

@push("styles")
    <link rel="stylesheet" href="{{asset("resources/site/css/contact-us.css")}}">

    <!-- lightgallery -->
    <link rel="stylesheet" href="{{asset("resources/site/css/lightgallery-bundle.min.css")}}">

    <style>
        .lg-content .lg-inner .lg-item.lg-loaded.lg-current {
            position: relative !important;
        }
    </style>
@endpush

@push("scripts")
    <!-- lightgallery -->
    <script src="{{asset("resources/site/scripts/lightgallery-new.min.js")}}"></script>
    <script src="{{asset("resources/site/scripts/lg-thumbnail.umd.min.js")}}"></script>
    <script src="{{asset("resources/site/scripts/lg-zoom.umd.min.js")}}"></script>
    <script type="text/javascript">
        lightGallery(document.getElementById('lightgallery'), {
            plugins: [lgZoom, lgThumbnail],
            // other settings
        });
    </script>

    <script>
        let currentSlide = 0;

        function showSlide(index) {
            const slides = document.querySelectorAll('.custom-carousel-item');
            const indicators = document.querySelectorAll('.custom-carousel-indicators span');

            if (index >= slides.length) currentSlide = 0;
            if (index < 0) currentSlide = slides.length - 1;

            slides.forEach((slide, i) => {
                const img = slide.querySelector('img');
                if (img.complete && img.naturalHeight !== 0) {
                    slide.style.display = i === currentSlide ? 'block' : 'none';
                } else {
                    img.onload = () => {
                        slide.style.display = i === currentSlide ? 'block' : 'none';
                    };
                }
                indicators[i].classList.toggle('active', i === currentSlide);
            });
        }

        function nextSlide() {
            currentSlide++;
            showSlide(currentSlide);
        }

        function prevSlide() {
            currentSlide--;
            showSlide(currentSlide);
        }

        document.querySelectorAll('.custom-carousel-indicators span').forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                currentSlide = index;
                showSlide(currentSlide);
            });
        });

        setInterval(nextSlide, 10000); // Auto slide every 10 seconds
    </script>
@endpush

<style>
    .custom-carousel {
        position: relative;
        max-width: 100%;
        overflow: hidden;
        background-color: white;
    }

    .custom-carousel-inner {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }

    .custom-carousel-item {
        min-width: 100%;
        box-sizing: border-box;
    }

    .custom-carousel-item img {
        width: 100%;
        height: 15rem; /* Adjust this value as needed */
        display: none; /* Images will be shown after being fully loaded */
        object-fit: cover;
        background-color: white;
    }

    .custom-carousel-control-prev,
    .custom-carousel-control-next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
    }

    .custom-carousel-control-prev {
        left: 10px;
    }

    .custom-carousel-control-next {
        right: 10px;
    }

    .custom-carousel-indicators {
        text-align: center;
        position: absolute;
        bottom: 10px;
        width: 100%;
    }

    .custom-carousel-indicators span {
        display: inline-block;
        width: 10px;
        height: 10px;
        margin: 0 5px;
        background-color: rgba(255, 255, 255, 0.5);
        border-radius: 50%;
        cursor: pointer;
    }

    .custom-carousel-indicators .active {
        background-color: white;
    }
</style>
