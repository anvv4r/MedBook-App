<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/user-profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
Route::post('/user-profile', [App\Http\Controllers\ProfileController::class, 'store'])->name('profile.store');
Route::post('/profile-pic', [App\Http\Controllers\ProfileController::class, 'profilePic'])->name('profile.pic');

// patient route
Route::get('/booking/{id}/{date}', [App\Http\Controllers\BookingController::class, 'index'])->name('booking.index');
Route::post('/booking/confirm', [App\Http\Controllers\BookingController::class, 'confirm'])->name('booking.confirm');
Route::post('/booking/store', [App\Http\Controllers\BookingController::class, 'store'])->name('booking.store');
Route::get('/my-booking', [App\Http\Controllers\BookingController::class, 'myBookings'])->name('my-booking');
