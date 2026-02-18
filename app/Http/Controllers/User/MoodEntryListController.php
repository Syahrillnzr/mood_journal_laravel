<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Mood;
use App\Models\MoodEntry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MoodEntryListController extends Controller
{
    public function index(Request $request)
    {
        $entries = MoodEntry::with('mood')
            ->where('user_id', Auth::id())
            ->when($request->mood, fn($q) => $q->where('mood_id', $request->mood))
            ->latest()
            ->get();

        $moods = Mood::where('is_active', 1)->get();

        return view('user.list', compact('entries', 'moods'));
    }

    public function destroy(MoodEntry $entriesList)
    {
        if ($entriesList->user_id !== Auth::id()) {
            abort(403);
        }

        if ($entriesList->photo) {
            Storage::disk('public')->delete($entriesList->photo);
        }

        $entriesList->delete();

        return redirect()->route('entries-list.index')->with('status', 'Entry deleted!');
    }


    //     public function destroy(MoodEntry $moodEntry)
    // {
    //     dd([
    //         'entry_user_id' => $moodEntry->user_id,
    //         'auth_id' => Auth::id(),
    //         'match' => $moodEntry->user_id === Auth::id(),
    //     ]);
    // }
}