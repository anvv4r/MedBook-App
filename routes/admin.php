<?php

use Illuminate\Support\Facades\Route;

Route::get('/user-profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
Route::post('/user-profile', [App\Http\Controllers\ProfileController::class, 'store'])->name('profile.store');
Route::post('/profile-pic', [App\Http\Controllers\ProfileController::class, 'profilePic'])->name('profile.pic');

Route::middleware('can:admin')->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');

    // admin routes
    Route::get('/doctor', [App\Http\Controllers\DoctorController::class, 'index'])->name('doctor.index');
    Route::get('/doctor/create', [App\Http\Controllers\DoctorController::class, 'create'])->name('doctor.create');
    Route::post('/doctor/store', [App\Http\Controllers\DoctorController::class, 'store'])->name('doctor.store');
    Route::delete('/doctor/delete/{id}', [App\Http\Controllers\DoctorController::class, 'destroy'])->name('doctor.destroy');
    Route::get('/doctor/delete/{id}', [App\Http\Controllers\DoctorController::class, 'delete'])->name('doctor.delete');
    Route::get('/doctor/show/{id}', [App\Http\Controllers\DoctorController::class, 'show'])->name('doctor.show');
    Route::get('/doctor-edit/{id}', [App\Http\Controllers\DoctorController::class, 'profile'])->name('doctor.profile');
    Route::post('/doctor-edit/{id}', [App\Http\Controllers\DoctorController::class, 'update'])->name('doctor.update');
    Route::post('/doctor-pic/{id}', [App\Http\Controllers\DoctorController::class, 'profilePic'])->name('doctor.pic');

    Route::get('/specialty', [App\Http\Controllers\SpecialtyController::class, 'index'])->name('specialty.index');
    Route::get('/specialty/create', [App\Http\Controllers\SpecialtyController::class, 'create'])->name('specialty.create');
    Route::post('/specialty/store', [App\Http\Controllers\SpecialtyController::class, 'store'])->name('specialty.store');
    Route::get('/specialty/edit/{id}', [App\Http\Controllers\SpecialtyController::class, 'edit'])->name('specialty.edit');
    Route::put('/specialty/update/{id}', [App\Http\Controllers\SpecialtyController::class, 'update'])->name('specialty.update');
    Route::delete('/specialty/delete/{id}', [App\Http\Controllers\SpecialtyController::class, 'destroy'])->name('specialty.destroy');
    Route::get('/specialty/delete/{id}', [App\Http\Controllers\SpecialtyController::class, 'delete'])->name('specialty.delete');

    Route::get('/patient/list', [App\Http\Controllers\PatientController::class, 'patientList'])->name('patient.patient-list');
    Route::get('/patient/detail/{id}', [App\Http\Controllers\PatientController::class, 'detail'])->name('patient.detail');
    Route::delete('/patient/delete/{id}', [App\Http\Controllers\PatientController::class, 'destroy'])->name('patient.destroy');
    Route::get('/patient/delete/{id}', [App\Http\Controllers\PatientController::class, 'delete'])->name('patient.delete');
    Route::get('/patient-edit/{id}', [App\Http\Controllers\PatientController::class, 'profile'])->name('patient.profile');
    Route::post('/patient-edit/{id}', [App\Http\Controllers\PatientController::class, 'update'])->name('patient.update');
    Route::post('/patient-pic/{id}', [App\Http\Controllers\PatientController::class, 'profilePic'])->name('patient.pic');
});