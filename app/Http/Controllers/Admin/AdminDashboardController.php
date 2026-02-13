<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Mood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {

        $statusCounts = [
            'Active' => User::where('status', 1)->count(),
            'Inactive' => User::where('status', 0)->count(),
        ];

        $startDate = now()->subDays(29)->startOfDay();

        $userGrowth = User::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('count(*) as total')
            )
            ->where('created_at', '>=', $startDate)
            ->groupBy('date')
            ->orderBy('date')
            ->get();

            $dates = collect();
                for ($i = 0; $i < 30; $i++) {
                    $dates->push(now()->subDays(29 - $i)->format('Y-m-d'));
                }

            $growthData = $dates->map(function ($date) use ($userGrowth) {
                $found = $userGrowth->firstWhere('date', $date);
                return $found ? $found->total : 0;
            });


        return view('admin.admindash', [
            'totalUsers' => User::count(),
            'recentUsers' => User::latest()->take(5)->get(),
            'recentMood' => Mood::latest()->take(2)->get(),
            'activeUsers' => User::where('status', 1)->count(),
            'newSignups' => User::whereMonth('created_at', now()->month)
                            ->whereYear('created_at', now()->year)
                            ->count(),
            'statusCounts' => $statusCounts,
            'growthLabels' => $dates,
            'growthData' => $growthData,
        ]);
    }
}
