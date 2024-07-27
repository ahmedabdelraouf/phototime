@section("footer")
    <section  style="margin-top: 2rem" id="footer" class="py-3">
        <div class="container">
            <div class="row mx-0 footer-2 text-center">
                <!-- Google Maps Column -->
                <div class="col-md-4 col-sm-12 order-lg-1">
                    <style>
                        .custom-map-container {
                            position: relative;
                            overflow: hidden;
                            padding-top: 56.25%; /* 16:9 aspect ratio (adjust as needed) */
                        }

                        .custom-map-iframe {
                            position: absolute;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            border: 0; /* Remove iframe border */
                        }
                    </style>

                    <div class="custom-map-container">
                        <iframe class="custom-map-iframe"
                                src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d28711.18702367633!2d45.359631!3d25.905711!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1517868389608"
                                allowfullscreen></iframe>
                    </div>
                    {{--                    <iframe aria-hidden="true" frameborder="0" tabindex="-1" style="z-index: -1; position: absolute; width: 100%; height: 100%; top: 0px; left: 0px; border: none; opacity: 0;"></iframe>--}}
                    {{--                    <!-- Replace 'YOUR_LATITUDE' and 'YOUR_LONGITUDE' with actual values -->--}}
                    {{--                    <div id="googleMap" style="width:100%;height:200px;"></div>--}}
                    {{--                    <script>--}}
                    {{--                        function initMap() {--}}
                    {{--                            var mapOptions = {--}}
                    {{--                                center: new google.maps.LatLng(YOUR_LATITUDE, YOUR_LONGITUDE),--}}
                    {{--                                zoom: 15,--}}
                    {{--                                mapTypeId: google.maps.MapTypeId.ROADMAP--}}
                    {{--                            };--}}
                    {{--                            var map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);--}}
                    {{--                        }--}}
                    {{--                    </script>--}}
                    {{--                    <script async defer--}}
                    {{--                            src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&callback=initMap"></script>--}}
                </div>

                <!-- Logo Column -->
                <div class="col-md-4 col-sm-12 d-flex align-items-center justify-content-center order-lg-3" dir="rtl">
                    <img src="{{ asset("resources/site/images/logo.svg") }}" alt="" class="order-1">
                </div>
{{--{{dd("fffffffffffffff")}}--}}
                @include("site.partials.social_contact")
            </div>
        </div>

    </section>

@show