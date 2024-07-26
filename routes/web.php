<?php

use Illuminate\Support\Facades\Route;

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });
Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('index');
Route::get('/loadmore', [App\Http\Controllers\FrontendController::class, 'loadmore'])->name('index');

Route::get('/search', [App\Http\Controllers\FrontendController::class, 'search'])->name('search');
Route::get('/doctor/{id}', [App\Http\Controllers\FrontendController::class, 'show'])->whereNumber('id')->name('home.doctor');
Route::get('/register-doctor', [App\Http\Controllers\DocRegController::class, 'index'])->name('index');
Route::post('/register-doctor', [App\Http\Controllers\DocRegController::class, 'storeDoctor'])->name('auth.register-doctor');


// route for all login user
// Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');
// Route::get('/user-profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
// Route::post('/user-profile', [App\Http\Controllers\ProfileController::class, 'store'])->name('profile.store');
// Route::post('/profile-pic', [App\Http\Controllers\ProfileController::class, 'profilePic'])->name('profile.pic');

// patient route
// Route::get('/booking/{id}/{date}', [App\Http\Controllers\BookingController::class, 'index'])->name('booking.index');
// Route::post('/booking/confirm', [App\Http\Controllers\BookingController::class, 'confirm'])->name('booking.confirm');
// Route::post('/booking/store', [App\Http\Controllers\BookingController::class, 'store'])->name('booking.store');
// Route::get('/my-booking', [App\Http\Controllers\BookingController::class, 'myBookings'])->name('my-booking');


// doctor routes
// Route::get('/time', [App\Http\Controllers\TimeSlotController::class, 'index'])->name('time.index');
// Route::get('/time/create', [App\Http\Controllers\TimeSlotController::class, 'create'])->name('time.create');
// Route::post('/time/store', [App\Http\Controllers\TimeSlotController::class, 'store'])->name('time.store');
// Route::get('/time/show/{date}', [App\Http\Controllers\TimeSlotController::class, 'show'])->name('time.show');
// Route::post('/time/update/{date}', [App\Http\Controllers\TimeSlotController::class, 'update'])->name('time.update');

// Route::get('/patient', [App\Http\Controllers\PatientController::class, 'bookingList'])->name('patient.booking-list');
// Route::post('/patient', [App\Http\Controllers\PatientController::class, 'bookingList'])->name('patient.booking-list');
// Route::get('/status/update/{id}', [App\Http\Controllers\PatientController::class, 'toggleStatus'])->name('update.status');


//admin routes
// Route::get('/doctor', [App\Http\Controllers\DoctorController::class, 'index'])->name('doctor.index');
// Route::get('/doctor/create', [App\Http\Controllers\DoctorController::class, 'create'])->name('doctor.create');
// Route::post('/doctor/store', [App\Http\Controllers\DoctorController::class, 'store'])->name('doctor.store');
// Route::get('/doctor/edit/{id}', [App\Http\Controllers\DoctorController::class, 'edit'])->name('doctor.edit');
// Route::put('/doctor/update/{id}', [App\Http\Controllers\DoctorController::class, 'update'])->name('doctor.update');
// Route::delete('/doctor/delete/{id}', [App\Http\Controllers\DoctorController::class, 'destroy'])->name('doctor.destroy');
// Route::get('/doctor/delete/{id}', [App\Http\Controllers\DoctorController::class, 'delete'])->name('doctor.delete');
// Route::get('/doctor/show/{id}', [App\Http\Controllers\DoctorController::class, 'show'])->name('doctor.show');

// Route::get('/specialty', [App\Http\Controllers\SpecialtyController::class, 'index'])->name('specialty.index');
// Route::get('/specialty/create', [App\Http\Controllers\SpecialtyController::class, 'create'])->name('specialty.create');
// Route::post('/specialty/store', [App\Http\Controllers\SpecialtyController::class, 'store'])->name('specialty.store');
// Route::get('/specialty/edit/{id}', [App\Http\Controllers\SpecialtyController::class, 'edit'])->name('specialty.edit');
// Route::put('/specialty/update/{id}', [App\Http\Controllers\SpecialtyController::class, 'update'])->name('specialty.update');
// Route::delete('/specialty/delete/{id}', [App\Http\Controllers\SpecialtyController::class, 'destroy'])->name('specialty.destroy');
// Route::get('/specialty/delete/{id}', [App\Http\Controllers\SpecialtyController::class, 'delete'])->name('specialty.delete');

// Route::get('/patient/list', [App\Http\Controllers\PatientController::class, 'patientList'])->name('patient.patient-list');
// Route::delete('/patient/delete/{id}', [App\Http\Controllers\PatientController::class, 'destroy'])->name('patient.destroy');
// Route::get('/patient/delete/{id}', [App\Http\Controllers\PatientController::class, 'delete'])->name('patient.delete');
// Route::get('/patient/edit/{id}', [App\Http\Controllers\PatientController::class, 'edit'])->name('patient.edit');
// Route::get('/patient/show/{id}', [App\Http\Controllers\PatientController::class, 'show'])->name('patient.show');
// Route::put('/patient/update/{id}', [App\Http\Controllers\PatientController::class, 'update'])->name('patient.update');
