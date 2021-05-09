<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shipment;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $shipments = Shipment::all();
        return view('admin.index', [
            'total_shipments' => count($shipments),
            'total_pending_shipments' => count($shipments->where('is_received', Shipment::NOT_RECEIVED)->where('has_paid', Shipment::PAID)),
            'revenue' => Transaction::whereStatus(true)->sum('amount'),
            'total_delivered_shipments' => count($shipments->where('is_received', Shipment::RECEIVED)),
            'users' => count(User::where('is_admin', false)->get())
        ]);

    }

}
