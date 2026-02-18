<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\MoodEntry;
use App\Models\Mood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MoodEntryController extends Controller
{
    public function create()
    {
        $moods = Mood::where('is_active', 1)->get();
        return view('user.add', compact('moods'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mood_id'     => ['required', 'exists:moods,id'],
            'description' => ['nullable', 'string', 'max:1000'],
            'highlight_1' => ['nullable', 'string', 'max:255'],
            'highlight_2' => ['nullable', 'string', 'max:255'],
            'photo'       => ['nullable', 'image', 'max:2048'], // 2MB max
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        MoodEntry::create([
            'user_id'     => Auth::id(),
            'mood_id'     => $request->mood_id,
            'description' => $request->description,
            'highlight_1' => $request->highlight_1,
            'highlight_2' => $request->highlight_2,
            'photo'       => $photoPath,
        ]);

        return redirect()->route('dashboard')->with('status', 'Mood entry added!');
    }
}