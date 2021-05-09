@extends('layouts.master')

@section('content')
<div class="content">

    <!-- Login Form -->
    <div class="row justify-content-center px-5">
        <div class="col-sm-8 col-md-6 col-xl-4 mt-4">
            <div class="py-30 px-5 text-center">
                <a class="font-w700" href="/">
                    <span>
                        <img style="width: 90%" src="{{asset('logoWhite.png')}}" alt="logo">
                    </span>
                </a>

            </div>
            <div class="mycard">
                <!-- Header -->
                <h1 class="h2 font-w700 px-30 py-20 ">Register</h1>
                <!-- END Header -->
                <form class="js-validation-signup px-30" method="POST" action="{{ route('register') }}"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating mt-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="signup-name" name="name" required>
                                <label for="signup-name">Fullname</label>
                                @error('name')
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
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="signup-email" name="email" required>
                                <label for="signup-email">Email</label>
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
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="signup-password" name="password" required>
                                <label for="signup-password">Password</label>
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
                            <div class="form-material floating">
                                <input type="password" class="form-control" id="signup-password-confirm"
                                    name="password_confirmation" required>
                                <label for="signup-password-confirm">Password Confirmation</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div id="processing" class="col-6 col-md-3">
                            <i class="fa fa-2x fa-cog fa-spin text-primary"></i>
                        </div>
                        <button id="register" type="submit" class="btn my-btn btn-block  btn-noborder">
                            <i class="fa fa-plus mr-10"></i> Register
                        </button>
                        <div class="mt-30 pb-4">
                            <a class="link-effect cl1 text-muted mr-10 mb-5 d-inline-block" href="{{'login'}}">
                                <i class="fa fa-user text-muted mr-5"></i> Login
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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
        vertical-align: top;
        padding: 0px 20px 0px 20px;
        box-shadow: -1rem 0 3rem rgb(13, 53, 120) !important;
        padding: 0px 20px 0px 20px;
    }
</style>
@endsection
@section('script')
<script>
    $(document).ready(function () {


            $('form').submit(function (e) {
                $('#register').hide();
                $('#processing').show();

            })
        });
</script>
@endsection
