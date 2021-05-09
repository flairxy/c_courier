<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shipment;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class AdminShipmentController extends Controller
{
    public function pending()
    {

        $shipments = Shipment::where('has_paid', true)->where('is_received', false)->paginate(10);
        foreach ($shipments as $shipment) {
            $shipment->owner = User::find($shipment->user_id);
        }
        return view('admin.shipments.pending', ['shipments' => $shipments]);
    }
    public function delivered()
    {

        $shipments = Shipment::where('has_paid', true)->where('is_received', true)->paginate(10);
        foreach ($shipments as $shipment) {
            $shipment->owner = User::find($shipment->user_id);
        }
        return view('admin.shipments.delivered', ['shipments' => $shipments]);
    }

    public function create()
    {
        return view('admin.shipments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sender_name' => 'required',
            'sender_address' => 'required',
            'sender_state' => 'required',
            'sender_phone' => 'required',
            'receiver_name' => 'required',
            'receiver_address' => 'required',
            'receiver_state' => 'required',
            'receiver_phone' => 'required',
            'receiver_email' => 'required',
            'description' => 'required',
        ]);

        $data = $request->except(['isPickupAddress']);
        $data['user_id'] = $request->user_id;
        $data['pickup_state'] = $request->pickup_state ?? $request->sender_state;
        $data['pickup_address'] = $request->pickup_state ?? $request->sender_address;
        $data['tracking_no'] = 'CCC' . $this->randomNumber(7);
        $shipment = Shipment::create($data);

        $transaction = Transaction::create([
            'shipment_id' => $shipment->id,
            'user_id' => $shipment->user_id,
            'amount' => 1500,
        ]);
    }

    public function edit($id)
    {
        $shipment = Shipment::find($id);
        return view('admin.shipments.edit', compact('shipment'));
    }

    public function update(Request $request, $id)
    {

        $shipment = Shipment::find($id);
        $data = $request->except(['isPickupAddress']);
        $data['pickup_state'] = $request->pickup_state ?? $request->sender_state;
        $data['pickup_address'] = $request->pickup_state ?? $request->sender_address;
        $shipment->update($data);

        $transaction = Transaction::whereShipmentId($id)->first();

        return view('admin.pay', [
            'shipment_id' => $shipment->id,
            'transaction_id' => $transaction->id,
            'amount' => $transaction->amount * 100,
            'user' => Auth::user(),
        ]);
    }


    public function randomNumber($length)
    {
        $result = '';
        for ($i = 0; $i < $length; ++$i) {
            $result .= mt_rand(0, 9);
        }

        return $result;
    }

    public function callback(Request $request)
    {
        $paymentDetails = json_decode($request->paystack_data);

        if ($paymentDetails->status === 'success' && $paymentDetails->message === 'Approved') {
            Transaction::whereId($request->transaction_id)->update([
                'status' => true,
                'reference' => $paymentDetails->reference
            ]);

            Shipment::whereId($request->shipment_id)->update([
                'has_paid' => true
            ]);

            return $this->index();
        }
    }

    public function pickup($id)
    {

        $shipment = Shipment::find($id);
        $shipment->update(['pickup_date' => Carbon::now()]);
        Alert::success('Success!', 'Shipment pickup successful');
        return redirect()->back();
    }
    public function dispatch($id)
    {

        $shipment = Shipment::find($id);
        $shipment->update(['is_dispatched' => true]);
        Alert::success('Success!', 'Shipment dispatch successful');
        return redirect()->back();
    }
    public function isDelivered($id)
    {

        $shipment = Shipment::find($id);
        $shipment->update(['is_received' => true]);
        Alert::success('Success!', 'Shipment delivered successfully');
        return redirect()->back();
    }

    public function destroy($id)
    {
        if (!Auth::user()->is_admin) {
            Alert::error('Error!', 'Unauthorized Action');
            return redirect()->back();
        }
        $shipment = Shipment::find($id);
        $shipment->delete();
        Alert::success('Success!', 'Shipment deleted successfully');
        return redirect()->back();
    }
}
