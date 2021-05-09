@extends('layouts.master')

@section('content')
<div class="content">

    <!-- Login Form -->
    <div class="row justify-content-center px-5">
        <div class="col-sm-8 col-md-6 col-xl-4 mt-4">
            <div class="py-30 px-5 text-center text-white">
                <a class="font-w700" href="/">
                    <span>
                        <img style="width: 90%" src="{{asset('logoWhite.png')}}" alt="logo">
                    </span>
                </a>

            </div>
            <div class="mycard">
                <!-- Header -->
                <h1 class="h2 font-w700 p-30 text-white">Reset Password</h1>
                <!-- END Header -->
                <form class="js-validation-reminder text-white px-30" action="{{ route('password.update') }}"
                    method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating mt-20">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                                    autofocus>
                                <label for="reminder-credential">{{ __('E-Mail Address') }}</label>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-material floating">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">
                                <label for="password">{{ __('Password') }}</label>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-material floating">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn my-btn btn-block btn-noborder">
                            <i class="fa fa-asterisk mr-10"></i> {{ __('Reset Password') }}
                        </button>
                        <div class="mt-30 pb-4">
                            <a class="link-effect cl1 text-muted mr-10 mb-5 d-inline-block" href="{{route('login')}}">
                                <i class="fa fa-user text-muted mr-5"></i> Login
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END Login Form -->
</div>
<!-- END Page Content -->
<!-- END Page Content -->
<style>
    .hidden-form,
    #processing,
    #invalidCode,
    #authenticate {
        display: none
    }

    .mycard {
        border-radius: 4px;
        margin-bottom: 15px;
        border: none;
        vertical-align: top;
        background: rgb(255, 255, 255) !important;
        box-shadow: -1rem 0 3rem rgb(13, 53, 120) !important;
    }
</style>
@endsection
