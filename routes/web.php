<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\MoodController;
use App\Http\Controllers\Admin\UserListController;
use App\Http\Controllers\Admin\AnalyticsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// User routes
Route::middleware(['auth', 'role:0'])->group(function () {
    Route::get('/dashboard', fn () => view('user.dashboard'))->name('dashboard');
    Route::get('/add', fn () => view('user.add'))->name('add');
    Route::get('/list', fn () => view('user.list'))->name('list');
    Route::get('/analysis', fn () => view('user.analysis'))->name('analysis');

    // User profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes
Route::middleware(['auth', 'role:1'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('lists', UserListController::class);
    Route::resource('moods', MoodController::class);
    Route::get('/setting', fn () => view('admin.setting'))->name('setting');
    Route::get('/analysis',[AnalyticsController::class, 'index'])->name('analysis');

    // Admin profile
    Route::get('/profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [AdminProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [AdminProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';


Route::view('/', 'index')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/how-it-work', 'how')->name('how');
Route::view('/features', 'features')->name('features');
Route::view('/contact', 'contact')->name('contact');
Route::view('/blog', 'blog')->name('blog');
Route::view('/faq', 'faq')->name('faq');
Route::view('/terms', 'tncpnp')->name('tncpnp');