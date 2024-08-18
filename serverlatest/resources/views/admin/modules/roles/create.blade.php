@extends("admin.layout.master")

@push('browser_title')
    Add Role::
@endpush

@section('roles-active')
    active current-role
@endsection


@section('content')
    <form action='{{route("admin.roles.do_create")}}' method="post" enctype="multipart/form-data">
        @csrf
        <div class="x_panel">
            <div class="x_name">
                <h2>Add Role</h2>
                    <a class="btn btn-danger btn-round btn-xs pull-right" name="Cancel Add Role" href="{{route("admin.roles.list")}}">
                        <i class="fa fa-angle-double-right"></i>
                    </a>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="padding-top: 0.2rem !important;">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="name" class="form-label @if ($errors->has("name")) is-invalid @endif">Rolename</label>
                            <input type='text' name='name' id='name' value='{{old("name")}}' placeholder="Rolename"
                                   class='form-control slug_source @if ($errors->has("name")) is-invalid @endif' required
                                   aria-slugFor="slug"
                                   @if ($errors->has("name"))
                                       aria-describedby="name-error"
                                   aria-invalid="true"
                                @endif
                            />
                            @if ($errors->has("name"))
                                <div id="name-error" class="invalid-feedback animated fadeInDown">{{ $errors->first("name") }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="slug" class="form-label @if ($errors->has("permissions")) is-invalid @endif">Permissions</label>
                          
                            
                            @foreach ($permissions as $permission)
                                <div>
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}">
                                    <label>{{ $permission->name }}</label>
                                </div>
                            @endforeach

                            @if ($errors->has("permissions"))
                                <div id="permissions-error" class="invalid-feedback animated fadeInDown">{{ $errors->first("permissions") }}</div>
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
