@extends('layouts.funky')
@section('title', 'welcome')

@section('content')
<div class="content__inner">
    <div class="content__middle">
        <div class="marginator margin-top-0">
            <div class="tall-landing-page-hero background-blue">
                <div class="tall-landing-page-hero__inner">

                    <div class="tall-landing-page-hero__container">
                        <h1 class="tall-landing-page-hero__title">Final Year Project</h1>
                        <p>Indigen Application Managagement System</p>
                        @guest
                        <a type="button" href="{{ route('register') }}"
                            class="d-bg f2-form__submit f2-form--horizontal__submit">Get Started</a>
                        @else
                        <a type="button" href="/dashboard"
                            class="d-bg f2-form__submit f2-form--horizontal__submit">Dashboard</a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>

        <style>
            .d-bg {
                background-color: #140416;
                border-color: #140416
            }

            .d-bg:hover {
                background-color: #030103;
                border-color: #030103
            }

            .d-color {
                color: #240727
            }
        </style>

        <div class="marginator margin-top-0">
            <div class="headline-with-cta">
                <h1 class="headline-with-cta__title d-color" style="color: #240727">
                    About Project
                </h1>
                <div class="headline-with-cta__subtitle headline-with-cta__subtitle--large">
                    This project is aimed at ....&nbsp;<p>
                </div>
            </div>
        </div>
    </div>
    <div class="content__bottom">

    </div>
</div>

@endsection
