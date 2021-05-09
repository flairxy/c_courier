@extends('layouts.funky')
@section('title', 'Tracking')

@section('content')
<div class="content__inner">
    <div class="content__top">

    </div>
    <div class="content__middle">


        <div class="marginator margin-top-0">
            <div
                class="landing-page-hero background-angled background-angled--bottom-left background-blue background-overlay ">
                <div class="container">
                    <h1 class="landing-page-hero__title">Tracking</h1>
                    <p class="landing-page-hero__subtitle"></p>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    &nbsp;
                </div>
                <div class="col-md-5">
                    &nbsp;
                </div>
            </div>
            <form action="{{route('track')}}" method="post">
                @csrf
                <div class="container">

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3 style="margin-bottom: 0rem;">Track Your Shipment</h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="input-group">
                                <label>Tracking ID:</label>
                                <input name="number" class="form-control" type="text">
                            </div>
                        </div>
                        {{-- <div class="col-md-3">
                            <div class="datepicker--container input-group">
                                <label>Pick-Up Date:</label>
                                <input type="text" name="vcpickup" style="height: 36px" placeholder="MM/DD/YYYY"
                                    class="jq-ui-datepicker input-datepicker hasDatepicker" data-language="en"
                                    id="dp1607077244532">
                            </div>
                        </div> --}}
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button class="btn button-primary" type="submit" value="Track" height="32px">
                                Track
                            </button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <div class="content__bottom">
    </div>
    <br>
</div>
@endsection
