<!doctype html>
<html lang="{{app()->getLocale()}}" class="no-focus">
    @include("admin.partials.head")

    <body>
        <div id="page-container" class="sidebar-mini sidebar-o sidebar-inverse enable-page-overlay side-scroll page-header-fixed main-content-boxed side-trans-enabled">
            @include("admin.partials.nav")
            @include("admin.partials.header")

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">
                    @yield('content')
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
            @include('admin.partials.footer')
        </div>
        <!-- END Page Container -->
        @include('admin.partials.scripts')
    </body>
</html>
