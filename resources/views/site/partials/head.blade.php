<head>
    <meta charset="utf-8">
    <title>@stack("browser_title"){{__("site.site_title")}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @yield("site-metas")
    <link rel="shortcut icon" href="{{asset("resources/site/img/fav.png")}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset("resources/site/img/fav.png")}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset("resources/site/img/fav.png")}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Jost:wght@500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{asset("resources/site/lib/animate/animate.min.css")}}" rel="stylesheet">
    <link href="{{asset("resources/site/lib/owlcarousel/assets/owl.carousel.min.css")}}" rel="stylesheet">
    <link href="{{asset("resources/site/lib/lightbox/css/lightbox.min.css")}}" rel="stylesheet">
    <link href="{{asset("resources/site/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset("resources/site/css/style.css")}}" rel="stylesheet">
    @if(strtolower(app()->getLocale()) == "ar")
        <link href="{{asset("resources/site/css/rtl.css")}}" rel="stylesheet">
    @endif
</head>