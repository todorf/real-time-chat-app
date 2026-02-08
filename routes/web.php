<?php

use App\Http\Controllers\ConversationsController;
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

require __DIR__ . '/settings.php';
