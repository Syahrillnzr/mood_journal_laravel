<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserListController extends Controller
{
   public function index()
    {
        $users = User::where('role', 0)->get(); // role 0 = normal users
        $admins = User::where('role', 1)->get(); // role 1 = admins

        return view('admin.lists.index', compact('users', 'admins'));
    }

    public function create()
    {
        return view('admin.lists.create');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name'  => 'required|string|max:50',
    //         'email'  => 'required|string|max:10',
    //         'role' => 'required|string|max:50',
    //     ]);

    //     User::create([
    //         'name'  => $request->name,
    //         'icon'  => $request->icon,
    //         'color' => $request->color,
    //     ]);

    //     return redirect()
    //         ->route('admin.moods.index')
    //         ->with('success', 'Mood added successfully.');
    // }

    public function edit(User $list)
    {
        return view('admin.lists.edit', compact('list'));
    }

    // public function update(Request $request, User $mood)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:100',
    //         'icon' => 'nullable|string|max:50',
    //         'color' => 'nullable|string|max:50',
    //     ]);

    //     $mood->update($request->all());

    //     return redirect()->route('admin.moods.index')
    //         ->with('success', 'Mood updated successfully');
    // }

    public function destroy(User $list)
    {
        $list->delete();

        return redirect()->route('admin.lists.index')
            ->with('success', 'User deleted successfully');
    }
}
