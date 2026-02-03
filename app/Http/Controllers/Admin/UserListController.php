<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserListController extends Controller
{
   public function index()
    {
        $users = User::where('role', 0)->get(); // role 0 = normal users
        $admins = User::where('role', 1)->get(); // role 1 = admins
        $blogs = User::where('role', 2)->get(); // role 2 = blog manager

        return view('admin.lists.index', compact('users', 'admins','blogs'));
    }

    public function create()
    {
        return view('admin.lists.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:0,1,2',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => (int) $request->role,
            'is_active' => 1,
        ]);

        $roleName = match ($user->role) {
            1 => 'Admin',
            2 => 'Blog Manager',
            default => 'User',
        };

        return redirect()->back()->with('success', "$roleName added successfully");
    }

    public function edit(User $list)
    {
        return view('admin.lists.edit', compact('list'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'status' => 'required|in:0,1',
        ]);

        $user->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Status updated successfully');
    }


    public function destroy(User $list)
    {
        $list->delete();

        return redirect()->route('admin.lists.index')
            ->with('success', 'User deleted successfully');
    }
}
