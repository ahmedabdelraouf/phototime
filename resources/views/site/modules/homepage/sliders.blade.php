
<section class="top-bar my-2">
    <div id="customCarousel" class="custom-carousel">
        <div class="custom-carousel-indicators">
            @foreach($sliders as $index => $slider)
                <span data-slide-to="{{$index}}" class="{{ $index == 0 ? 'active' : '' }}"></span>
            @endforeach
        </div>
        <div class="custom-carousel-inner">
            @foreach($sliders as $index => $slider)
                <div class="custom-carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <img src="{{ images_path($slider->image) }}" alt="Slide {{ $index + 1 }}">
                </div>
            @endforeach
        </div>
        <button class="custom-carousel-control-prev" onclick="prevSlide()">&#10094;</button>
        <button class="custom-carousel-control-next" onclick="nextSlide()">&#10095;</button>
    </div>
</section>
<script>
    let currentSlide = 0;

    function showSlide(index) {
        const slides = document.querySelectorAll('.custom-carousel-item');
        const indicators = document.querySelectorAll('.custom-carousel-indicators span');
        if (index >= slides.length) currentSlide = 0;
        if (index < 0) currentSlide = slides.length - 1;
        slides.forEach((slide, i) => {
            slide.style.transform = `translateX(-${currentSlide * 100}%)`;
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
        height: auto;
        display: block;
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