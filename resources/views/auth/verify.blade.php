@extends('layouts.master')

@section('content')

<div class="content">

    <!-- Login Form -->
    <div class="row justify-content-center px-5">
        <div class="col-sm-12 col-md-12 col-xl-8 mt-4">


            <div class="block block-transparent">
                <div class="block-header">
                    <h3 class="block-title text-white">{{ __('Verify Your Email Address') }}</h3>
                </div>
                <div class="block-content text-white">
                    <p>@if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }}, <a
                            href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
