<?php

use App\Http\Controllers\Common\LocalizationController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Patients\PatientController;
use App\Http\Controllers\Settings\ItemsController;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
});

Route::prefix('patients')->name('patients.')->group(function () {
    Route::get('/list', [PatientController::class, 'index'])->name('list');
    Route::get('/{patient}/ledger', [PatientController::class, 'show'])->name('show');
});

Route::prefix('settings')->name('settings.')->group(function () {
    Route::get('/lists', [ItemsController::class, 'index'])->name('index');
});

Route::get('/{locale}', [LocalizationController::class, 'index'])->name('lang.switch');
