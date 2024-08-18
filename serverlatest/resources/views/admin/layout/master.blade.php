<!doctype html>
<html lang="{{app()->getLocale()}}">
    @include("admin.partials.head")

    <body class="nav-md">
    <div class="container body">
        <div class="main_container">
            @include("admin.partials.side-menu")
            @include("admin.partials.nav")

            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>@yield("page-title")</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    @yield("content")
                </div>
            </div>
            @include("admin.partials.footer")
        </div>
    </div>

    @include("admin.partials.scripts")

    </body>
</html>

