<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

Route::get('/', [ReportController::class, 'homepage'])->name('homepage');

Route::get('/dashboard', [ReportController::class, 'index'])->name('dashboard');

Route::match(['get', 'post'], '/lingua/{lang}', [ReportController::class, 'setLanguage'])->name('setLocale');

