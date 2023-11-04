@extends("admin.layout.auth")

@push('browser_title')
    Login ::
@endpush

@section('content')
    <section class="login_content">
        <form action='{{route("admin.auth.do_login")}}' method="post" enctype="multipart/form-data">
            @csrf
            <img src="{{url("resources/dashboard/images/login-logo.png")}}" style="width: 55%;"  alt="Bashayer"/>
            <div class="row" style="background-color: #FFFFFF;padding: 8% 0">
                <div class="col-12">
                    <div class="form-group">
                        <label>
                            <input type='email' name='u_email' id='u_email' value='{{old("u_email")}}' placeholder="Enter Your email"
                                   class='form-control @if ($errors->has("u_email")) is-invalid @endif' required
                                   @if ($errors->has("u_email"))
                                       aria-describedby="u_email-error"
                                   aria-invalid="true"
                                @endif
                            />

                            @if ($errors->has("u_email"))
                                <div id="u_email-error" class="invalid-feedback animated fadeInDown">{{ $errors->first("u_email") }}</div>
                            @endif
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label>
                            <input type='password' name='u_password' id='u_password' placeholder="Enter Your Password"
                                   class='form-control @if ($errors->has("u_password")) is-invalid @endif' required
                                   @if ($errors->has("u_password"))
                                       aria-describedby="u_password-error"
                                   aria-invalid="true"
                                @endif
                            />

                            @if ($errors->has("u_password"))
                                <div id="u_password-error" class="invalid-feedback animated fadeInDown">{{ $errors->first("u_password") }}</div>
                            @endif
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label>
                            <input type="checkbox" class="js-switch" name='u_remember_me' id='u_remember_me' value='1' /> Remember Me
                        </label>
                    </div>
                </div>
                <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Login
                        </button>
                </div>
            </div>
        </form>
    </section>
@endsection
