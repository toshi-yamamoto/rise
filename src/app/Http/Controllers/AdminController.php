<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOwnerRequest;
use App\Http\Requests\RegisterAdminRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

    public function createOwner(CreateOwnerRequest $request)
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

    public function showRegisterForm()
    {
        return view('admin.register');
    }

    public function register(RegisterAdminRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);

        return redirect()->route('admin.dashboard')->with('success', '新しい管理者が登録されました');
    }
}
