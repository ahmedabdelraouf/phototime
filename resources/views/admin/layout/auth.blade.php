<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
@include("admin.partials.head")

<body class="login">
<div>
    <div class="login_wrapper">
        <div class="animate form">
            @yield("content")
        </div>
    </div>
</div>
@include("admin.partials.scripts")
</body>
</html>
