@extends("admin.layout.master")

@push('browser_title')
    Add Page ::
@endpush

@section('pages-active')
    active current-page
@endsection


@section('content')
    <form action='{{route("admin.pages.do_create")}}' method="post" enctype="multipart/form-data">
        @csrf
        <div class="x_panel">
            <div class="x_title">
                <h2>Add Page</h2>
                    <a class="btn btn-danger btn-round btn-xs pull-right" title="Cancel Add page" href="{{route("admin.pages.list")}}">
                        <i class="fa fa-angle-double-right"></i>
                    </a>
                <div class="pull-right mt-2 mr-2">
                    <div class="">
                        <label>
                            <input type="checkbox" class="js-switch" name='is_active' id='is_active' value='1' /> Active page
                        </label>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="padding-top: 0.2rem !important;">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="title" class="form-label @if ($errors->has("title")) is-invalid @endif">Page Title</label>
                            <input type='text' name='title' id='title' value='{{old("title")}}' placeholder="Page Title"
                                   class='form-control slug_source @if ($errors->has("title")) is-invalid @endif' required
                                   aria-slugFor="slug"
                                   @if ($errors->has("title"))
                                       aria-describedby="title-error"
                                   aria-invalid="true"
                                @endif
                            />
                            @if ($errors->has("title"))
                                <div id="title-error" class="invalid-feedback animated fadeInDown">{{ $errors->first("title") }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="slug" class="form-label @if ($errors->has("slug")) is-invalid @endif">Page slug</label>
                            <input type='text' name='slug' id='slug' value='{{old("slug")}}' placeholder="Page unique slug"
                                   class='form-control slug_input @if ($errors->has("slug")) is-invalid @endif'
                                   aria-slugedBy="title"
                                   @if ($errors->has("slug"))
                                       aria-describedby="slug-error"
                                   aria-invalid="true"
                                @endif
                            />
                            @if ($errors->has("slug"))
                                <div id="slug-error" class="invalid-feedback animated fadeInDown">{{ $errors->first("slug") }}</div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 2%">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="short_desc" class="form-label @if ($errors->has("short_desc")) is-invalid @endif">Short description</label>
                            <textarea name="short_desc" id="short_desc"
                                      class='form-control @if ($errors->has("short_desc")) is-invalid @endif'
                                      rows="3" required
                                      @if ($errors->has("short_desc"))
                                          aria-describedby="short_desc-error"
                                      aria-invalid="true"
                @endif
            ></textarea>
                            @if ($errors->has("short_desc"))
                                <div id="short_desc-error" class="invalid-feedback animated fadeInDown">{{ $errors->first("short_desc") }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="meta_keywords" class="form-label @if ($errors->has("meta_keywords")) is-invalid @endif">Meta Keywords</label>
                            <textarea name="meta_keywords" id="meta_keywords"
                                      class='form-control tags @if ($errors->has("meta_keywords")) is-invalid @endif'
                                      rows="3" required
                                      @if ($errors->has("meta_keywords"))
                                          aria-describedby="meta_keywords-error"
                                      aria-invalid="true"
                @endif
            ></textarea>
                            @if ($errors->has("meta_keywords"))
                                <div id="meta_keywords-error" class="invalid-feedback animated fadeInDown">{{ $errors->first("meta_keywords") }}</div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 2%">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="meta_title" class="form-label @if ($errors->has("meta_title")) is-invalid @endif">Meta Title for the page</label>
                            <input type='text' name='meta_title' id='meta_title' value='{{old("meta_title")}}' placeholder="Page Meta Title"
                                   class='form-control @if ($errors->has("meta_title")) is-invalid @endif' required
                                   @if ($errors->has("meta_title"))
                                       aria-describedby="meta_title-error"
                                   aria-invalid="true"
                                @endif
                            />
                            @if ($errors->has("meta_title"))
                                <div id="meta_title-error" class="invalid-feedback animated fadeInDown">{{ $errors->first("meta_title") }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="meta_description" class="form-label @if ($errors->has("meta_description")) is-invalid @endif">Meta description</label>
                            <textarea name="meta_description" id="meta_description"
                                      class='form-control @if ($errors->has("meta_description")) is-invalid @endif'
                                      rows="2" required
                                      @if ($errors->has("meta_description"))
                                          aria-describedby="meta_description-error"
                                      aria-invalid="true"
                @endif
            ></textarea>
                            @if ($errors->has("meta_description"))
                                <div id="meta_description-error" class="invalid-feedback animated fadeInDown">{{ $errors->first("meta_description") }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label for="content" class="form-label @if ($errors->has("content")) is-invalid @endif">Page full description</label>
                            <textarea name="content" id="content"
                                      class="form-control editor @if ($errors->has("content")) is-invalid @endif"
                                      @if ($errors->has("content"))
                                          aria-describedby="content-error"
                                      aria-invalid="true"
                @endif
            ></textarea>
                            @if ($errors->has("content"))
                                <div id="content-error" class="invalid-feedback animated fadeInDown">{{ $errors->first("content") }}</div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

            <div class="tab-footer" style="padding: 2% 0 0 0;width: 100%;">
                <button type="submit" class="btn btn-primary pull-right btn-lg" style="width: 25%">
                    <i class="fa fa-fw mr-2 fa-plus"></i> Save
                </button>
            </div>
        </div>
    </form>
@endsection

@push("styles")
    <link rel="stylesheet" href="{{url("resources/dashboard/vendors/tinymce/tinymce.css")}}">
    <link href="{{url("resources/dashboard/build/css/select2.min.css")}}" rel="stylesheet" />
@endpush

@push("scripts")
    <script src="{{url("resources/dashboard/vendors/jquery.tagsinput/src/jquery.tagsinput.js")}}"></script>
    <script src="{{url("resources/dashboard/vendors/jquery.hotkeys/jquery.hotkeys.js")}}"></script>
    <script src="{{url("resources/dashboard/vendors/google-code-prettify/src/prettify.js")}}"></script>
    <script src="{{url("resources/dashboard/vendors/tinymce/tinymce.js")}}"></script>
    <script src="{{url("resources/dashboard/build/js/select2.min.js")}}"></script>
    <script>
        $(document).ready(function(){
            $(".select2_multiple").select2({
                placeholder: "Select a posts",
                allowClear: true
            });
        })
    </script>
@endpush
