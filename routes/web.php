<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactFormController;

Route::get('/', [ContactFormController::class, 'create']);

// Guest-facing contact form
Route::get('/contact', [ContactFormController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactFormController::class, 'store'])->name('contact.store');

// Admin routes
Route::get('/admin/login', [ContactFormController::class, 'showAdminLogin'])->name('admin.login');
Route::post('/admin/login', [ContactFormController::class, 'adminLogin']);
Route::get('/admin/dashboard', [ContactFormController::class, 'adminDashboard'])->name('admin.dashboard');
Route::post('/admin/logout', [ContactFormController::class, 'adminLogout'])->name('admin.logout');