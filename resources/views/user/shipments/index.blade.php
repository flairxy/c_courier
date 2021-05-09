@extends('layouts.user_sidebar')

@section('content')
<div class="block-content block-content-full">
    <a href="{{ route('user.shipments.create') }}" type="button" class="btn btn-alt-info">Create
        Shipment</a>
</div>
<div class="block-content">

    <div class="table-responsive" v-if="seeSoftware">
        <table class="js-table-sections table table-hover js-table-sections-enabled" v-if="investments.length > 0">
            <thead>
                <tr style="color: #3f9ce8">
                    <th>#</th>
                    <th>Tracking ID</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                </tr>
            </thead>
            <tbody class="js-table-sections-header tridax-grey">

                @foreach ($shipments as $shipment)
                <tr>
                    <td class="text-center">{{ $loop->index + 1 }}</td>
                    <td class="font-size-sm">
                        @if ($shipment->pickup_date == null)
                        <span class="text-danger">Awaiting Pickup</span>
                        @else
                        $shipment->tracking_no
                        @endif
                    </td>
                    <td class="font-size-sm">
                        @if ($shipment->has_paid)
                        <span class="text-success">PAID</span>
                        @else
                        <span class="text-danger">UNPAID</span>
                        @endif
                    </td>
                    <td class="font-size-sm">
                        @if ($shipment->is_received)
                        <span class="text-success">DELIVERED</span>
                        @else
                        <span class="text-warning">PENDING</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('user.shipments.edit', $shipment->id) }}" class="badge badge-danger">view
                            more</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $shipments->links() }}
    </div>
</div>
@endsection
