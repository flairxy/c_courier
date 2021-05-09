<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::where('is_admin', false)->where('is_manager', false)->paginate(10);
        foreach ($users as $user) {
            $transactions = Transaction::whereStatus(true)->whereUserId($user->id)->get();
            $user->total_transactions = count($transactions);
        }
        return view('admin.users.index', ['users' => $users]);
    }

    public function destroy($id)
    {
        if (!Auth::user()->is_admin) {
            Alert::error('Error!', 'Unauthorized Action');
            return redirect()->back();
        }
        $user = User::find($id);
        $user->delete();
        Alert::success('Success!', 'User deleted successfully');
        return redirect()->back();
    }

    // the functions below are for managers

    public function managers()
    {
        $users = User::where('is_manager', true)->paginate(10);
        return view('admin.users.managers.index', ['users' => $users]);
    }

    public function createManager(Request $request)
    {
        if (!Auth::user()->is_admin) {
            Alert::error('Error!', 'Unauthorized Action');
            return redirect()->back();
        }
        return view('admin.users.managers.create');
    }

    public function storeManager(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
        ]);
        if (!Auth::user()->is_admin) {
            Alert::error('Error!', 'Unauthorized Action');
            return redirect()->back();
        }
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $data['is_manager'] = true;

        User::Create($data);
        $users = User::where('is_manager', true)->paginate(10);
        Alert::success('Success!', 'Manager created successfully');
        return view('admin.users.managers.index', compact('users'));
    }

    public function editManager($id)
    {
        $this->checkAuthorization();
        $manager = User::find($id);
        return view('admin.users.managers.edit', compact('manager'));
    }
    public function updateManager(Request $request, $id)
    {
        if (!Auth::user()->is_admin) {
            Alert::error('Error!', 'Unauthorized Action');
            return redirect()->back();
        }
        $manager = User::find($id);
        $manager->update($request->all());
        Alert::success('Success!', 'Manager updated successfully');
        return redirect()->back();
    }
    public function destroyManager($id)
    {

        return $this->destroy($id);
    }
}
