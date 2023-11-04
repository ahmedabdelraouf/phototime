@extends("admin.layout.master")

@push('browser_title')
    Edit Album ::
@endpush

@section('albums-active')
    active current-page
@endsection


@section('content')
    <form action='{{route("admin.albums.do_edit", ["id" => $album->id])}}' method="post" enctype="multipart/form-data">
        @csrf
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Album ({{ $album->title_ar }})</h2>
                    <a class="btn btn-danger btn-round btn-xs pull-right" title="Cancel Edit album" href="{{route("admin.albums.list")}}">
                        <i class="fa fa-angle-double-right"></i>
                    </a>
                <div class="pull-right mt-2 mr-2">
                    <div class="">
                        <label>
                            <input type="checkbox" class="js-switch" name='is_active' id='is_active' value='1' @if($album->is_active) checked @endif /> Active album
                        </label>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="padding-top: 0.2rem !important;">
                <div class="row mb-3">
                    <div class="col-6 col-md-6">
                        <div class="form-group">
                            <label for="posts" class="mt-4 form-label @if ($errors->has("posts[]")) is-invalid @endif">Posts</label>
                            <select class="form-control select2_multiple @if ($errors->has("posts[]")) is-invalid @endif"
                                    id="posts" name="posts[]" multiple data-placeholder="Choose one thing"
                                    @if ($errors->has("posts[]"))
                                        aria-describedby="posts-error"
                                    aria-invalid="true"
                                @endif >
                                @foreach($posts as $post_id => $post_title)
                                    <option value="{{$post_id}}" @if(in_array($post_id, $linked_posts)) selected @endif>{{$post_title}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has("posts[]"))
                                <div id="posts-error" class="invalid-feedback animated fadeInDown">{{ $errors->first("posts[]") }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="image_name" class="form-label">Image name</label>
                            <input type='text' name='image_name' id='image_name' value='{{old("image_name",get_image_name_from_string($album->image))}}'
                                   placeholder="Image name" class='form-control'/>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-8 col-lg-8">
                        <div class="form-group">
                            <label for="image" class="form-label @if ($errors->has("image")) is-invalid @endif">Banner Image</label>
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
                    <div class="col-12 col-md-4 col-lg-4" style="text-align: center">
                        <a href="{{images_path($album->image)}}" target="_blank">
                            <img src="{{images_path($album->image)}}" alt="{{$album->title}}" width="100%" style="width: 185px">
                        </a>
                    </div>
                </div>
                @include("admin.modules.albums.edit_form", ['form_lang' => "ar", 'required' => "required"])
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
