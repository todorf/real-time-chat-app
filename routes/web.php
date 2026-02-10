<?php

use App\Http\Controllers\ConversationsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
});

Route::resource('conversations', ConversationsController::class)->middleware(
    'auth',
);

Route::prefix('conversations')
    ->name('conversations.')
    ->controller(ConversationsController::class)
    ->middleware('auth')
    ->group(function () {
        Route::post('{conversation}/join', 'join')->name('join');
    });

Route::prefix('users')
    ->name('users.')
    ->controller(UserController::class)
    ->middleware('auth')
    ->group(function () {
        Route::get('{user}/conversations', 'conversations')->name(
            'conversations',
        );
    });

require __DIR__ . '/settings.php';
