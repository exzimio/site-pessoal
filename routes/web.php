<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::post('/contacto', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthController::class, 'create'])->name('login');
        Route::post('login', [AuthController::class, 'store'])
            ->middleware('throttle:5,1')
            ->name('login.store');
    });

    Route::middleware('auth')->group(function () {
        Route::post('logout', [AuthController::class, 'destroy'])->name('logout');
        Route::get('/', DashboardController::class)->name('dashboard');

        Route::get('mensagens', [MessageController::class, 'index'])->name('messages.index');
        Route::get('mensagens/exportar', [MessageController::class, 'export'])->name('messages.export');
        Route::get('mensagens/{message}', [MessageController::class, 'show'])->name('messages.show');
        Route::patch('mensagens/{message}/estado', [MessageController::class, 'updateStatus'])->name('messages.status');
        Route::delete('mensagens/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
    });
});
