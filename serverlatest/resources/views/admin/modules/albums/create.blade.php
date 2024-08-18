@extends("admin.layout.master")

@push('browser_title')
    Add New Album ::
@endpush

@section('albums-active')
    active current-page
@endsection


@section('content')
    <form action='{{route("admin.albums.do_create")}}' method="post" enctype="multipart/form-data">
        @csrf
        <div class="x_panel">
            <div class="x_title">
                <h2>Add New Album</h2>
                <a class="btn btn-danger btn-round btn-xs pull-right" title="Cancel Add album"
                   href="{{route("admin.albums.list")}}">
                    <i class="fa fa-angle-double-right"></i>
                </a>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="padding-top: 0.2rem !important;">

                <div class="row mb-3">
                    <div class="col-6 col-md-6">
                        <div class="form-group">
                            <label for="categories"
                                   class="mt-4 form-label @if ($errors->has("categories[]")) is-invalid @endif">Categories</label>
                            <select class="form-control select2_multiple @if ($errors->has("categories[]")) is-invalid @endif"
                                    id="categories" name="categories[]" multiple data-placeholder="Choose one thing"
                                    {{--required--}}
                                    @if ($errors->has("categories[]"))
                                        aria-describedby="categories-error"
                                    aria-invalid="true"
                                    @endif >
                                @foreach($categories as $category_id => $category_title)
                                    <option value="{{$category_id}}">{{$category_title}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has("categories[]"))
                                <div id="categories-error"
                                     class="invalid-feedback animated fadeInDown">{{ $errors->first("categories[]") }}</div>
                            @endif
                        </div>
                    </div>


                    <div style="margin-top: 3.5rem" class="col-6 col-md-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" class="js-switch" name='is_featured' id='is_featured'
                                           @if(old("is_featured")!=null) checked @endif
                                           value='1'/>Featured Album</label>
                                <label>
                                    <input type="checkbox" class="js-switch" name='is_public' id='is_public'
                                           @if(old("is_public")!=null) checked @endif
                                           value='1'/>Public Album</label>

                                <label style="margin-left: 2.1rem">
                                    <input type="checkbox" class="js-switch" name='is_blocked' id='is_blocked'
                                           @if(old("is_blocked")!=null) checked @endif
                                           value='1'/>Block Album</label>

                                <label style="margin-left: 2.1rem">
                                    <input type="checkbox" class="js-switch" name='is_active' id='is_active'
                                           @if(old("is_active")!=null) checked @else checked @endif
                                           value='1'/> Publish Album</label>

                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>

                <div class="row mb-3">
                    <div class="col-12 col-md-6 col-lg-6 mb-3">
                        <div class="form-group">
                            <label for="title" class="form-label @if ($errors->has("title")) is-invalid @endif">Album
                                Title</label>
                            <input type='text' name='title' id='title' value='{{old("title")}}'
                                   placeholder="Album Title"
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
                    {{--                    <div class="col-12 col-md-6 col-lg-6">--}}
                    {{--                        <div class="form-group">--}}
                    {{--                            <label for="slug" class="form-label @if ($errors->has("slug")) is-invalid @endif">Album--}}
                    {{--                                slug</label>--}}
                    {{--                            <input type='text' name='slug' id='slug' value='{{old("slug")}}'--}}
                    {{--                                   placeholder="Album unique slug"--}}
                    {{--                                   class='form-control slug_input @if ($errors->has("slug")) is-invalid @endif'--}}
                    {{--                                   aria-slugedBy="title"--}}
                    {{--                                   @if ($errors->has("slug"))--}}
                    {{--                                       aria-describedby="slug-error"--}}
                    {{--                                   aria-invalid="true"--}}
                    {{--                                    @endif--}}
                    {{--                            />--}}
                    {{--                            @if ($errors->has("slug"))--}}
                    {{--                                <div id="slug-error"--}}
                    {{--                                     class="invalid-feedback animated fadeInDown">{{ $errors->first("slug") }}</div>--}}
                    {{--                            @endif--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="col-12 col-md-6 col-lg-6 mb-3">--}}
                    {{--                        <div class="form-group">--}}
                    {{--                            <label for="album_number"--}}
                    {{--                                   class="form-label @if ($errors->has("album_number")) is-invalid @endif">Album number</label>--}}
                    {{--                            <input type='text' accept="image/x-png,image/gif,image/jpeg" name='album_number'--}}
                    {{--                                   id='album_number'--}}
                    {{--                                   placeholder="album number"--}}
                    {{--                                   class='form-control @if ($errors->has("album_number")) is-invalid @endif' required--}}
                    {{--                                   @if ($errors->has("album_number"))--}}
                    {{--                                       aria-describedby="album_number-error"--}}
                    {{--                                   aria-invalid="true"--}}
                    {{--                                    @endif--}}
                    {{--                            />--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>

                <div class="row mb-3">
                    {{--                    <div class="col-12 col-md-6 col-lg-6 mb-3">--}}
                    {{--                        <div class="form-group">--}}
                    {{--                            <label for="photo_date"--}}
                    {{--                                   class="form-label @if ($errors->has("photo_date")) is-invalid @endif">Date</label>--}}
                    {{--                            <input type='date' name='photo_date' id='photo_date' value='{{old("photo_date")}}'--}}
                    {{--                                   placeholder="Date"--}}
                    {{--                                   class='form-control @if ($errors->has("photo_date")) is-invalid @endif' required--}}
                    {{--                                   @if ($errors->has("photo_date"))--}}
                    {{--                                       aria-describedby="photo_date-error"--}}
                    {{--                                   aria-invalid="true"--}}
                    {{--                                    @endif--}}
                    {{--                            />--}}
                    {{--                            @if ($errors->has("photo_date"))--}}
                    {{--                                <div id="photo_date-error"--}}
                    {{--                                     class="invalid-feedback animated fadeInDown">{{ $errors->first("photo_date") }}</div>--}}
                    {{--                            @endif--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}


                    <div class="col-12 col-md-6 col-lg-6 mb-3">
                        <div class="form-group">
                            <label for="default_image"
                                   class="form-label @if ($errors->has("default_image")) is-invalid @endif">Default
                                image</label>
                            <input type='file' accept="image/x-png,image/gif,image/jpeg" name='default_image'
                                   id='default_image'
                                   placeholder="image"
                                   class='form-control @if ($errors->has("default_image")) is-invalid @endif' required
                                   @if ($errors->has("default_image"))
                                       aria-describedby="default_image-error"
                                   aria-invalid="true"
                                    @endif
                            />
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="youtube_url"
                                   class="form-label @if ($errors->has("youtube_url")) is-invalid @endif">Youtube
                                URL </label>
                            <input type="text" name="youtube_url" id="youtube_url"
                                   value="{{old("youtube_url")}}"
                                   class='form-control @if ($errors->has("youtube_url")) is-invalid @endif'
                                   @if ($errors->has("youtube_url"))
                                       aria-describedby="youtube_url-error"
                                   aria-invalid="true"
                                    @endif>
                            @if ($errors->has("youtube_url"))
                                <div id="youtube_url-error"
                                     class="invalid-feedback animated fadeInDown">{{ $errors->first("youtube_url") }}</div>
                            @endif
                        </div>
                        <div class="clearfix"></div>
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

                <div class="row mb-3">
                    <div class="col-12 col-md-6 col-lg-6 mb-3">
                        <div class="form-group">
                            <label for="meta_title"
                                   class="form-label @if ($errors->has("meta_title")) is-invalid @endif">Meta Title
                                for album</label>
                            <input type='text' name='meta_title' id='meta_title'
                                   value='{{old("meta_title")??"Phototime21 - Capturing Timeless Moments | About [Your Photography Studio Name] - Our Story and Mission | Wedding Photography Portfolio by Phototime21 | Landscape Photography - Explore Natures Beauty | Professional Portrait Photography Services - Phototime21 | Commercial Photography - Showcasing Your Brand with Phototime21 | Contact [Your Photography Studio Name] - Lets Capture Moments Together | Photography Blog - Insights and Tips by Phototime21 | Exclusive Photography Deals - Phototime21 | Client Testimonials - What Our Clients Say About Phototime21 | Photography FAQs - Common Questions Answered by Phototime21"}}'
                                   placeholder="Album Meta Title "
                                   class='form-control @if ($errors->has("meta_title")) is-invalid @endif' required
                                   @if ($errors->has("meta_title"))
                                       aria-describedby="meta_title-error"
                                   aria-invalid="true"
                                   @endif
                                   valu
                            />
                            @if ($errors->has("meta_title"))
                                <div id="meta_title-error"
                                     class="invalid-feedback animated fadeInDown">{{ $errors->first("meta_title") }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 mb-3">
                        <div class="form-group">
                            <label class="form-label @if ($errors->has("meta_description")) is-invalid @endif"
                                   for="meta_description">Meta Description</label>
                            <input type='text' name='meta_description' id='meta_description' class='form-control'
                                   required
                                   value='*General Photography Website:Explore breathtaking photography showcasing moments of beauty, creativity, and emotion. Our portfolio includes stunning landscapes, captivating portraits, and unforgettable events. Discover the artistry of photography with our professional services.
                                *Wedding Photography:Capturing timeless love and joy. Browse our wedding photography portfolio for enchanting moments, beautiful ceremonies, and unforgettable celebrations. Trust us to turn your special day into everlasting memories.
                                *Landscape Photography:Immerse yourself in the beauty of nature. Our landscape photography transports you to scenic vistas, serene environments, and awe-inspiring natural wonders. Experience the world through our lens.
                                *Portrait Photography Studio:Elevate your personal and professional image with our portrait photography services. Our studio specializes in capturing your unique essence, providing timeless portraits for individuals, families, and professionals.
                                *Commercial Photography Services:Enhance your brand with high-quality commercial photography. From product shoots to corporate events, our photography services are tailored to showcase your business in the best light. Elevate your visual identity today.
                                *Photography Blog:Stay updated with the latest trends, tips, and inspiration in the world of photography. Explore our photography blog for insightful articles, behind-the-scenes stories, and expert advice from our passionate team of photographers.'
                            />
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="form-group">
                        <label for="meta_keywords"
                               class="form-label @if ($errors->has("meta_keywords")) is-invalid @endif">Meta
                            Keywords </label>
                        <input type="text" name="meta_keywords" id="meta_keywords" class='form-control tags'
                               value="photography, photographer, photo gallery, portrait photography, landscape photography, event photography, professional photographer, photography portfolio, creative photography, fine art photography, black and white photography, color photography, nature photography, wedding photography, commercial photography, artistic photography, photojournalism, travel photography, fashion photography, documentary photography, photography services, photo studio, photography blog, photo exhibition"/>
                    </div>
                </div>

                {{--                    <div class="col-12 col-md-4 col-lg-4 mb-3">--}}
                {{--                        <div class="form-group">--}}
                {{--                            <label for="photo_owner_name"--}}
                {{--                                   class="form-label @if ($errors->has("photo_owner_name")) is-invalid @endif">Album--}}
                {{--                                Owner name</label>--}}
                {{--                            <input type='text' name='photo_owner_name' id='photo_owner_name'--}}
                {{--                                   value='{{old("photo_owner_name")}}' placeholder="Album Owner name"--}}
                {{--                                   class='form-control @if ($errors->has("photo_owner_name")) is-invalid @endif'--}}
                {{--                                   required--}}
                {{--                                   @if ($errors->has("photo_owner_name"))--}}
                {{--                                       aria-describedby="photo_owner_name-error"--}}
                {{--                                   aria-invalid="true"--}}
                {{--                                    @endif--}}
                {{--                            />--}}
                {{--                            @if ($errors->has("photo_owner_name"))--}}
                {{--                                <div id="photo_owner_name-error"--}}
                {{--                                     class="invalid-feedback animated fadeInDown">{{ $errors->first("photo_owner_name") }}</div>--}}
                {{--                            @endif--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div class="col-12 col-md-4 col-lg-4 mb-3">--}}
                {{--                        <div class="form-group">--}}
                {{--                            <label for="photo_place"--}}
                {{--                                   class="form-label @if ($errors->has("photo_place")) is-invalid @endif">Address</label>--}}
                {{--                            <textarea name='photo_place' id='photo_place' placeholder="Album Address"--}}
                {{--                                      class='form-control @if ($errors->has("photo_place")) is-invalid @endif' required--}}
                {{--                                      @if ($errors->has("photo_place"))--}}
                {{--                                          aria-describedby="photo_place-error"--}}
                {{--                                      aria-invalid="true"--}}
                {{--                                      @endif--}}
                {{--                                      rows="2"--}}
                {{--                            >{{old("photo_place")}}</textarea>--}}
                {{--                            @if ($errors->has("photo_place"))--}}
                {{--                                <div id="photo_place-error"--}}
                {{--                                     class="invalid-feedback animated fadeInDown">{{ $errors->first("photo_place") }}</div>--}}
                {{--                            @endif--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
            </div>

        </div>

        <div class="tab-footer" style="padding: 2% 0 0 0;width: 100%;">
            <button type="submit" class="btn btn-primary pull-right btn-lg" style="width: 25%">
                <i class="fa fa-fw mr-2 fa-plus"></i> Save
            </button>
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
                placeholder: "Select categories",
                allowClear: true
            });
        })
    </script>
@endpush
