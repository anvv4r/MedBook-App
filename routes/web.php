<?php

use Illuminate\Support\Facades\Route;

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('index');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');


Route::get('/doctor/{id}', [App\Http\Controllers\FrontendController::class, 'show'])->name('home.doctor');
Route::get('/register-doctor', [App\Http\Controllers\DocRegController::class, 'registerDoctor'])->name('auth.register-doctor');
Route::post('/register-doctor', [App\Http\Controllers\DocRegController::class, 'storeDoctor'])->name('auth.register-doctor');

Route::get('/booking/{id}/{date}', [App\Http\Controllers\BookingController::class, 'index'])->name('booking.index');
Route::get('/dashboard/my-booking', [App\Http\Controllers\BookingController::class, 'myBookings'])->name('my-booking');
Route::post('/booking/confirm', [App\Http\Controllers\BookingController::class, 'confirm'])->name('booking.confirm');
Route::post('/booking/store', [App\Http\Controllers\BookingController::class, 'store'])->name('booking.store');

Route::get('/dashboard/user-profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
Route::post('/dashboard/user-profile', [App\Http\Controllers\ProfileController::class, 'store'])->name('profile.store');
Route::post('/dashboard/profile-pic', [App\Http\Controllers\ProfileController::class, 'profilePic'])->name('profile.pic');

//admin routes
Route::get('/admin/doctor', [App\Http\Controllers\DoctorController::class, 'index'])->name('doctor.index');
Route::get('/admin/doctor/create', [App\Http\Controllers\DoctorController::class, 'create'])->name('doctor.create');
Route::post('/admin/doctor/store', [App\Http\Controllers\DoctorController::class, 'store'])->name('doctor.store');
Route::get('/admin/doctor/edit/{id}', [App\Http\Controllers\DoctorController::class, 'edit'])->name('doctor.edit');
Route::put('/admin/doctor/update/{id}', [App\Http\Controllers\DoctorController::class, 'update'])->name('doctor.update');
Route::delete('/admin/doctor/delete/{id}', [App\Http\Controllers\DoctorController::class, 'destroy'])->name('doctor.destroy');
Route::get('/admin/doctor/delete/{id}', [App\Http\Controllers\DoctorController::class, 'delete'])->name('doctor.delete');
Route::get('/admin/doctor/show/{id}', [App\Http\Controllers\DoctorController::class, 'show'])->name('doctor.show');
Route::get('/admin/doctor-create', [App\Http\Controllers\DocController::class, 'test'])->name('test');


Route::get('/admin/specialty', [App\Http\Controllers\SpecialtyController::class, 'index'])->name('specialty.index');
Route::get('/admin/specialty/create', [App\Http\Controllers\SpecialtyController::class, 'create'])->name('specialty.create');
Route::post('/admin/specialty/store', [App\Http\Controllers\SpecialtyController::class, 'store'])->name('specialty.store');
Route::get('/admin/specialty/edit/{id}', [App\Http\Controllers\SpecialtyController::class, 'edit'])->name('specialty.edit');
Route::put('/admin/specialty/update/{id}', [App\Http\Controllers\SpecialtyController::class, 'update'])->name('specialty.update');
Route::delete('/admin/specialty/delete/{id}', [App\Http\Controllers\SpecialtyController::class, 'destroy'])->name('specialty.destroy');
Route::get('/admin/specialty/delete/{id}', [App\Http\Controllers\SpecialtyController::class, 'delete'])->name('specialty.delete');

Route::get('/admin/patient/list', [App\Http\Controllers\PatientController::class, 'patientList'])->name('patient.patient-list');
Route::delete('/admin/patient/delete/{id}', [App\Http\Controllers\PatientController::class, 'destroy'])->name('patient.destroy');
Route::get('/admin/patient/delete/{id}', [App\Http\Controllers\PatientController::class, 'delete'])->name('patient.delete');
Route::get('/admin/patient/edit/{id}', [App\Http\Controllers\PatientController::class, 'edit'])->name('patient.edit');
Route::get('/admin/patient/show/{id}', [App\Http\Controllers\PatientController::class, 'show'])->name('patient.show');
Route::put('/admin/patient/update/{id}', [App\Http\Controllers\PatientController::class, 'update'])->name('patient.update');


// doctor routes
// Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
Route::get('/doctor/time', [App\Http\Controllers\TimeSlotController::class, 'index'])->name('time.index');
Route::get('/doctor/time/create', [App\Http\Controllers\TimeSlotController::class, 'create'])->name('time.create');
Route::post('/doctor/time/store', [App\Http\Controllers\TimeSlotController::class, 'store'])->name('time.store');
Route::get('/doctor/time/show/{date}', [App\Http\Controllers\TimeSlotController::class, 'show'])->name('time.show');
Route::post('/doctor/time/update/{date}', [App\Http\Controllers\TimeSlotController::class, 'update'])->name('time.update');

Route::get('/doctor/patient', [App\Http\Controllers\PatientController::class, 'bookingList'])->name('patient.booking-list');
Route::post('/doctor/patient', [App\Http\Controllers\PatientController::class, 'bookingList'])->name('patient.booking-list');
Route::get('/doctor/status/update/{id}', [App\Http\Controllers\PatientController::class, 'toggleStatus'])->name('update.status');