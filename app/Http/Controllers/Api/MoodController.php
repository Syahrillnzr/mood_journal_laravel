<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mood;

class MoodController extends Controller
{
    public function index()
    {
        $moods = Mood::where('is_active', true)->get();

        return response()->json($moods);
    }
}