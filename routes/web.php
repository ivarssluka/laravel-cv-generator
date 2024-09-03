<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CVController;
use App\Models\CV;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $cvs = CV::with('personalDetails')->where('user_id', Auth::id())->get();
    return view('dashboard', compact('cvs'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('cvs', CVController::class);

    Route::get('/cvs/{id}/pdf', [CVController::class, 'generatePDF'])->name('cvs.pdf');
});

require __DIR__.'/auth.php';
