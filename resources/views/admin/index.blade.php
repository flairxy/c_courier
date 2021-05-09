@extends('layouts.admin_sidebar')

@section('content')

<div class="row">
    <div class="col-sm-6 col-xl-4">
        <a class="bottom-course" href="javascript:void(0)">
            <div class="block-content block-content-full clearfix">

                <div class="font-size-h3 font-w600 b-earth ">
                    <span data-toggle="countTo" data-speed="1000" class="js-count-to-enabled"> {{ $total_shipments }}
                    </span>
                </div>
                <div class="font-size-sm font-w600 text-uppercase text-muted">
                    Total Shipments
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-xl-4">
        <a class="bottom-course" href="javascript:void(0)">
            <div class="block-content block-content-full clearfix">

                <div class="font-size-h3 font-w600 b-earth ">
                    <span data-toggle="countTo" data-speed="1000" class="js-count-to-enabled">
                        {{ $total_pending_shipments }} </span>
                </div>
                <div class="font-size-sm font-w600 text-uppercase text-muted">
                    Pending Shipments
                </div>
            </div>
        </a>
    </div>

    <div class="col-sm-6 col-xl-4">
        <a class="bottom-course" href="javascript:void(0)">
            <div class="block-content block-content-full clearfix">
                <div class="font-size-h3 font-w600 b-earth ">
                    <span data-toggle="countTo" data-speed="1000" class="js-count-to-enabled">
                        {{ $total_delivered_shipments }} </span>
                </div>
                <div class="font-size-sm font-w600 text-uppercase text-muted">
                    Delivered Shipments
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-xl-4">
        <a class="bottom-course" href="javascript:void(0)">
            <div class="block-content block-content-full clearfix">
                <div class="font-size-h3 font-w600 b-earth ">
                    <span data-toggle="countTo" data-speed="1000" class="js-count-to-enabled">
                        ${{ $revenue }} </span>
                </div>
                <div class="font-size-sm font-w600 text-uppercase text-muted">
                    Total Revenue
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-xl-4">
        <a class="bottom-course" href="javascript:void(0)">
            <div class="block-content block-content-full clearfix">
                <div class="font-size-h3 font-w600 b-earth ">
                    <span data-toggle="countTo" data-speed="1000" class="js-count-to-enabled">
                        {{ $users }} </span>
                </div>
                <div class="font-size-sm font-w600 text-uppercase text-muted">
                    Users
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
