<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function listOwners()
    {
        $owners = User::where('role', 'owner')->get();
        return view('admin.owners.index', compact('owners'));
    }

    public function createOwner(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'owner',
        ]);

        return redirect()->route('admin.owners')->with('success', '店舗代表者が作成されました');
    }

    public function showCreateForm()
    {
        return view('admin.owners.create');
    }
}
