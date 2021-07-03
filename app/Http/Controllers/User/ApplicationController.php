<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Image;

class ApplicationController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'state' => 'required',
            'ffirstname' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'flastname' => 'required',
            'flga' => 'required',
            'lga' => 'required',
            'fphone' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'passport' => 'required',
            'certificate' => 'required',
        ]);

        $user = Auth::user();
        $data = $request->all();
        $data['user_id'] = $user->id;
        if ($request->hasFile('passport')) {
            $image = $request->file('passport');
            $filename = $user->id . '.' . $image->getClientOriginalExtension();
            $location = 'passports/' . $filename;
            $data['passport'] = $filename;
            Image::make($image)->resize(400, 400)->save($location);
        }

        if ($request->hasFile('certificate')) {
            $image = $request->file('certificate');
            $filename = $user->id . '.' . $image->getClientOriginalExtension();
            $location = 'certificates/' . $filename;
            $data['certificate'] = $filename;
            Image::make($image)->save($location);
        }
        $application = Application::create($data);

        $transaction = Transaction::create([
            'application_id' => $application->id,
            'user_id' => $application->user_id,
            'amount' => 5000,
        ]);

        return response([
            'transaction_id' => $transaction->id,
            'amount' => $transaction->amount * 100,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'state' => 'required',
            'ffirstname' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'flastname' => 'required',
            'flga' => 'required',
            'lga' => 'required',
            'fphone' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'gender' => 'required',
        ]);

        $user = Auth::user();
        $data = $request->all();
        if ($request->hasFile('passport')) {
            $image = $request->file('passport');
            $filename = $user->id . '.' . $image->getClientOriginalExtension();
            $location = 'passports/' . $filename;
            $data['passport'] = $filename;
            Image::make($image)->resize(400, 400)->save($location);
        }

        if ($request->hasFile('certificate')) {
            $image = $request->file('certificate');
            $filename = $user->id . '.' . $image->getClientOriginalExtension();
            $location = 'certificates/' . $filename;
            $data['certificate'] = $filename;
            Image::make($image)->save($location);
        }
        $application = Application::find($id);
        $application->update($data);

        $transaction = Transaction::whereApplicationId($application->id)->first();

        return response([
            'application_id' => $transaction->application_id,
            'transaction_id' => $transaction->id,
            'amount' => $transaction->amount * 100,
        ]);
    }

    public function confirmPayment(Request $request, $id)
    {
        Application::find($id)->update([
            'is_paid' => true
        ]);
        Transaction::whereApplicationId($id)->update([
            'reference' => $request->reference,
            'status' => true
        ]);
        return response('success!');
    }

    public function callback(Request $request)
    {
        $paymentDetails = json_decode($request->paystack_data);

        if ($paymentDetails->status === 'success' && $paymentDetails->message === 'Approved') {
            Transaction::whereId($request->transaction_id)->update([
                'status' => true,
                'reference' => $paymentDetails->reference
            ]);

            Application::whereId($request->application_id)->update([
                'is_paid' => true
            ]);

            return $this->index();
        }
    }
}
