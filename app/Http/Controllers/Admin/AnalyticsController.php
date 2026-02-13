<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mood;

class AnalyticsController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $activeUsers = User::where('status', 1)->count();
        $inactiveUsers = User::where('status', 0)->count();

        $admins = User::where('role', 1)->count();
        $blogManagers = User::where('role', 2)->count();
        $normalUsers = User::where('role', 0)->count();

        $roleCounts = [
        'User' => User::where('role', 0)->count(),
        'Admin' => User::where('role', 1)->count(),
        'Blog Manager' => User::where('role', 2)->count(),
        ];

        $statusCounts = [
            'Active' => User::where('status', 1)->count(),
            'Inactive' => User::where('status', 0)->count(),
        ];

        return view('admin.analysis', compact(
            'totalUsers',
            'activeUsers',
            'inactiveUsers',
            'admins',
            'blogManagers',
            'normalUsers',
            'roleCounts', 
            'statusCounts'
        ));
    }
}
