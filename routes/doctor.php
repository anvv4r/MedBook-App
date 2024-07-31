<?php

use Illuminate\Support\Facades\Route;

Route::get('/user-profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
Route::post('/user-profile', [App\Http\Controllers\ProfileController::class, 'store'])->name('profile.store');
Route::post('/profile-pic', [App\Http\Controllers\ProfileController::class, 'profilePic'])->name('profile.pic');

Route::middleware('can:doctor')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');

    // doctor routes
    Route::get('/time', [App\Http\Controllers\TimeSlotController::class, 'index'])->name('time.index');
    Route::get('/time/create', [App\Http\Controllers\TimeSlotController::class, 'create'])->name('time.create');
    Route::post('/time/store', [App\Http\Controllers\TimeSlotController::class, 'store'])->name('time.store');
    Route::get('/time/show/{date}', [App\Http\Controllers\TimeSlotController::class, 'show'])->name('time.show');
    Route::post('/time/update/{date}', [App\Http\Controllers\TimeSlotController::class, 'update'])->name('time.update');
    Route::delete('/time/delete/{date}', [App\Http\Controllers\TimeSlotController::class, 'destroy'])->name('time.destroy');

    Route::get('/patient', [App\Http\Controllers\PatientController::class, 'bookingList'])->name('patient.booking-list');
    Route::post('/patient', [App\Http\Controllers\PatientController::class, 'bookingList'])->name('patient.booking-list');
    Route::get('/status/update/{id}', [App\Http\Controllers\PatientController::class, 'toggleStatus'])->name('update.status');
    Route::get('/patient/show/{id}', [App\Http\Controllers\PatientController::class, 'show'])->name('patient.show');

});