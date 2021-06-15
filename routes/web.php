<?php

use App\Http\Controllers\Auth\UserProfileController;
use App\Http\Controllers\Common\LocalizationController;
use App\Http\Controllers\Common\NoteController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Patients\PatientController;
use App\Http\Controllers\Settings\ItemsController;
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

// Auth routes
require __DIR__ . '/auth.php';

// Force login to access routes
Route::middleware(['auth'])->group(function () {
    Route::prefix('/')->name('dashboard.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
    });

    Route::get('/{locale}', [LocalizationController::class, 'index'])->name('lang.switch');

    Route::prefix('codes')->name('codes.')->group(function () {
        Route::get('/list', [DashboardController::class, 'index'])->name('index');
    });

    Route::prefix('insurances')->name('insurances.')->group(function () {
        Route::get('/list', [DashboardController::class, 'index'])->name('index');
    });

    Route::prefix('patients')->name('patients.')->group(function () {
        Route::get('/list', [PatientController::class, 'index'])->name('list');

        Route::get('/new', [PatientController::class, 'create'])->name('create');
        Route::post('/new', [PatientController::class, 'store'])->name('store');

        Route::get('/{patient}/{ledgerTab?}', [PatientController::class, 'show'])->name('show');

        Route::get('/{patient}/edit/demographics', [PatientController::class, 'edit'])->name('edit');
        Route::put('/{patient}/edit/demographics', [PatientController::class, 'update'])->name('update');

        Route::post('/{patient}/new/note', [NoteController::class, 'store'])->name('new.note');
        Route::delete('/{patient}/delete/{note}', [NoteController::class, 'destroy'])->name('delete.note');
    });

    Route::prefix('practice')->name('practice.')->group(function () {
        Route::get('/settings', [DashboardController::class, 'index'])->name('index');
    });

    Route::prefix('system')->name('careus.')->group(function () {
        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/lists', [ItemsController::class, 'index'])->name('lists');
        });
    });

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/notes', [NoteController::class, 'index'])->name('notes');

        Route::get('/{user}/settings', [UserProfileController::class, 'index'])->name('settings');
        Route::put('/{user}/settings', [UserProfileController::class, 'update'])->name('update');
    });
});
