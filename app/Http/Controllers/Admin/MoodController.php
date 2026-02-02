<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mood;

class MoodController extends Controller
{
   public function index()
    {
        $moods = Mood::latest()->get();
        return view('admin.moods.index', compact('moods'));
    }

    public function create()
    {
        return view('admin.moods.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:50',
            'icon'  => 'required|string|max:10',
            'color' => 'required|string|max:50',
        ]);

        Mood::create([
            'name'  => $request->name,
            'icon'  => $request->icon,
            'color' => $request->color,
        ]);

        return redirect()
            ->route('admin.moods.index')
            ->with('success', 'Mood added successfully.');
    }

    public function edit(Mood $mood)
    {
        return view('admin.moods.edit', compact('mood'));
    }

    public function update(Request $request, Mood $mood)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'icon' => 'nullable|string|max:50',
            'color' => 'nullable|string|max:50',
        ]);

        $mood->update($request->all());

        return redirect()->route('admin.moods.index')
            ->with('success', 'Mood updated successfully');
    }

    public function destroy(Mood $mood)
    {
        $mood->delete();

        return redirect()->route('admin.moods.index')
            ->with('success', 'Mood deleted successfully');
    }
}
