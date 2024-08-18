@extends("admin.layout.master")

@push('browser_title')
    Add Menu ::
@endpush

@section('menus-active')
    active current-page
@endsection


@section('content')
    <form action='{{route("admin.menus.do_create")}}' method="post" enctype="multipart/form-data">
        @csrf
        <div class="x_panel">
            <div class="x_title">
                <h2>Add Menu</h2>
                    <a class="btn btn-danger btn-round btn-xs pull-right" title="Cancel Add menu" href="{{route("admin.menus.list")}}">
                        <i class="fa fa-angle-double-right"></i>
                    </a>
                <div class="pull-right mt-2 mr-2">
                    <div class="">
                        <label>
                            <input type="checkbox" class="js-switch" name='is_active' id='is_active' value='1' /> Active menu
                        </label>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="padding-top: 0.2rem !important;">
                <div class="row" style="margin-bottom: 3%">
                    <div class="col-6 col-md-6">
                        <div class="form-group">
                            <label for="parent_id" class="mt-4 form-label @if ($errors->has("parent_id")) is-invalid @endif">Parent Menu</label>
                            <select class="form-control select2_single @if ($errors->has("parent_id")) is-invalid @endif"
                                    id="parent_id" name="parent_id" data-placeholder="Choose one thing"
                                    @if ($errors->has("parent_id"))
                                        aria-describedby="parent_id-error"
                                    aria-invalid="true"
                                @endif >
                                <option value="0">No parents</option>
                                @foreach($parents as $p_id => $p_title)
                                    <option value="{{$p_id}}">{{$p_title}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has("parent_id"))
                                <div id="parent_id-error" class="invalid-feedback animated fadeInDown">{{ $errors->first("parent_id") }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="title" class="form-label @if ($errors->has("title")) is-invalid @endif">Menu Title</label>
                            <input type='text' name='title' id='title' value='{{old("title")}}' placeholder="Menu Title"
                                   class='form-control @if ($errors->has("title")) is-invalid @endif' required
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
                            <label for="a_title" class="form-label @if ($errors->has("a_title")) is-invalid @endif">Menu URL Tag Title</label>
                            <input type='text' name='a_title' id='a_title' value='{{old("a_title")}}' placeholder="Menu URL Tag Title"
                                   class='form-control @if($errors->has("a_title")) is-invalid @endif' required
                                   @if ($errors->has("a_title"))
                                       aria-describedby="a_title-error"
                                   aria-invalid="true"
                                    @endif
                            />
                            @if ($errors->has("a_title"))
                                <div id="a_title-error" class="invalid-feedback animated fadeInDown">{{ $errors->first("a_title") }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-9 col-lg-9">
                        <div class="form-group">
                            <label for="url" class="form-label @if ($errors->has("url")) is-invalid @endif">Menu Link</label>
                            <input type='text' name='url' id='url' value='{{old("url")}}' placeholder="Menu Link"
                                   class='form-control @if ($errors->has("url")) is-invalid @endif' required
                                   @if ($errors->has("url"))
                                       aria-describedby="url-error"
                                   aria-invalid="true"
                                    @endif
                            />
                            @if ($errors->has("url"))
                                <div id="url-error" class="invalid-feedback animated fadeInDown">{{ $errors->first("url") }}</div>
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
    <link href="{{url("resources/dashboard/build/css/select2.min.css")}}" rel="stylesheet" />
@endpush

@push("scripts")
    <script src="{{url("resources/dashboard/build/js/select2.min.js")}}"></script>
    <script>
        $(document).ready(function(){
            $(".select2_single").select2({
                placeholder: "Select a state",
                allowClear: true
            });
        })
    </script>
@endpush
