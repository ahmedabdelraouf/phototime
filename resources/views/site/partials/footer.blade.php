@section("footer")
    <section style="margin-top: 2rem; min-height: 30vh; display: flex; align-items: center;" id="footer" class="py-3">
        <div class="container">
            <div class="row mx-0 footer-2 text-center justify-content-center">
                <div class="col-md-4 col-sm-12 d-flex align-items-center justify-content-center order-lg-3" dir="rtl">
                    <img src="{{ asset('resources/site/images/logo.svg') }}" alt="" class="order-1">
                </div>

                @include("site.partials.social_contact")
            </div>
        </div>
    </section>
@show