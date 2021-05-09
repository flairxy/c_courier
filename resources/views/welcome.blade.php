@extends('layouts.funky')
@section('title', 'welcome')

@section('content')
<div class="content__inner">
    <div class="content__middle">
        <div class="marginator margin-top-0">
            <div class="tall-landing-page-hero background-blue">
                <div class="tall-landing-page-hero__inner">

                    <div class="tall-landing-page-hero__container">
                        <h1 class="tall-landing-page-hero__title">Final Year Courier Project</h1>

                    </div>



                    <form class="f2-form f2-form--horizontal track-a-package" action="{{route('track')}}" method="post">
                        @csrf
                        <div class="f2-form__fields f2-form--horizontal__fields">
                            <div class="f2-form__field f2-form--horizontal__field ">


                                <div class="f2-text-field"> <label class="f2-text-field__label"
                                        for="9180dd27-26ed-477f-ac82-6d24181599f4">Tracking Id:</label>
                                    <input class="f2-text-field__field" type="text"
                                        id="9180dd27-26ed-477f-ac82-6d24181599f4" name="number" />
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="f2-form__submit f2-form--horizontal__submit">Track
                            Shipment</button>
                    </form>

                </div>
            </div>
        </div>

        <div class="marginator margin-top-0">
            <div class="headline-with-cta">
                <h1 class="headline-with-cta__title ">
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
