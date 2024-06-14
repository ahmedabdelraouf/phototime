<div class="col-md-4 col-sm-12 pt-3 text-right order-lg-2">
    <h6 class="d-none d-md-block text-center">للتواصل معانا</h6>
    <div class="social py-3 text-center d-flex flex-column align-items-center">
        <?php $socialMediaLinks = \App\Models\SocialMediaLink::where("is_active", 1)->OrderBy('id', 'DESC')->get(); ?>
        <div>
            @foreach($socialMediaLinks as $socialMediaLink)
                <a href="{{$socialMediaLink->url}}">
                    <img src="{{images_path($socialMediaLink->image)}}" class="img-fluid"
                         alt="{{$socialMediaLink->title}}">
                </a>
            @endforeach
        </div>
        <p class="d-none d-md-block">(Phototime21) جميع الحقوق محفوظة © {{date("Y")}} </p>
    </div>
</div><?php
