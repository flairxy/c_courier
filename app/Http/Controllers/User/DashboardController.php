<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shipment;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $shipments = Shipment::whereUserId(Auth::user()->id)->get();
        return view('user.index', [
            'total_shipments' => count($shipments),
            'total_pending_shipments' => count($shipments->where('is_received', Shipment::NOT_RECEIVED)->where('has_paid', Shipment::PAID)),
            'total_delivered_shipments' => count($shipments->where('is_received', Shipment::RECEIVED)),
        ]);
    }
}
