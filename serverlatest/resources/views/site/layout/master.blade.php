<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
@include("site.partials.head")
<body @yield('body-id') @yield('body-class')>
@include("site.partials.nav")

    @yield("content")

@include("site.partials.footer")
@include("site.partials.scripts")
</body>
</html>