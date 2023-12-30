<div class="x_panel">
    <div class="x_title">
        <h2>Add Album</h2>
        <a class="btn btn-danger btn-round btn-xs pull-right" title="Cancel Add album"
           href="{{route("admin.albums.list")}}">
            <i class="fa fa-angle-double-right"></i>
        </a>
        <div class="pull-right mt-2 mr-2">
            <div class="">
                <label>
                    <input type="checkbox" class="js-switch" name='is_active' id='is_active'
                           @if(old('is_active')??$album->is_active) checked @endif
                    /> Active
                    album
                </label>
            </div>
        </div>
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
                            required
                            @if ($errors->has("categories[]"))
                                aria-describedby="categories-error"
                            aria-invalid="true"
                            @endif >
                        @foreach($categories as $category_id => $category_title)
                            <option @if(in_array($category_id,$selectedCategories)) selected
                                    @endif value="{{$category_id}}">{{$category_title}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has("categories[]"))
                        <div id="categories-error"
                             class="invalid-feedback animated fadeInDown">{{ $errors->first("categories[]") }}</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6 mb-3">
                <div class="form-group">
                    <label for="title" class="form-label @if ($errors->has("title")) is-invalid @endif">Album
                        Title</label>
                    <input type='text' name='title' id='title' value='{{old("title")??$album->title}}'
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
            <div class="col-12 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="slug" class="form-label @if ($errors->has("slug")) is-invalid @endif">Album
                        slug</label>
                    <input type='text' name='slug' id='slug' value='{{old("slug")??$album->slugData->slug}}'
                           placeholder="Album unique slug"
                           class='form-control slug_input @if ($errors->has("slug")) is-invalid @endif'
                           aria-slugedBy="title"
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

        <div class="row">
            <div class="col-12 col-md-4 col-lg-4 mb-3">
                <div class="form-group">
                    <label for="photo_date"
                           class="form-label @if ($errors->has("photo_date")) is-invalid @endif">Album
                        Date</label>
                    <input type='date' name='photo_date' id='photo_date'
                           value='{{old("photo_date")??$album->photo_date}}'
                           placeholder="Album Date"
                           class='form-control @if ($errors->has("photo_date")) is-invalid @endif' required
                           @if ($errors->has("photo_date"))
                               aria-describedby="photo_date-error"
                           aria-invalid="true"
                            @endif
                    />
                    @if ($errors->has("photo_date"))
                        <div id="photo_date-error"
                             class="invalid-feedback animated fadeInDown">{{ $errors->first("photo_date") }}</div>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-4 mb-3">
                <div class="form-group">
                    <label for="photo_owner_name"
                           class="form-label @if ($errors->has("photo_owner_name")) is-invalid @endif">Album
                        Owner name</label>
                    <input type='text' name='photo_owner_name' id='photo_owner_name'
                           value='{{old("photo_owner_name")??$album->photo_owner_name}}' placeholder="Album Owner name"
                           class='form-control @if ($errors->has("photo_owner_name")) is-invalid @endif'
                           required
                           @if ($errors->has("photo_owner_name"))
                               aria-describedby="photo_owner_name-error"
                           aria-invalid="true"
                            @endif
                    />
                    @if ($errors->has("photo_owner_name"))
                        <div id="photo_owner_name-error"
                             class="invalid-feedback animated fadeInDown">{{ $errors->first("photo_owner_name") }}</div>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-4 mb-3">
                <div class="form-group">
                    <label for="photo_place"
                           class="form-label @if ($errors->has("photo_place")) is-invalid @endif">Address</label>
                    <textarea name='photo_place' id='photo_place' placeholder="Album Address"
                              class='form-control @if ($errors->has("photo_place")) is-invalid @endif' required
                              @if ($errors->has("photo_place"))
                                  aria-describedby="photo_place-error"
                              aria-invalid="true"
                              @endif
                              rows="2"
                    >{{old("photo_place")??$album->photo_place}}</textarea>
                    @if ($errors->has("photo_place"))
                        <div id="photo_place-error"
                             class="invalid-feedback animated fadeInDown">{{ $errors->first("photo_place") }}</div>
                    @endif
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12 col-md-12">
                <div class="form-group">
                    <label for="short_desc" class="form-label @if ($errors->has("short_desc")) is-invalid @endif">Blog
                        Page full description</label>
                    <textarea name="short_desc" id="content"
                              class="form-control editor @if ($errors->has("short_desc")) is-invalid @endif"
                              @if ($errors->has("short_desc"))
                                  aria-describedby="short_desc-error"
                              aria-invalid="true"
                @endif
            >{{old("short_desc")??$album->short_desc}}</textarea>
                    @if ($errors->has("short_desc"))
                        <div id="content-error"
                             class="invalid-feedback animated fadeInDown">{{ $errors->first("content") }}</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 2%">

            {{--            <div class="col-12 col-md-6 col-lg-6">--}}
            {{--                <div class="form-group">--}}
            {{--                    <label for="short_desc"--}}
            {{--                           class="form-label @if ($errors->has("short_desc")) is-invalid @endif">Short--}}
            {{--                        description </label>--}}
            {{--                    <textarea name="short_desc" id="short_desc"--}}
            {{--                              class='form-control @if ($errors->has("short_desc")) is-invalid @endif'--}}
            {{--                              rows="3" required--}}
            {{--                              @if ($errors->has("short_desc"))--}}
            {{--                                  aria-describedby="short_desc-error"--}}
            {{--                              aria-invalid="true"--}}
            {{--                @endif--}}
            {{--            >{{old("short_desc")??$album->short_desc}}</textarea>--}}
            {{--                    @if ($errors->has("short_desc"))--}}
            {{--                        <div id="short_desc-error"--}}
            {{--                             class="invalid-feedback animated fadeInDown">{{ $errors->first("short_desc") }}</div>--}}
            {{--                    @endif--}}
            {{--                </div>--}}
        </div>
        <div class="col-12 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="meta_keywords"
                       class="form-label @if ($errors->has("meta_keywords")) is-invalid @endif">Meta
                    Keywords </label>
                <textarea name="meta_keywords" id="meta_keywords"
                          class='form-control tags @if ($errors->has("meta_keywords")) is-invalid @endif'
                          rows="3" required
                          @if ($errors->has("meta_keywords"))
                              aria-describedby="meta_keywords-error"
                          aria-invalid="true"
                @endif
            >{{old("meta_keywords")??$album->meta_keywords}}</textarea>
                @if ($errors->has("meta_keywords"))
                    <div id="meta_keywords-error"
                         class="invalid-feedback animated fadeInDown">{{ $errors->first("meta_keywords") }}</div>
                @endif
            </div>
        </div>
    </div>

    <div class="row" style="margin-top: 2%">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="meta_title"
                       class="form-label @if ($errors->has("meta_title")) is-invalid @endif">Meta Title for
                    the album</label>
                <input type='text' name='meta_title' id='meta_title'
                       value='{{old("meta_title")??$album->meta_title}}'
                       placeholder="Album Meta Title "
                       class='form-control @if ($errors->has("meta_title")) is-invalid @endif' required
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
                          rows="2" required
                          @if ($errors->has("meta_description"))
                              aria-describedby="meta_description-error"
                          aria-invalid="true"
                @endif
            >{{old("meta_description")??$album->meta_description}}</textarea>
                @if ($errors->has("meta_description"))
                    <div id="meta_description-error"
                         class="invalid-feedback animated fadeInDown">{{ $errors->first("meta_description") }}</div>
                @endif
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="youtube_url"
                       class="form-label @if ($errors->has("youtube_url")) is-invalid @endif">Youtube
                    URL </label>
                <input type="text" name="youtube_url" id="youtube_url"
                       class='form-control @if ($errors->has("youtube_url")) is-invalid @endif'
                       value="{{old("youtube_url")??$album->youtube_url}}"
                       pattern="^(https?|ftp):\/\/[^\s/$.?#].[^\s]*$"
                       @if ($errors->has("youtube_url"))
                           aria-describedby="youtube_url-error"
                       aria-invalid="true"
                        @endif>
                @if ($errors->has("youtube_url"))
                    <div id="youtube_url-error"
                         class="invalid-feedback animated fadeInDown">{{ $errors->first("youtube_url") }}</div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-6 col-md-6">
        <div class="form-group">
            <div class="">
                <label>
                    <input type="checkbox" class="js-switch" name='is_featured' id='is_featured'
                           @if(old('is_featured')??$album->is_featured) checked @endif/>
                    Featured Album
                </label>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>


</div>
</div>

<div class="tab-footer" style="padding: 2% 0 0 0;width: 100%;">
    <button type="submit" class="btn btn-primary pull-right btn-lg" style="width: 25%">
        <i class="fa fa-fw mr-2 fa-plus"></i> Save
    </button>
</div>
</div>