<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MoodEntry;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->user()->id;
        $today  = Carbon::today();

        // Entry hari ni
        $todayEntry = MoodEntry::with('mood')
            ->where('user_id', $userId)
            ->whereDate('created_at', $today)
            ->latest()
            ->first();

        // Entries minggu ni
        $weekEntries = MoodEntry::with('mood')
            ->where('user_id', $userId)
            ->whereBetween('created_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ])
            ->orderByDesc('created_at')
            ->get();

        // Jumlah semua entries
        $totalEntries = MoodEntry::where('user_id', $userId)->count();

        // Streak - berapa hari berturut-turut
        $streak = $this->calculateStreak($userId);

        // 5 entries terkini
        $recentEntries = MoodEntry::with('mood')
            ->where('user_id', $userId)
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        return response()->json([
            'today_entry'    => $todayEntry,
            'week_entries'   => $weekEntries,
            'total_entries'  => $totalEntries,
            'streak'         => $streak,
            'recent_entries' => $recentEntries,
        ]);
    }

    private function calculateStreak($userId)
    {
        $streak = 0;
        $date   = Carbon::today();

        while (true) {
            $hasEntry = MoodEntry::where('user_id', $userId)
                ->whereDate('created_at', $date)
                ->exists();

            if (!$hasEntry) break;

            $streak++;
            $date->subDay();
        }

        return $streak;
    }
}