@section("footer")
    <section id="footer" class="py-3">
        <div class="container">
            <div class="row mx-0 footer-2 text-center">
                <div class="col-md-4 col-sm-12 d-flex align-items-center justify-content-center order-lg-3" dir="rtl">
                    <img src="{{asset("resources/site/images/logo.svg")}}" alt="" class="order-1">
                </div>
                <div class="col-md-4 col-sm-12  pt-3 text-right order-lg-2">
                    <h6 class="d-none d-md-block">للتواصل معانا</h6>
                    <div class="social py-3 text-center">
                        <div>
                            <a href=""><img src="{{asset("resources/site/images/youtube.svg")}}" class="img-fluid" alt=""></a>
                            <a href=""><img src="{{asset("resources/site/images/x.svg")}}" class="img-fluid" alt=""></a>
                            <a href=""><img src="{{asset("resources/site/images/whatsapp.svg")}}" class="img-fluid" alt=""></a>
                            <a href=""><img src="{{asset("resources/site/images/snapchat.svg")}}" class="img-fluid" alt=""></a>
                        </div>

                        <p class="d-none d-md-block text-center">جميع الحقوق محفوظة © {{date("Y")}}</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 order-lg-1">
                    <img src="{{asset("resources/site/css/slick.css")}}images/Screenshot 2023-11-02 at 4.31 1.png" class="img-fluid maps" alt="">
                </div>
            </div>
        </div>
    </section>
@show