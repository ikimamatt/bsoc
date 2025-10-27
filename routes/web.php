<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HseReportController;

Route::get('/', [HseReportController::class, 'exactMatch'])->name('hse-report-exact-match');
Route::get('/form', [HseReportController::class, 'create'])->name('hse-report.create');
Route::post('/store', [HseReportController::class, 'store'])->name('hse-report.store');
Route::get('/monitoring', [HseReportController::class, 'monitoring'])->name('hse-monitoring');
Route::get('/scorecard', [HseReportController::class, 'scorecard'])->name('performance-scorecard');
