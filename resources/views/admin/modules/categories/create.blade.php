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
                <a class="btn btn-danger btn-round btn-xs pull-right" title="Cancel Add post" href="{{route("admin.categories.list")}}">
                    <i class="fa fa-angle-double-right"></i>
                </a>
                <div class="pull-right mt-2 mr-2">
                    <div class="">
                        <label>
                            <input type="checkbox" class="js-switch" name='is_active' id='is_active' value='1' /> Active post
                        </label>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="padding-top: 0.2rem !important;">
                <div class="row mb-3">
                    <div class="col-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="image" class="form-label @if ($errors->has("image")) is-invalid @endif">Category Image</label>
                            <input type='file' name='image' id='image' accept="image/*"
                                   class='form-control @if ($errors->has("image")) is-invalid @endif'
                                   @if ($errors->has("image"))
                                       aria-describedby="image-error"
                                   aria-invalid="true"
                                    @endif
                            />
                            @if ($errors->has("image"))
                                <div id="image-error" class="invalid-feedback animated fadeInDown">{{ $errors->first("image") }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="image_name" class="form-label">Image name</label>
                            <input type='text' name='image_name' id='image_name' value='{{old("image_name")}}'
                                   placeholder="Image name" class='form-control'/>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-tabs" id="multi-lang-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="ar-tab" data-toggle="tab" href="#ar"
                           role="tab" aria-controls="ar" aria-selected="true">
                            <img width="15px" style="margin-top: -5px" src="{{url("resources/dashboard/images/ar.png")}}" alt="Arabic" /> <b>Arabic</b>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="en-tab" data-toggle="tab" href="#en"
                           role="tab" aria-controls="en" aria-selected="true">
                            <img width="25px" style="margin-top: -5px" src="{{url("resources/dashboard/images/en.png")}}" alt="English" /> <b>English</b>
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="multi-lang-tabsContent">
                    <div class="tab-pane fade show active" id="ar" role="tabpanel" aria-labelledby="ar-tab">
                        <h4>
                            <img width="25px" style="margin-top: -4px" src="{{url("resources/dashboard/images/ar.png")}}" alt="Arabic" />
                            <b>Manage Arabic Language content</b>
                        </h4>
                        <hr style="border: 1px solid #b8bcc0;margin-bottom: 1.5rem" />
                        @include("admin.modules.categories.create_form", ['form_lang' => "ar", "required" => "required"])
                    </div>
                    <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="en-tab">
                        <h4>
                            <img width="35px" style="margin-top: -4px" src="{{url("resources/dashboard/images/en.png")}}" alt="English" />
                            <b>Manage English Language content</b>
                        </h4>
                        <hr style="border: 1px solid #b8bcc0;margin-bottom: 1.5rem" />
                        @include("admin.modules.categories.create_form", ['form_lang' => "en", "required" => ""])
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
                placeholder: "Select a services",
                allowClear: true
            });
        })
    </script>
@endpush
