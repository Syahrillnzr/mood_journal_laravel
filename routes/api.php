<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// // DEBUG TEST
// Route::get('/test', function () {
//     return response()->json(['message' => 'API is working!']);
// });

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\MoodController;
use App\Http\Controllers\Api\MoodEntryController;
use App\Http\Controllers\Api\AnalysisController;

// Public routes (no authentication needed)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes (requires authentication)
Route::middleware('auth:sanctum')->group(function () {
    // Auth routes
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
    Route::put('/profile', [AuthController::class, 'updateProfile']);
    Route::put('/password', [AuthController::class, 'updatePassword']);

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Moods
    Route::get('/moods', [MoodController::class, 'index']);

    // Mood Entries
    Route::apiResource('mood-entries', MoodEntryController::class);

    // Analysis
    Route::get('/analysis/weekly', [AnalysisController::class, 'weekly']);
    Route::get('/analysis/monthly', [AnalysisController::class, 'monthly']);
    Route::get('/analysis/mood-breakdown', [AnalysisController::class, 'moodBreakdown']);
});