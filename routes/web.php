<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserprofileController;
use App\Http\Controllers\Admin;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/reservations/create/{id}', [ReservationController::class, 'create'])->name('reservations.create');
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
Route::get('/reservations/{id}', [ReservationController::class, 'show'])->name('reservation.show');
Route::get('/reservations/{id}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');
Route::put('/reservations/{id}', [ReservationController::class, 'update'])->name('reservations.update');
Route::delete('/reservations/{id}', [ReservationController::class, 'destroy'])->name('reservations.destroy');

Route::get('/get-time-slots', [ReservationController::class, 'getTimeSlots']);

Route::get('/receipt/{user_id}', [ReceiptController::class, 'show'])->name('receipt.show');

Route::get('/tracking', [\App\Http\Controllers\TrackingController::class, 'index'])->name('tracking.index');
Route::post('/tracking', [\App\Http\Controllers\TrackingController::class, 'store'])->name('tracking.store');

Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::prefix('login')->name('login.')->group(function () {
        Route::get('/', 'showLogin')->name('show');
        Route::post('/', 'submitLogin')->name('check');
    });

    Route::prefix('register')->name('register.')->group(function () {
        Route::get('/', 'showRegister')->name('show');
        Route::post('/', 'submitRegister')->name('check');
    });

    Route::post('logout', 'logout')
        ->name('logout')
        ->middleware('auth');
});


Route::get('/profile', [UserProfileController::class, 'show'])->name('profile.show');
Route::put('/profile/update', [UserProfileController::class, 'update'])->name('profile.update');


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/reservations', [Admin\ReservationController::class, 'index'])->name('admin.reservations.index');
    Route::get('users', [Admin\UserController::class, 'index'])->name('admin.users.index');
    Route::get('users/{user}', [Admin\UserController::class, 'show'])->name('admin.users.show');

    Route::get('dashboard', [Admin\DashboardController::class, 'index'])->name('admin.dashboard');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'isAdmin'])->group(function (){
    Route::resource('services', Admin\ServiceController::class);
});



