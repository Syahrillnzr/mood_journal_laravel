<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\MoodEntry;
use App\Models\Mood;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AnalysisController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Total entries
        $totalEntries = MoodEntry::where('user_id', $userId)->count();

        // Most frequent mood
        $mostFrequent = MoodEntry::with('mood')
            ->where('user_id', $userId)
            ->select('mood_id', DB::raw('count(*) as count'))
            ->groupBy('mood_id')
            ->orderByDesc('count')
            ->first();

        // Current streak
        $streak = 0;
        $date = Carbon::today();
        while (MoodEntry::where('user_id', $userId)->whereDate('created_at', $date)->exists()) {
            $streak++;
            $date->subDay();
        }

        // Longest streak
        $longestStreak = 0;
        $currentStreak = 0;
        $entries = MoodEntry::where('user_id', $userId)
            ->orderBy('created_at')
            ->pluck('created_at')
            ->map(fn($d) => Carbon::parse($d)->toDateString())
            ->unique()
            ->values();

        for ($i = 0; $i < $entries->count(); $i++) {
            if ($i === 0) {
                $currentStreak = 1;
            } else {
                $prev = Carbon::parse($entries[$i - 1]);
                $curr = Carbon::parse($entries[$i]);
                if ($prev->diffInDays($curr) === 1) {
                    $currentStreak++;
                } else {
                    $currentStreak = 1;
                }
            }
            $longestStreak = max($longestStreak, $currentStreak);
        }

        // Mood distribution (for donut chart)
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
                'percentage' => $totalEntries > 0 ? round(($e->count / $totalEntries) * 100) : 0,
            ]);

        // Mood over time - last 30 days (for line chart)
        $last30Days = collect(range(29, 0))->map(fn($i) => Carbon::today()->subDays($i));
        $moodOverTime = $last30Days->map(fn($date) => [
            'date' => $date->format('M d'),
            'count' => MoodEntry::where('user_id', $userId)->whereDate('created_at', $date)->count(),
        ]);

        // Mood calendar - current month
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $calendarEntries = MoodEntry::with('mood')
            ->where('user_id', $userId)
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->get()
            ->groupBy(fn($e) => Carbon::parse($e->created_at)->day)
            ->map(fn($entries) => $entries->first()->mood);

        // Day of week pattern
        $dayLabels = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        $dayOfWeek = collect(range(0, 6))->map(fn($day) => [
            'day' => $dayLabels[$day],
            'count' => MoodEntry::where('user_id', $userId)
                ->whereRaw('DAYOFWEEK(created_at) = ?', [$day + 1])
                ->count(),
        ]);

        // This month vs last month
        $thisMonth = MoodEntry::where('user_id', $userId)
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        $lastMonth = MoodEntry::where('user_id', $userId)
            ->whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->whereYear('created_at', Carbon::now()->subMonth()->year)
            ->count();

        $thisMonthFrequent = MoodEntry::with('mood')
            ->where('user_id', $userId)
            ->whereMonth('created_at', Carbon::now()->month)
            ->select('mood_id', DB::raw('count(*) as count'))
            ->groupBy('mood_id')
            ->orderByDesc('count')
            ->first();

        $lastMonthFrequent = MoodEntry::with('mood')
            ->where('user_id', $userId)
            ->whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->select('mood_id', DB::raw('count(*) as count'))
            ->groupBy('mood_id')
            ->orderByDesc('count')
            ->first();

        return view('user.analysis', compact(
            'totalEntries', 'mostFrequent', 'streak', 'longestStreak',
            'moodDistribution', 'moodOverTime', 'calendarEntries',
            'dayOfWeek', 'thisMonth', 'lastMonth',
            'thisMonthFrequent', 'lastMonthFrequent'
        ));
    }
}