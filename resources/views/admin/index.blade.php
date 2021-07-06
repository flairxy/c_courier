@extends('layouts.admin_sidebar')

@section('content')

<div class="row js-appear-enabled animated fadeIn" data-toggle="appear">
    <!-- Row #1 -->
    <div class="col-6 col-xl-3">
        <a class="block block-link-shadow text-right" href="javascript:void(0)">
            <div class="block-content block-content-full clearfix">

                <div class="font-size-h3 font-w600 js-count-to-enabled" data-toggle="countTo" data-speed="1000"
                    data-to="1500">{{ $total_applications }}</div>
                <div class="font-size-sm font-w600 text-uppercase text-muted"> Total Applications</div>
            </div>
        </a>
    </div>
    <div class="col-6 col-xl-3">
        <a class="block block-link-shadow text-right" href="javascript:void(0)">
            <div class="block-content block-content-full clearfix">

                <div class="font-size-h3 font-w600"><span data-toggle="countTo" data-speed="1000" data-to="780"
                        class="js-count-to-enabled">{{ $total_unapproved_applications }}</span></div>
                <div class="font-size-sm font-w600 text-uppercase text-muted">Unapproved Applications</div>
            </div>
        </a>
    </div>
    <div class="col-6 col-xl-3">
        <a class="block block-link-shadow text-right" href="javascript:void(0)">
            <div class="block-content block-content-full clearfix">

                <div class="font-size-h3 font-w600 js-count-to-enabled" data-toggle="countTo" data-speed="1000"
                    data-to="15"> {{ $total_approved_applications }} </div>
                <div class="font-size-sm font-w600 text-uppercase text-muted">Approved Applications</div>
            </div>
        </a>
    </div>
    <div class="col-6 col-xl-3">
        <a class="block block-link-shadow text-right" href="javascript:void(0)">
            <div class="block-content block-content-full clearfix">

                <div class="font-size-h3 font-w600 js-count-to-enabled" data-toggle="countTo" data-speed="1000"
                    data-to="4252">₦{{ $revenue }}</div>
                <div class="font-size-sm font-w600 text-uppercase text-muted">Total Revenue</div>
            </div>
        </a>
    </div>
    <div class="col-6 col-xl-3">
        <a class="block block-link-shadow text-right" href="javascript:void(0)">
            <div class="block-content block-content-full clearfix">

                <div class="font-size-h3 font-w600 js-count-to-enabled" data-toggle="countTo" data-speed="1000"
                    data-to="4252"> {{ $users }}</div>
                <div class="font-size-sm font-w600 text-uppercase text-muted">Users</div>
            </div>
        </a>
    </div>
    <!-- END Row #1 -->
</div>
@endsection
