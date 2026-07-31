<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CommitmentController as AdminCommitmentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\TechnologyController as AdminTechnologyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleRedirectController;
use Illuminate\Support\Facades\Route;

Route::get('/', LocaleRedirectController::class)->name('locale.root');

Route::prefix('{locale}')
    ->whereIn('locale', ['pt', 'en', 'es'])
    ->middleware('locale')
    ->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');

        Route::post('/contacto', [ContactController::class, 'store'])
            ->middleware('throttle:5,1')
            ->name('contact.store');
    });

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

        Route::resource('servicos', AdminServiceController::class)
            ->parameters(['servicos' => 'service'])
            ->except(['show'])
            ->names('services');

        Route::resource('projetos', AdminProjectController::class)
            ->parameters(['projetos' => 'project'])
            ->except(['show'])
            ->names('projects');

        Route::resource('compromissos', AdminCommitmentController::class)
            ->parameters(['compromissos' => 'commitment'])
            ->except(['show'])
            ->names('commitments');

        Route::resource('tecnologias', AdminTechnologyController::class)
            ->parameters(['tecnologias' => 'technology'])
            ->except(['show'])
            ->names('technologies');
    });
});
