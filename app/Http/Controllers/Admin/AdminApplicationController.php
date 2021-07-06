<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class AdminApplicationController extends Controller
{
    public function index()
    {
        return view('admin.applications.index');
    }

    public function edit()
    {
        return view('admin.applications.edit');
    }

    public function fetchApplication($id)
    {
        $application = Application::find($id);
        $application->email = User::find($application->user_id)->email;
        return response($application);
    }

    public function applications()
    {
        $applications = Application::where('is_paid', Application::PAID)->get();
        return response($applications);
    }


    public function update(Request $request, $id)
    {

        $application = Application::find($id);
        $application->update([
            'is_approved' => $request->status
        ]);


        return response('Application status updated successfully');
    }

    public function delete($id)
    {

        $application = Application::findOrFail($id);
        $application->delete();
        return response([
            'status' => 'success',
            'message' => 'Application deleted successfully'
        ]);
    }
}
