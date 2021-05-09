@extends('layouts.master')

@section('content')
{{--    <main id="main-container">--}}
<!-- Page Content -->
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
                <h1 class="h2 font-w700 p-30 b-black">Login</h1>
                <!-- END Header -->
                <div class="">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @elseif (session('info'))
                    <div class="alert alert-info">
                        {{ session('status') }}
                    </div>
                    @elseif (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                </div>

                <form class="js-validation-signin px-30" action="{{ route('login') }}" method="POST" id="login">
                    @csrf
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating mt-20">
                                <label for="login-username" class="b-black">Email</label>
                                <input type="text" class="form-control  @error('email') is-invalid @enderror"
                                    name="email" id="login-username" value="{{ old('email') }}" autofocus required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                <label for="login-password" class="b-black">Password</label>
                                <input type="password" class="form-control" id="login-password" name="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="hidden-form">
                                <label for="code">Authentication Code</label>
                                <input type="text" class="form-control" id="code" name="code">
                                <span class="text-danger" role="alert" id="invalidCode">
                                    <strong>Invalid Aithentication Code</strong>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" {{ old('remember') ? 'checked' : '' }}
                                    class="custom-control-input" id="remember" name="remember">
                                <label class="custom-control-label" for="remember">Remember Me</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group pb-4">
                        <div id="processing" class="col-6 col-md-3">
                            <i class="fa fa-2x fa-cog fa-spin text-primary"></i>
                        </div>
                        <button id="notProc" type="submit" class="btn my-btn btn-block btn-noborder">
                            <i class="si si-login mr-10"></i> Login
                        </button>

                        <div class="row gutters-tiny mt-30">
                            <a class="link-effect cl1 text-muted mr-10 mb-5 d-inline-block" href="{{'register'}}">
                                <i class="fa fa-plus mr-5"></i> Register
                            </a>
                            <a class="link-effect cl1 text-muted mr-10 mb-5 d-inline-block"
                                href="{{ route('password.request') }}">
                                <i class="fa fa-warning mr-5"></i> Forgot Password
                            </a>
                        </div>
                    </div>
                </form>
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
        background: rgb(255, 255, 255) !important;
        transition: all .4s;
        padding: 0px 20px 0px 20px;
        vertical-align: top;
        box-shadow: -1rem 0 3rem rgb(13, 53, 120) !important;

    }
</style>
@endsection
