<?php

use App\Http\Controllers\MedicationController;
use App\Http\Controllers\NotificationController;
use App\Models\Medication;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/create', function () {
    return view('create');
});

Route::get('/dashboard', [MedicationController::class, 'dashboard'])->name('dashboard');


Route::post('/create', [MedicationController::class, 'store'])->name('medications.store');

Route::delete('/medication/{id}', [MedicationController::class, 'destroy'])->name('medications.destroy');

Route::get('/send-reminder', [NotificationController::class, 'sendReminder']);