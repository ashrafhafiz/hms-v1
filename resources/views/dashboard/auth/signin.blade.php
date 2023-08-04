@extends('dashboard.layouts.master2')
@section('css')
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{ URL::asset('assets/dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}"
        rel="stylesheet">
    <style>
        .login_panel {
            display: none;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-6 d-none d-md-flex bg-primary-transparent">
                <div class="mx-auto text-center row wd-100p">
                    <div class="mx-auto my-auto col-md-12 col-lg-12 col-xl-12 wd-100p">
                        <img src="{{ URL::asset('assets/dashboard/img/media/login2.png') }}"
                            class="mx-auto my-auto ht-xl-100p wd-md-100p wd-xl-100p" alt="logo">
                    </div>
                </div>
            </div>
            <!-- The content half -->
            <div class="bg-white col-md-6 col-lg-6 col-xl-6">
                <div class="py-2 login d-flex align-items-center">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="mx-auto col-md-10 col-lg-10 col-xl-9">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex"> <a href="{{ url('/') }}"><img
                                                src="{{ URL::asset('assets/dashboard/img/brand/favicon.png') }}"
                                                class="sign-favicon ht-40" alt="logo"></a>
                                        <h1 class="my-auto ml-1 mr-0 main-logo1 tx-28">H<span>M</span>S</h1>
                                    </div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h2>{{ __('dashboard.Welcome') }} !</h2>
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <h5 class="mb-4 font-weight-semibold">
                                                {{ __('dashboard.Please sign in to continue') }}
                                            </h5>

                                            <div class="mb-4">
                                                <p class="mg-b-10">{{ __('dashboard.Select Login Type') }}</p>
                                                <div class="SumoSelect sumo_somename" tabindex="0" role="button"
                                                    aria-expanded="true">
                                                    <select name="somename" id="login_chooser"
                                                        class="form-control SlectBox SumoUnder"
                                                        onclick="console.log($(this).val())"
                                                        onchange="console.log('change is firing')" tabindex="-1">
                                                        <!--placeholder-->
                                                        <option disabled selected value="">
                                                            {{ __('dashboard.Please select') }}...
                                                        </option>
                                                        <option value="user_login">{{ __('dashboard.Login as User') }}
                                                        </option>
                                                        <option value="admin_login">{{ __('dashboard.Login as Admin') }}
                                                        </option>

                                                    </select>

                                                </div>
                                            </div>

                                            <div class="login_panel" id="user_login">
                                                <form method="POST" action="{{ route('user.login') }}" id="">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>{{ __('dashboard.User Email') }}</label> <input
                                                            class="form-control"
                                                            placeholder="{{ __('dashboard.Enter your email') }}"
                                                            type="email" name="email" value="{{ old('email') }}"
                                                            required autofocus autocomplete="username">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ __('dashboard.Password') }}</label> <input
                                                            class="form-control"
                                                            placeholder="{{ __('dashboard.Enter your password') }}"
                                                            type="password" name="password" required>
                                                    </div><button
                                                        class="btn btn-main-primary btn-block">{{ __('dashboard.Sign In') }}</button>
                                                    <div class="row row-xs">
                                                        <div class="col-sm-6">
                                                            <button class="btn btn-block"><i class="fab fa-facebook-f"></i>
                                                                {{ __('dashboard.Signup with Facebook') }}</button>
                                                        </div>
                                                        <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                            <button class="btn btn-info btn-block"><i
                                                                    class="fab fa-twitter"></i>
                                                                {{ __('dashboard.Signup with Twitter') }}</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="login_panel" id="admin_login">
                                                <form method="POST" action="{{ route('admin.login') }}" id="">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>{{ __('dashboard.Admin Email') }}</label> <input
                                                            class="form-control"
                                                            placeholder="{{ __('dashboard.Enter your email') }}"
                                                            type="email" name="email" value="{{ old('email') }}"
                                                            required autofocus autocomplete="username">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ __('dashboard.Password') }}</label> <input
                                                            class="form-control"
                                                            placeholder="{{ __('dashboard.Enter your password') }}"
                                                            type="password" name="password" required>
                                                    </div><button
                                                        class="btn btn-main-primary btn-block">{{ __('dashboard.Sign In') }}</button>
                                                    <div class="row row-xs">
                                                        <div class="col-sm-6">
                                                            <button class="btn btn-block"><i class="fab fa-facebook-f"></i>
                                                                {{ __('dashboard.Signup with Facebook') }}</button>
                                                        </div>
                                                        <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                            <button class="btn btn-info btn-block"><i
                                                                    class="fab fa-twitter"></i>
                                                                {{ __('dashboard.Signup with Twitter') }}</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>


                                            <div class="mt-5 main-signin-footer">
                                                <p><a href="">{{ __('dashboard.Forgot password?') }}</a></p>
                                                <p>{{ __('dashboard.Don\'t have an account?') }}
                                                    <a href="{{ url('/' . ($page = 'signup')) }}">
                                                        {{ __('dashboard.Create an Account') }}
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#login_chooser').change(function() {
            var myID = $(this).val();
            $('.login_panel').each(function() {
                myID === $(this).attr('id') ? $(this).show() : $(this).hide();
            });
        });
    </script>
@endsection
