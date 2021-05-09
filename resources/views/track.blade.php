@extends('layouts.funky')
@section('title', 'Tracking')

@push('styles')
<link href="{{ asset('ext3/style.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="content__inner">
    <div class="content__top">

    </div>
    <div class="content__middle">


        <div class="marginator margin-top-0">
            <div
                class="landing-page-hero background-angled background-angled--bottom-left background-blue background-overlay">
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
                                <label>Tracking No:</label>
                                <input name="number" class="form-control" "type=" text" size="9" maxlength="9">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button class="btn button-primary" type="submit" value="Track" height="32px">
                                Track
                            </button>
                        </div>
                    </div>
                </div>

                <div class="container">
                    @if($shipment)
                    <div class="sidebar-page-container">
                        <div class="auto-container">
                            <div class="row">
                                <section class="invoice col-md-12">

                                    <div class="">
                                        <div class="row invoice-info">
                                            <div class="col-sm-4 invoice-col">
                                                <h5>Receiver Information</h5>

                                                <b>Receiver:</b> {{ $shipment->receiver_name }} <br>
                                                <b>Address:</b> {{ $shipment->receiver_address }} <br>
                                                <b>Phone:</b> {{ $shipment->receiver_phone }} <br>
                                                <b>Email:</b> {{ $shipment->receiver_email }}
                                                <br> <br>
                                                <b>STATUS:</b>
                                                @if ($shipment->is_dispatched && $shipment->is_received)
                                                <span class="text-success">DELIVERED</span>
                                                @elseif($shipment->is_dispatched && !$shipment->is_received)
                                                <span class="text-danger">IN TRANSIT...</span>
                                                @endif
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 invoice-col">
                                                <h5>Sender Information</h5>
                                                <b>Tracking ID: {{ $shipment->tracking_no }} </b><br>

                                                <b>Name:</b> {{ $shipment->sender_name }} <br>
                                                <b>Address:</b> {{ $shipment->sender_address }} <br>
                                                <b>Phone:</b> {{ $shipment->sender_phone }} <br>
                                                <b>Parcel Description:</b> {{ $shipment->description }} <br>

                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-2 invoice-col"></div>
                                        </div>
                                        <div class="row">

                                        </div>

                                    </div>

                                </section>
                            </div>
                        </div>
                    </div>
                    @else
                    <h4>Shipment Not Found</h4>
                    @endif
                </div>
            </form>

        </div>
    </div>
    <div class="content__bottom">
    </div>
    <br>
</div>
@endsection
<script type="text/javascript">
    // blink on state

	function show()
	{

	if(document.getElementById)

	document.getElementById("blink1").style.visibility ="visible";


	}
	// blink off stat
	function hide()
	{
	if(document.getElementById)

	document.getElementById("blink1").style.visibility ="hidden";


	}
	// toggle on and off states evry 450ms to achive

	for(var i=900; i<9000000; i=i+900)

	{
	setTimeout("hide()",i);
	setTimeout("show()",i+450);


	}



</script>

<script type="text/javascript">
    // blink on state

	function show2()
	{

	if(document.getElementById)

	document.getElementById("blink2").style.visibility ="visible";


	}
	// blink off stat
	function hide2()
	{
	if(document.getElementById)

	document.getElementById("blink2").style.visibility ="hidden";


	}
	// toggle on and off states evry 450ms to achive

	for(var i=900; i<90000000; i=i+900)

	{
	setTimeout("hide2()",i);
	setTimeout("show2()",i+450);


	}


</script>
