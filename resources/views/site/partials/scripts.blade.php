<script src="{{asset("resources/site/scripts/jquery.min.js")}}"></script>
<script src="{{asset("resources/site/scripts/popper.min.js")}}"></script>
<script src="{{asset("resources/site/scripts/bootstrap.min.js")}}"></script>
<script src="{{asset("resources/site/scripts/slick.js")}}"></script>
<script src="{{asset("resources/site/scripts/index.js")}}"></script>
<script src="{{asset("resources/site/scripts/sweetalert/sweetalert.min.js")}}"></script>
@stack("scripts")
@include("site.partials.sweat_alert")
<script>
    const swiper = new Swiper('#craouselContainer', {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        coverflowEffect: {
            rotate: 0,
            stretch: 0,
            depth: 100,
            modifier: 3,
            slideShadows: true,
        },
        keyboard: {
            enabled: true,
        },
        mousewheel: {
            thresholdDelta: 70,
        },
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: true,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 1,
            },
            1024: {
                slidesPerView: 2,
            },
            1560: {
                slidesPerView: 3,
            },
        },
    });
</script>