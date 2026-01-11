<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Admin\ScanController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventCategoryController;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Grup Route khusus untuk Admin (Harus Login)
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [ScanController::class, 'dashboard'])->name('dashboard');

    // Route Category Guest
    Route::resource('categories', EventCategoryController::class);

    // Route Scanner
    Route::get('/admin/scan', [ScanController::class, 'index'])->name('admin.scan');
    Route::post('/admin/scan/process', [ScanController::class, 'process'])->name('admin.scan.process');

    // Route Daftar Peserta (Akan kita buat controllernas setelah ini)
    Route::get('/admin/participants', [ScanController::class, 'participants'])->name('admin.participants');

    // Profile Admin
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//crud peserta
Route::get('/admin/participants/{id}/edit', [App\Http\Controllers\Admin\ScanController::class, 'editParticipant'])->name('admin.participants.edit');
Route::put('/admin/participants/{id}', [App\Http\Controllers\Admin\ScanController::class, 'updateParticipant'])->name('admin.participants.update');
Route::delete('/admin/participants/{id}', [App\Http\Controllers\Admin\ScanController::class, 'destroyParticipant'])->name('admin.participants.destroy');

Route::resource('events', EventController::class);
    // Route khusus buat saklar Buka/Tutup
Route::patch('/events/{event}/toggle-status', [EventController::class, 'toggleStatus'])->name('events.toggle');
});

// Route Publik (Bisa diakses tanpa login)
Route::get('/register-event/{id}', [RegistrationController::class, 'showForm'])->name('registration.form');
Route::post('/register-event', [RegistrationController::class, 'store'])->name('registration.store');
Route::get('/register-success/{id}', [RegistrationController::class, 'success'])->name('registration.success');
Route::get('/download-ticket/{id}', [RegistrationController::class, 'downloadTicket'])->name('registration.download');

// Route untuk download tiket (Akses Publik)
Route::get('/ticket/download/{token}', [App\Http\Controllers\RegistrationController::class, 'downloadTicket'])->name('ticket.download');

// Route untuk Events (Resource otomatis buat index, create, store, edit, update, destroy)
Route::resource('events', App\Http\Controllers\EventController::class);

// Route untuk Scan
Route::get('/scan', [App\Http\Controllers\Admin\ScanController::class, 'index'])->name('scan.index');
Route::post('/scan', [App\Http\Controllers\Admin\ScanController::class, 'store'])->name('scan.store');


// Route Export Excel
Route::get('/admin/export-event/{id}', [App\Http\Controllers\Admin\ScanController::class, 'exportByEvent'])->name('admin.export.event');
Route::get('/admin/export', [ScanController::class, 'export'])->name('admin.export');

require __DIR__ . '/auth.php';
