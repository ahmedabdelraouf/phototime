@extends("admin.layout.master")

@push('browser_title')
    Edit Role::
@endpush

@section('roles-active')
    active current-role
@endsection


@section('content')
    <form action='{{route("admin.roles.do_edit", ["id" => $role->id])}}' method="post" enctype="multipart/form-data">
        @csrf
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Role({{ $role->title }})</h2>
                <a class="btn btn-danger btn-round btn-xs pull-right" title="Cancel Edit role" href="{{route("admin.roles.list")}}">
                    <i class="fa fa-angle-double-right"></i>
                </a>
                <div class="pull-right mt-2 mr-2">
                    <div class="">
                        <label>
                            <input type="checkbox" class="js-switch" name='is_active' id='is_active' value='1' @if($role->is_active) checked @endif /> Active role
                        </label>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="padding-top: 0.2rem !important;">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="name" class="form-label @if ($errors->has("name")) is-invalid @endif">Rolename</label>
                            <input type='text' name='name' id='name' value='{{old("name",$role->name)}}' placeholder="Rolename"
                                   class='form-control @if ($errors->has("name")) is-invalid @endif' required
                                   @if ($errors->has("name"))
                                       aria-describedby="name-error"
                                   aria-invalid="true"
                                    @endif
                            />
                            @if ($errors->has("name"))
                                <div id="name-error" class="invalid-feedback animated fadeInDown">{{ $errors->first("title") }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="slug" class="form-label @if ($errors->has("slug")) is-invalid @endif">Roleslug</label>
                            @foreach ($permissions as $permission)
                                <div>
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                    <label>{{ $permission->name }}</label>
                                </div>
                            @endforeach
                            @if ($errors->has("slug"))
                                <div id="slug-error" class="invalid-feedback animated fadeInDown">{{ $errors->first("slug") }}</div>
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
