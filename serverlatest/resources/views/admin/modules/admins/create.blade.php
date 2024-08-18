@extends("admin.layout.master")

@push('browser_title')
    Add admin ::
@endpush

@section('admins-active')
    active current-admin
@endsection


@section('content')
    <form action='{{route("admin.admins.do_create")}}' method="post" enctype="multipart/form-data">
        @csrf
        <div class="x_panel">
            <div class="x_title">
                <h2>Add Admin</h2>
                    <a class="btn btn-danger btn-round btn-xs pull-right" title="Cancel Add admin" href="{{route("admin.admins.list")}}">
                        <i class="fa fa-angle-double-right"></i>
                    </a>
                <div class="pull-right mt-2 mr-2">
                    <div class="">
                        <label>
                            <input type="checkbox" class="js-switch" name='is_active' id='is_active' value='1' /> Active admin
                        </label>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="padding-top: 0.2rem !important;">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="name" class="form-label @if ($errors->has("name")) is-invalid @endif">Admin name</label>
                            <input type='text' name='name' id='name' value='{{old("name")}}' placeholder="Admin name"
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
                            <label for="name" class="form-label @if ($errors->has("email")) is-invalid @endif">Admin email</label>
                            <input type='text' name='email' id='email' value='{{old("email")}}' placeholder="Admin email"
                                   class='form-control slug_source @if ($errors->has("email")) is-invalid @endif' required
                                   aria-slugFor="slug"
                                   @if ($errors->has("email"))
                                       aria-describedby="email-error"
                                   aria-invalid="true"
                                @endif
                            />
                            @if ($errors->has("email"))
                                <div id="email-error" class="invalid-feedback animated fadeInDown">{{ $errors->first("email") }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="password" class="form-label @if ($errors->has("password")) is-invalid @endif">Admin password</label>
                            <input type='password' name='password' id='password' value='{{old("password")}}' placeholder="Admin password"
                                   class='form-control slug_source @if ($errors->has("password")) is-invalid @endif' required
                                   aria-slugFor="slug"
                                   @if ($errors->has("password"))
                                       aria-describedby="password-error"
                                   aria-invalid="true"
                                @endif
                            />
                            @if ($errors->has("password"))
                                <div id="password-error" class="invalid-feedback animated fadeInDown">{{ $errors->first("password") }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="password_confirmation" class="form-label @if ($errors->has("password_confirmation")) is-invalid @endif">Admin password_confirmation</label>
                            <input type='password' name='password_confirmation' id='password_confirmation' value='{{old("password_confirmation")}}' placeholder="Admin password_confirmation"
                                   class='form-control slug_source @if ($errors->has("password_confirmation")) is-invalid @endif' required
                                   aria-slugFor="slug"
                                   @if ($errors->has("password_confirmation"))
                                       aria-describedby="password_confirmation-error"
                                   aria-invalid="true"
                                @endif
                            />
                            @if ($errors->has("password_confirmation"))
                                <div id="password_confirmation-error" class="invalid-feedback animated fadeInDown">{{ $errors->first("password_confirmation") }}</div>
                            @endif
                        </div>
                    </div>
                    

                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="roles" class="form-label @if ($errors->has("role")) is-invalid @endif">Admin role</label>
                           
                            <select class="form-control" name="role_id" id="parent_role">
                            <option value="">Select Parent Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                                </select>
                            @if ($errors->has("role_id"))
                                <div id="role-error" class="invalid-feedback animated fadeInDown">{{ $errors->first("role_id") }}</div>
                            @endif
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
