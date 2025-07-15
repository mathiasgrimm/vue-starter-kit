<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/test1', function () {
    return json_encode([
        'ip' => request()->ip(),
        'ips' => request()->ips(),
        'headers' => request()->headers->all(),
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_LINE_TERMINATORS | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
});

Route::get('/test2', function () {
    return 'yo 2!';
});

Route::get('/test3', function () {
    return ini_get('max_input_vars');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
