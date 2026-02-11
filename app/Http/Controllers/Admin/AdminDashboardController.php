<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Mood;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.admindash', [
            'totalUsers' => User::count(),
            'recentUsers' => User::latest()->take(5)->get(),
            'recentMood' => Mood::latest()->take(2)->get(),
            'activeUsers' => User::where('status', 1)->count(),
            'newSignups' => User::whereMonth('created_at', now()->month)
                            ->whereYear('created_at', now()->year)
                            ->count(),
        ]);
    }
}
