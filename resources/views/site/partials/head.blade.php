<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@stack("browser_title"){{__("site.site_title")}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @yield("site-metas")
    <link rel="shortcut icon" href="{{asset("resources/site/img/fav.png")}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset("resources/site/img/fav.png")}}">
    @include("site.partials.styles")
</head>