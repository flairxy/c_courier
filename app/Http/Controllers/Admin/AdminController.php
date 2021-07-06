<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Application;
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
        $applications = Application::all();
        return view('admin.index', [
            'total_applications' => count($applications),
            'total_unapproved_applications' => count($applications->where('is_approved', Application::UNAPPROVED)->where('is_paid', Application::PAID)),
            'total_approved_applications' => count($applications->where('is_approved', Application::APPROVED)->where('is_paid', Application::PAID)),
            'revenue' => Transaction::whereStatus(true)->sum('amount'),
            'users' => count(User::where('is_admin', false)->get())
        ]);
    }
}
