<?php

use App\Http\Controllers\ConversationsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserConversationController;
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

Route::prefix('users')
    ->name('users.')
    ->controller(UserConversationController::class)
    ->middleware('auth')
    ->group(function () {
        Route::name('conversations')->group(function () {
            Route::get('{user}/conversations', 'conversations');
            Route::post(
                '{user}/conversations/{conversation}/join',
                'join',
            )->name('.join');
            Route::delete(
                '{user}/conversations/{conversation}/leave',
                'leave',
            )->name('.leave');
        });
    });

require __DIR__ . '/settings.php';
