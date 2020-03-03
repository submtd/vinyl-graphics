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
        Submtd\VinylGraphics\Middleware\Admin::class,
    ],
    'namespace' => 'Submtd\VinylGraphics\Controllers\Admin',
], function () {
    Route::get('/', 'Dashboard')->name('admin.dashboard');
    // images
    Route::get('backgrounds', 'Backgrounds')->name('admin.backgrounds');
    Route::match(['get', 'post'], 'backgrounds/add', 'BackgroundsAdd')->name('admin.backgrounds.add');
    Route::match(['get', 'post'], 'backgrounds/{id}', 'BackgroundsEdit')->name('admin.backgrounds.edit');
    // fonts
    Route::get('fonts', 'Fonts')->name('admin.fonts');
    Route::match(['get', 'post'], 'fonts/add', 'FontsAdd')->name('admin.fonts.add');
    Route::match(['get', 'post'], 'fonts/{id}', 'FontsEdit')->name('admin.fonts.edit');
    // colors
    Route::get('colors', 'Colors')->name('admin.colors');
    Route::match(['get', 'post'], 'colors/add', 'ColorsAdd')->name('admin.colors.add');
    Route::match(['get', 'post'], 'colors/{id}', 'ColorsEdit')->name('admin.colors.edit');
    // orders
    Route::get('orders', 'Orders')->name('admin.orders');
    // customers
    Route::get('customers', 'Customers')->name('admin.customers');
});
