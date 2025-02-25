<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
});

Route::prefix('client')->group(function () {
    Route::get('/dashboard', function () {
        return view('client.dashboard');
    });
});

Route::prefix('developer')->group(function () {
    Route::get('/dashboard', function () {
        return view('developer.dashboard');
    });
});
