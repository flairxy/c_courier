<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Shipment;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function getApplication()
    {
        $application = Application::whereUserId(Auth::user()->id)->first();
        $application->transaction;
        return response($application);
    }
}
