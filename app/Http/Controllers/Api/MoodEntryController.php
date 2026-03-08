<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MoodEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MoodEntryController extends Controller
{
    // Ambil semua entries user yang login
    public function index(Request $request)
    {
        $entries = MoodEntry::with('mood')
            ->where('user_id', $request->user()->id)
            ->orderByDesc('created_at')
            ->paginate(15);

        return response()->json($entries);
    }

    // Tambah entry baru
    public function store(Request $request)
    {
        $request->validate([
            'mood_id'     => 'required|exists:moods,id',
            'description' => 'nullable|string',
            'highlight_1' => 'nullable|string|max:255',
            'highlight_2' => 'nullable|string|max:255',
            'photo'       => 'nullable|image|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('mood-entries', 'public');
        }

        $entry = MoodEntry::create([
            'user_id'     => $request->user()->id,
            'mood_id'     => $request->mood_id,
            'description' => $request->description,
            'highlight_1' => $request->highlight_1,
            'highlight_2' => $request->highlight_2,
            'photo'       => $photoPath,
        ]);

        return response()->json([
            'message' => 'Entry berjaya disimpan',
            'entry'   => $entry->load('mood'),
        ], 201);
    }

    // Tengok satu entry
    public function show(Request $request, $id)
    {
        $entry = MoodEntry::with('mood')
            ->where('user_id', $request->user()->id)
            ->findOrFail($id);

        return response()->json($entry);
    }

    // Kemaskini entry
    public function update(Request $request, $id)
    {
        $entry = MoodEntry::where('user_id', $request->user()->id)
            ->findOrFail($id);

        $request->validate([
            'mood_id'     => 'sometimes|exists:moods,id',
            'description' => 'nullable|string',
            'highlight_1' => 'nullable|string|max:255',
            'highlight_2' => 'nullable|string|max:255',
            'photo'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($entry->photo) {
                Storage::disk('public')->delete($entry->photo);
            }
            $entry->photo = $request->file('photo')->store('mood-entries', 'public');
        }

        $entry->update($request->only('mood_id', 'description', 'highlight_1', 'highlight_2'));

        return response()->json([
            'message' => 'Entry berjaya dikemaskini',
            'entry'   => $entry->load('mood'),
        ]);
    }

    // Padam entry
    public function destroy(Request $request, $id)
    {
        $entry = MoodEntry::where('user_id', $request->user()->id)
            ->findOrFail($id);

        if ($entry->photo) {
            Storage::disk('public')->delete($entry->photo);
        }

        $entry->delete();

        return response()->json(['message' => 'Entry berjaya dipadam']);
    }
}