<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminUsersController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function getUsers()
    {
        $users = User::where('is_admin', user::USER)->get();
        return response($users);
    }

    public function updateUserApplicationStatus(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $user->save();
        return response([
            'status' => 'success',
            'message' => 'Application status update successful'
        ]);
    }

    public function delete($id)
    {

        $user = User::findOrFail($id);
        $user->delete();
        return response([
            'status' => 'success',
            'message' => 'User deleted successfully'
        ]);
    }

}
