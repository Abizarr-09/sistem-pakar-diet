<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DiseaseController;
use App\Http\Controllers\Admin\DietController;
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
    Route::get('/diagnosis/{diagnosis}/print', [DiagnosisController::class, 'print'])->name('diagnosis.print');

    Route::get('/history', [HistoryController::class, 'index'])->name('history.index');

    Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::resource('diseases', DiseaseController::class);
        Route::resource('diets', DietController::class);
    });
});

require __DIR__.'/auth.php';
