@extends("admin.layout.master")

@push('browser_title')
    Add Category ::
@endpush

@section('categories-active')
    active current-page
@endsection


@section('content')
    <form action='{{route("admin.categories.do_create")}}' method="post" enctype="multipart/form-data">
        @csrf
        <div class="x_panel">
            <div class="x_title">
                <h2>Add Category</h2>
                <a class="btn btn-danger btn-round btn-xs pull-right" title="Cancel Add post"
                   href="{{route("admin.categories.list")}}">
                    <i class="fa fa-angle-double-right"></i>
                </a>
                <div class="pull-right mt-2 mr-2">
                    <div class="">
                        <label>
                            <input type="checkbox" class="js-switch" name='is_active' id='is_active' value='1'/> Active
                            category
                        </label>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="padding-top: 0.2rem !important;">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="title" class="form-label @if ($errors->has("title")) is-invalid @endif">Category
                                Title</label>
                            <input type='text' name='title' id='title' value='{{old("title")}}'
                                   placeholder="Category Title "
                                   class='form-control slug_source @if ($errors->has("title")) is-invalid @endif'
                                   required
                                   aria-slugFor="slug"
                                   @if ($errors->has("title"))
                                       aria-describedby="title-error"
                                   aria-invalid="true"
                                    @endif
                            />
                            @if ($errors->has("title"))
                                <div id="title-error"
                                     class="invalid-feedback animated fadeInDown">{{ $errors->first("title") }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="slug" class="form-label @if ($errors->has("slug")) is-invalid @endif">Category
                                slug</label>
                            <input type='text' name='slug' id='slug' value='{{old("slug")}}'
                                   placeholder="Category unique slug"
                                   class='form-control slug_input @if ($errors->has("slug")) is-invalid @endif'
                                   aria-slugedBy="title" required
                                   @if ($errors->has("slug"))
                                       aria-describedby="slug-error"
                                   aria-invalid="true"
                                    @endif
                            />
                            @if ($errors->has("slug"))
                                <div id="slug-error"
                                     class="invalid-feedback animated fadeInDown">{{ $errors->first("slug") }}</div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="image" class="form-label @if ($errors->has("image")) is-invalid @endif">Category
                                Image</label>
                            <input type='file' name='image' id='image' accept="image/*"
                                   class='form-control @if ($errors->has("image")) is-invalid @endif'
                                   @if ($errors->has("image"))
                                       aria-describedby="image-error"
                                   aria-invalid="true"
                                    @endif
                            />
                            @if ($errors->has("image"))
                                <div id="image-error"
                                     class="invalid-feedback animated fadeInDown">{{ $errors->first("image") }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="image_name" class="form-label">Image name</label>
                            <input type='text' name='image_name' id='image_name' value='{{old("image_name")}}'
                                   placeholder="Image name" class='form-control'/>
                        </div>
                    </div>
                    <div class="col-4 col-md-4 col-lg-4">
                        <label for="image_name" class="form-label">Category order</label>
                        <input type='number' name='order' id='order' value='{{old("order")}}'
                               min="1" max="100"
                               placeholder="Order" class='form-control'/>
                    </div>
                </div>

                <div class="row mb-3" style="margin-top: 2%">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="short_desc"
                                   class="form-label @if ($errors->has("short_desc")) is-invalid @endif">Description </label>
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <textarea name="short_desc" id="content"
                                              class="form-control editor @if ($errors->has("content")) is-invalid @endif"
                                              @if ($errors->has("short_desc"))
                                                  aria-describedby="content-error"
                                              aria-invalid="true" @endif>{{old("short_desc")}}</textarea>
                                    @if ($errors->has("short_desc"))
                                        <div id="content-error"
                                             class="invalid-feedback animated fadeInDown">{{ $errors->first("short_desc") }}</div>
                                    @endif
                                </div>
                            </div>
                            @if ($errors->has("short_desc"))
                                <div id="short_desc-error"
                                     class="invalid-feedback animated fadeInDown">{{ $errors->first("short_desc") }}</div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 2%">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="meta_keywords"
                                   class="form-label @if ($errors->has("meta_keywords")) is-invalid @endif">Meta
                                Keywords </label>
                            <textarea name="meta_keywords" id="meta_keywords"
                                      class='form-control tags @if ($errors->has("meta_keywords")) is-invalid @endif'
                                      rows="3"
                                      @if ($errors->has("meta_keywords"))
                                          aria-describedby="meta_keywords-error"
                                      aria-invalid="true"
                @endif
            >photography, photographer, photo gallery, portrait photography, landscape photography, event photography, professional photographer, photography portfolio, creative photography, fine art photography, black and white photography, color photography, nature photography, wedding photography, commercial photography, artistic photography, photojournalism, travel photography, fashion photography, documentary photography, photography services, photo studio, photography blog, photo exhibition</textarea>
                            @if ($errors->has("meta_keywords"))
                                <div id="meta_keywords-error"
                                     class="invalid-feedback animated fadeInDown">{{ $errors->first("meta_keywords") }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="meta_title"
                                   class="form-label @if ($errors->has("meta_title")) is-invalid @endif">Meta Title for
                                the category</label>
                            <input type='text' name='meta_title' id='meta_title' value='{{old("meta_title")??"Phototime21 - Capturing Timeless Moments | About [Your Photography Studio Name] - Our Story and Mission | Wedding Photography Portfolio by Phototime21 | Landscape Photography - Explore Natures Beauty | Professional Portrait Photography Services - Phototime21 | Commercial Photography - Showcasing Your Brand with Phototime21 | Contact [Your Photography Studio Name] - Lets Capture Moments Together | Photography Blog - Insights and Tips by Phototime21 | Exclusive Photography Deals - Phototime21 | Client Testimonials - What Our Clients Say About Phototime21 | Photography FAQs - Common Questions Answered by Phototime21"}}'
                                   placeholder="Category Meta Title "
                                   class='form-control @if ($errors->has("meta_title")) is-invalid @endif'
                                   @if ($errors->has("meta_title"))
                                       aria-describedby="meta_title-error"
                                   aria-invalid="true"
                                    @endif
                            />
                            @if ($errors->has("meta_title"))
                                <div id="meta_title-error"
                                     class="invalid-feedback animated fadeInDown">{{ $errors->first("meta_title") }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="meta_description"
                                   class="form-label @if ($errors->has("meta_description")) is-invalid @endif">Meta
                                description </label>
                            <textarea name="meta_description" id="meta_description"
                                      class='form-control @if ($errors->has("meta_description")) is-invalid @endif'
                                      rows="2"
                                      @if ($errors->has("meta_description"))
                                          aria-describedby="meta_description-error"
                                      aria-invalid="true"
                @endif
            >*General Photography Website:Explore breathtaking photography showcasing moments of beauty, creativity, and emotion. Our portfolio includes stunning landscapes, captivating portraits, and unforgettable events. Discover the artistry of photography with our professional services.
                                *Wedding Photography:Capturing timeless love and joy. Browse our wedding photography portfolio for enchanting moments, beautiful ceremonies, and unforgettable celebrations. Trust us to turn your special day into everlasting memories.
                                *Landscape Photography:Immerse yourself in the beauty of nature. Our landscape photography transports you to scenic vistas, serene environments, and awe-inspiring natural wonders. Experience the world through our lens.
                                *Portrait Photography Studio:Elevate your personal and professional image with our portrait photography services. Our studio specializes in capturing your unique essence, providing timeless portraits for individuals, families, and professionals.
                                *Commercial Photography Services:Enhance your brand with high-quality commercial photography. From product shoots to corporate events, our photography services are tailored to showcase your business in the best light. Elevate your visual identity today.
                                *Photography Blog:Stay updated with the latest trends, tips, and inspiration in the world of photography. Explore our photography blog for insightful articles, behind-the-scenes stories, and expert advice from our passionate team of photographers.</textarea>
                            @if ($errors->has("meta_description"))
                                <div id="meta_description-error"
                                     class="invalid-feedback animated fadeInDown">{{ $errors->first("meta_description") }}</div>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="row mb-3" style="padding: 2% 0 0 0;width: 100%;">
                    <button type="submit" class="btn btn-primary pull-right btn-lg" style="width: 25%">
                        <i class="fa fa-fw mr-2 fa-plus"></i> Save
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection

@push("styles")
    <link rel="stylesheet" href="{{url("resources/dashboard/vendors/tinymce/tinymce.css")}}">
    <link href="{{url("resources/dashboard/build/css/select2.min.css")}}" rel="stylesheet"/>
@endpush

@push("scripts")
    <script src="{{url("resources/dashboard/vendors/jquery.tagsinput/src/jquery.tagsinput.js")}}"></script>
    <script src="{{url("resources/dashboard/vendors/jquery.hotkeys/jquery.hotkeys.js")}}"></script>
    <script src="{{url("resources/dashboard/vendors/google-code-prettify/src/prettify.js")}}"></script>
    <script src="{{url("resources/dashboard/vendors/tinymce/tinymce.js")}}"></script>
    <script src="{{url("resources/dashboard/build/js/select2.min.js")}}"></script>
    <script>
        $(document).ready(function () {
            $(".select2_multiple").select2({
                placeholder: "Select a services",
                allowClear: true
            });
        })
    </script>
@endpush
