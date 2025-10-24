<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HseReportController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hse-report', [HseReportController::class, 'index'])->name('hse-report');
Route::get('/hse-report-original', [HseReportController::class, 'original'])->name('hse-report-original');
Route::get('/hse-report-exact', [HseReportController::class, 'exact'])->name('hse-report-exact');
Route::get('/hse-report-exact-match', [HseReportController::class, 'exactMatch'])->name('hse-report-exact-match');
