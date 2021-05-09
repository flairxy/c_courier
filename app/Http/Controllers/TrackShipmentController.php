<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Shipment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Error;

class TrackShipmentController extends Controller
{

    public function index()
    {
        return view('track-shipment');
    }
    public function abort()
    {
        return back();
    }

    public function track(Request $request)
    {
        $shipment = Shipment::where('tracking_no', $request->number)->first();
        if (!$shipment) {
            return back();
        }
        $shipment->pickup_date = Carbon::parse($shipment->pickup_date)->toFormattedDateString();

        return view('track', ['shipment' => $shipment]);
    }


}
