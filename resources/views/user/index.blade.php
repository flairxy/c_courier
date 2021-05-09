@extends('layouts.user_sidebar')

@section('content')

<div class="block-content block-content-full">
    <a href="{{ route('user.shipments.create') }}" type="button" class="btn btn-alt-info">Create
        Shipment</a>
</div>

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
</div>


{{-- <div class="modal fade" id="modal-slideup" tabindex="-1" role="dialog" aria-labelledby="modal-slideup"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-slideup" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Terms &amp; Conditions</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing
                        luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor
                        tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum
                        quis in sit varius lorem sit metus mi.</p>
                    <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing
                        luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor
                        tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum
                        quis in sit varius lorem sit metus mi.</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-alt-success" data-dismiss="modal">
                    <i class="fa fa-check"></i> Perfect
                </button>
            </div>
        </div>
    </div>
</div> --}}

@endsection
