@extends('layouts.admin_sidebar')

@section('content')

<div class="block-content">

    <div class="table-responsive" v-if="seeSoftware">
        <table class="js-table-sections table table-hover js-table-sections-enabled" v-if="investments.length > 0">
            <thead>
                <tr style="color: #3f9ce8;">
                    <th class="text-capitalize">#</th>
                    <th class="text-capitalize">Tracking ID</th>
                    <th class="text-capitalize">Account</th>
                    <th class="text-capitalize">Pickup status</th>
                    <th class="text-capitalize">Dispatch status</th>
                    <th class="text-capitalize">Payment Status</th>
                    <th class="text-capitalize">Delivery Status</th>
                </tr>
            </thead>
            <tbody class="js-table-sections-header tridax-grey">

                @foreach ($shipments as $shipment)

                <tr>
                    <td class="text-center">{{ $loop->index + 1 }}</td>
                    <td class="font-size-sm">
                        {{ $shipment->tracking_no }}
                    </td>
                    <td>{{ $shipment->owner->email }}</td>
                    <td class="font-size-sm">
                        @if ($shipment->pickup_date == null)
                        <span class="text-danger">Awaiting</span>
                        @else
                        <span class="text-success">Success</span>
                        @endif
                    </td>
                    <td class="font-size-sm">
                        @if (!$shipment->is_dispatched)
                        <span class="text-danger">Awaiting</span>
                        @else
                        <span class="text-success">DISPATCHED</span>
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
                        <di class="row">
                            <a href="{{ route('admin.shipments.edit', $shipment->id) }}">
                                <i class="fa fa-eye text-info" class="btn btn-sm btn-info js-tooltip-enabled"
                                    data-toggle="tooltip" data-placement="top" title="View Shipment">
                                </i> </a>&nbsp;
                            <form method="POST" id="pickup" action="{{ route('admin.shipments.pickup', $shipment->id) }}">
                                @csrf
                                <i class="si si-basket text-danger font-w600 js-tooltip-enabled"
                                    onclick="handlePickup(this)"
                                    data-toggle="tooltip" data-placement="top" title="Pickup Shipment">

                                </i> &nbsp;
                            </form>

                            <form id="dispatch" method="POST" action="{{ route('admin.shipments.dispatch', $shipment->id) }}">
                                @csrf
                                <i class="si si-cursor text-success font-w600 js-tooltip-enabled"
                                    onclick="handleDispatch(this)" data-toggle="tooltip"
                                    data-placement="top" title="Dispatch Shipment">

                                </i> &nbsp;
                            </form>

                            <form id="delete" method="POST" action="{{ route('admin.shipments.destroy', $shipment->id) }}">
                                @csrf
                                <i class="fa fa-trash text-danger js-tooltip-enabled"
                                    onclick="handleDelete(this)"
                                    data-toggle="tooltip" data-placement="top" title="Delete Shipment">

                                </i> &nbsp;
                            </form>
                        </di>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $shipments->links() }}
    </div>
</div>
@endsection
@section('script')
<script>
    function handleDispatch() {
        confirm('Confirm dispatch of this shipment');
        $('form#dispatch').submit();
        return;
    }
    function handleDelete() {
        confirm('Are you sure you want to delete this shipment?');
        $('form#delete').submit();
        return;
    }
    function handlePickup(){
        confirm('Confirm pickup of this shipment from pickup location?')
        $('form#pickup').submit();
        return;
    }
</script>
@endsection
