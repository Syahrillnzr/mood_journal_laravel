<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mood;
use App\Models\User;
use App\Models\MoodEntry;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class UserDashboardController extends Controller
{
public function index()
    {
        $userId = Auth::id();

        $moods = Mood::where('is_active', 1)->get();

        // Total entries
        $totalEntries = MoodEntry::where('user_id', $userId)->count();

        // Most frequent mood
        $mostFrequent = MoodEntry::with('mood')
            ->where('user_id', $userId)
            ->select('mood_id', \DB::raw('count(*) as count'))
            ->groupBy('mood_id')
            ->orderByDesc('count')
            ->first();

        // Current streak (consecutive days with at least 1 entry)
        $streak = 0;
        $date = Carbon::today();
        while (
            MoodEntry::where('user_id', $userId)
                ->whereDate('created_at', $date)
                ->exists()
        ) {
            $streak++;
            $date->subDay();
        }

        $recentEntries = MoodEntry::with('mood')
        ->where('user_id', $userId)
        ->latest()
        ->take(5)
        ->get();


        // Mood distribution
        $moodDistribution = MoodEntry::with('mood')
            ->where('user_id', $userId)
            ->select('mood_id', DB::raw('count(*) as count'))
            ->groupBy('mood_id')
            ->get()
            ->map(fn($e) => [
                'name' => $e->mood->name,
                'icon' => $e->mood->icon,
                'color' => $e->mood->color,
                'count' => $e->count,
            ]);

        // Mood over time (last 7 days)
        $last7Days = collect(range(6, 0))->map(fn($i) => Carbon::today()->subDays($i));
        $moodOverTime = $last7Days->map(fn($date) => [
            'date' => $date->format('M d'),
            'count' => MoodEntry::where('user_id', $userId)->whereDate('created_at', $date)->count(),
        ]);

        return view('user.dashboard', compact(
            'moods', 'totalEntries', 'mostFrequent', 'streak',
            'recentEntries','moodDistribution', 'moodOverTime'
        ));
    }


}
