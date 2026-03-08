<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MoodEntry;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AnalysisController extends Controller
{
    // Analisis minggu ini
    public function weekly(Request $request)
    {
        $userId = $request->user()->id;
        $start  = Carbon::now()->startOfWeek();
        $end    = Carbon::now()->endOfWeek();

        $entries = MoodEntry::with('mood')
            ->where('user_id', $userId)
            ->whereBetween('created_at', [$start, $end])
            ->orderBy('created_at')
            ->get();

        // Susun ikut hari - Isnin sampai Ahad
        $byDay = [];
        for ($i = 0; $i < 7; $i++) {
            $date       = $start->copy()->addDays($i);
            $dayEntries = $entries->filter(
                fn($e) => Carbon::parse($e->created_at)->isSameDay($date)
            );

            $byDay[] = [
                'date'    => $date->toDateString(),
                'day'     => $date->format('D'),
                'entries' => $dayEntries->values(),
                'count'   => $dayEntries->count(),
            ];
        }

        return response()->json([
            'week'  => $byDay,
            'total' => $entries->count(),
        ]);
    }

    // Analisis bulanan - untuk calendar view
    public function monthly(Request $request)
    {
        $userId = $request->user()->id;
        $month  = $request->query('month', Carbon::now()->month);
        $year   = $request->query('year', Carbon::now()->year);

        $start = Carbon::createFromDate($year, $month, 1)->startOfMonth();
        $end   = $start->copy()->endOfMonth();

        $entries = MoodEntry::with('mood')
            ->where('user_id', $userId)
            ->whereBetween('created_at', [$start, $end])
            ->orderBy('created_at')
            ->get();

        // Group ikut tarikh - untuk tanda dalam kalendar
        $byDate = $entries->groupBy(
            fn($e) => Carbon::parse($e->created_at)->toDateString()
        )->map(fn($group) => [
            'entries' => $group->values(),
            'count'   => $group->count(),
            'moods'   => $group->pluck('mood')->unique('id')->values(),
        ]);

        return response()->json([
            'month'    => $start->format('F Y'),
            'year'     => $year,
            'month_no' => (int) $month,
            'calendar' => $byDate,
            'total'    => $entries->count(),
        ]);
    }

    // Pecahan mood - untuk chart
    public function moodBreakdown(Request $request)
    {
        $userId = $request->user()->id;
        $period = $request->query('period', 'month');

        $start = match ($period) {
            'week'  => Carbon::now()->startOfWeek(),
            'year'  => Carbon::now()->startOfYear(),
            default => Carbon::now()->startOfMonth(),
        };

        $entries = MoodEntry::with('mood')
            ->where('user_id', $userId)
            ->where('created_at', '>=', $start)
            ->get();

        $total = $entries->count();

        $breakdown = $entries->groupBy('mood_id')
            ->map(function ($group) use ($total) {
                $mood = $group->first()->mood;
                return [
                    'mood'       => $mood,
                    'count'      => $group->count(),
                    'percentage' => $total > 0
                        ? round(($group->count() / $total) * 100, 1)
                        : 0,
                ];
            })->values();

        return response()->json([
            'period'    => $period,
            'total'     => $total,
            'breakdown' => $breakdown,
        ]);
    }
}
