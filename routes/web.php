<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect(route('forms.index'));
});

Route::resource('forms', \App\Http\Controllers\Web\FormController::class)->only('index', 'show');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('admin.guest')->group(function () {
        Route::get('login', [\App\Http\Controllers\Admin\LoginController::class, 'index'])->name('login.index');
        Route::post('login', [\App\Http\Controllers\Admin\LoginController::class, 'store'])->name('login.store');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');
        Route::resource('forms', \App\Http\Controllers\Admin\FormController::class)->except('show');
        Route::post('logout', [\App\Http\Controllers\Admin\LogoutController::class, 'store'])->name('logout.store');
    });
});
