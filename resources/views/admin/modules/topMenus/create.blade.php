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
                            <select class="form-control select2_single @if ($errors->has("posts[]")) is-invalid @endif"
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
                        @include("admin.modules.topMenus.create_form", ['form_lang' => "ar"])
                    </div>
                    <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="en-tab">
                        <h4>
                            <img width="35px" style="margin-top: -4px" src="{{url("resources/dashboard/images/en.png")}}" alt="English" />
                            <b>Manage English Language content</b>
                        </h4>
                        <hr style="border: 1px solid #b8bcc0;margin-bottom: 1.5rem" />
                        @include("admin.modules.topMenus.create_form", ['form_lang' => "en"])
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
