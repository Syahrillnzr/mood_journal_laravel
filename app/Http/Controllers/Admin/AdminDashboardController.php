<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.admindash', [
            'totalUsers' => User::count(),
            'recentUsers' => User::latest()->take(5)->get(),
        ]);
    }
}
