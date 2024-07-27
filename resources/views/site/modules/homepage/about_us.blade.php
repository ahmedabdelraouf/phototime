<div id="group" class=" w-90 ml-auto my-5" dir="rtl">
    <div class="text-center">
        <h2 class="m-0 text-light pt-3">
            <img class="" src="{{asset("resources/site/images/hash-right.svg")}}"/>
            من نحن <img class="" src="{{asset("resources/site/images/hash-left.svg")}}"/>
        </h2>
        <img class="" src="{{asset("resources/site/images/hash-bottom.svg")}}"/>
    </div>
    <img src="{{images_path($settings->site_bout_us_image??"") }}" class="group" alt="">
    <div class="row mx-0" dir="rtl">
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="content px-lg-5">
                <h3>{{$settings->site_about_us_title_ar??""}}</h3>
                <p style="width: 90%">{{$settings->site_about_us_desc_ar??""}}</p>
            </div>
        </div>
    </div>
</div>

<style>

    #group {
        margin-top: -400rem;
    }

    #group .content h3 {
        font-size: 2rem;
        color: #0053b7;
        text-align: right;
        font-weight: bold; /* Make the title bold */
    }

    #group .content p {
        font-size: 1rem;
        font-weight: bold; /* Make the title bold */
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        #group .content {
            text-align: center;
        }

        #group .content h3 {
            font-size: 3rem;
            color: #0053b7;
            text-align: center;
            font-weight: bold; /* Make the title bold */
        }

        #group .content p {
            font-size: 1rem;
            font-weight: bold; /* Make the title bold */
        }

        #group .about-us-description {
            font-size: 0.875rem; /* Adjust as needed for readability */
            margin: 0 auto; /* Center-align the paragraph */
        }

        .row {
            display: flex;
            flex-direction: column-reverse; /* Stack image on top of text on smaller screens */
        }
    }

    @media (max-width: 480px) {
        #group .content h3 {
            font-size: 1.25rem;
        }

        #group .about-us-description {
            font-size: 0.75rem; /* Adjust as needed for readability */
            margin: 0 auto; /* Center-align the paragraph */
        }

        .row {
            display: flex;
            flex-direction: column-reverse; /* Stack image on top of text on smaller screens */
        }
    }

</style>