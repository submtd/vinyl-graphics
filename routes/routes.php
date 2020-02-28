<?php

/**
 * PUBLIC ROUTES
 */
Route::group([
    'middleware' => [
        'web',
    ],
    'namespace' => 'Submtd\VinylGraphics\Controllers\WebPublic',
], function () {
    Route::get('/', 'Home')->name('home');
    Route::match(['get', 'post'], 'login', 'Login')->name('login');
    Route::match(['get', 'post'], 'register', 'Register')->name('register');
});

/**
 * AUTH ROUTES
 */
Route::group([
    'middleware' => [
        'web',
        'auth',
    ],
    'namespace' => 'Submtd\VinylGraphics\Controllers\WebPrivate',
], function () {
    Route::get('logout', 'Logout')->name('logout');
});

/**
 * ADMIN ROUTES
 */
Route::group([
    'prefix' => 'admin',
    'middleware' => [
        'web',
        'auth',
        Submtd\VinylGraphics\Middlware\Admin::class,
    ],
    'namespace' => 'Submtd\VinylGraphics\Controllers\Admin',
], function () {
    Route::get('/', 'Dashboard')->name('admin.dashboard');
});
