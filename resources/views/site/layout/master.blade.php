<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
@include("site.partials.head")


<body>
<div id="phone-icon-div"><a id="phone-icon-link" href="tel:01000757771"><i class="fas fa-phone" data-fa-transform="flip-h"></i></a></div>
<div class="container-xxl bg-white p-0">
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>


    @include("site.partials.nav")

    @yield("content")

@include("site.partials.footer")

    <a href="#" class="btn btn-lg btn-secondary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>
@include("site.partials.scripts")
</body>

</html>