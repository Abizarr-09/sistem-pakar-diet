<?php

use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/diagnosis', [DiagnosisController::class, 'index'])->name('diagnosis.index');
    Route::post('/diagnosis', [DiagnosisController::class, 'process'])->name('diagnosis.process');
    Route::get('/diagnosis/{diagnosis}/result', [DiagnosisController::class, 'result'])->name('diagnosis.result');

    Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
});

require __DIR__.'/auth.php';
