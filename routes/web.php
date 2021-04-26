<?php

use App\Http\Controllers\Patients\PatientController;
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

App::setLocale(config('app.locale'));

Route::prefix('/')->name('dashboard.')->group(function () {
    Route::get('/', [PatientController::class, 'index'])->name('index');
});

Route::prefix('patients')->name('patients.')->group(function () {
    Route::get('/list', [PatientController::class, 'index'])->name('list');
    Route::get('/{patient}/ledger', [PatientController::class, 'show'])->name('show');
});
