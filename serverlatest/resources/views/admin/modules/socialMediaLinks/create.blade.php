@extends("admin.layout.master")

@push('browser_title')
    Add Social Media Link ::
@endpush

@section('sliders-active')
    active current-page
@endsection


@section('content')
    <form action='{{route("admin.socialMedia.do_create")}}' method="post" enctype="multipart/form-data">
        @csrf
        <div class="x_panel">
            <div class="x_title">
                <h2>Add Social Media Link</h2>
                <a class="btn btn-danger btn-round btn-xs pull-right" title="Cancel Add slider"
                   href="{{route("admin.socialMedia.list")}}">
                    <i class="fa fa-angle-double-right"></i>
                </a>
                <div class="pull-right mt-2 mr-2">
                    <div class="">
                        <label>
                            <input type="checkbox" class="js-switch" name='is_active' id='is_active' value='1' checked/>
                            Active Social Media Link
                        </label>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content"
                 style="padding-top: 0.2rem !important;border-bottom: 1px solid #9a9da0;margin-bottom: 1%;">
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="title"
                                   class="form-label @if ($errors->has("title")) is-invalid @endif">Title</label>
                            <select name='title' id='social_media' required
                                    class='form-control @if ($errors->has("title")) is-invalid @endif' required
                                    @if ($errors->has("title"))
                                        aria-describedby="title-error"
                                    aria-invalid="true"
                                    @endif>
                                <option value=''>--Select Social Media--</option>
                                @foreach ($socialMediaTypes as $media)
                                    <option value="{{ $media }}">{{ $media }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has("title"))
                                <div id="title-error"
                                     class="invalid-feedback animated fadeInDown">{{ $errors->first("title") }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="url" class="form-label @if ($errors->has("url")) is-invalid @endif">Social media
                                Link</label>
                            <input type='text' name='url' id='url' value='{{old("url")}}' placeholder="Banner Link"
                                   class='form-control @if ($errors->has("url")) is-invalid @endif'
                                   @if ($errors->has("url"))
                                       aria-describedby="url-error"
                                   aria-invalid="true"
                                    @endif
                            />
                            @if ($errors->has("url"))
                                <div id="url-error"
                                     class="invalid-feedback animated fadeInDown">{{ $errors->first("url") }}</div>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-12 col-md-8 col-lg-8">
                        <div class="form-group">
                            <label for="image" class="form-label @if ($errors->has("image")) is-invalid @endif">Social
                                media
                                Logo</label>
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