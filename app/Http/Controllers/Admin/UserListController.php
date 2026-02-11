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
            'status' => 'required|in:0,1',


        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => (int) $request->role,
            'status' => (int) $request->status,
        ]);

        $roleName = match ($user->role) {
            1 => 'Admin',
            2 => 'Blog Manager',
            default => 'User',
        };

        return redirect()->route('admin.lists.index')->with('success', 'User added!');
    }

    public function edit(User $list)
    {
        return view('admin.lists.edit', compact('list'));
    }

    public function update(Request $request, User $list)
    {
        // Validate that the role and status are within the correct ranges
        $validated = $request->validate([
            'status' => 'required|in:0,1',
            'role'   => 'required|in:0,1,2', 
        ]);

        // Update the user
        $list->update($validated);

        // Redirect back to the index table
        return redirect()->route('admin.lists.index')
                        ->with('success', "User '{$list->name}' updated successfully!");
    }


        public function show(User $list)
    {
        // For now, just redirect back to the index or edit page
        return redirect()->route('admin.lists.edit', $list->id);
    }

    public function destroy(User $list)
    {
        $list->delete();

        return redirect()->route('admin.lists.index')
            ->with('success', 'User deleted successfully');
    }
}
