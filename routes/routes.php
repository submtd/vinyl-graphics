<?php

/**
 * PUBLIC ROUTES.
 */

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'web',
    'namespace' => 'Submtd\VinylGraphics\Controllers',
], function () {
    /*
     * Public routes
     */
    Route::get('/', 'PublicHome')->name('home');
    Route::post('add', 'PublicAdd')->name('add');
    Route::get('delete/{id}', 'PublicDelete')->name('delete');
    Route::get('edit/{id}', 'PublicEdit')->name('edit');
    Route::match(['get', 'post'], 'login', 'PublicLogin')->name('login');
    Route::match(['get', 'post'], 'register', 'PublicRegister')->name('register');
    Route::get('cart', 'PublicCart')->name('cart');
    Route::match(['get', 'post'], 'checkout', 'PublicCheckout')->name('checkout');
    Route::match(['get', 'post'], 'payment', 'PublicPayment')->name('payment');

    /*
     * Api routes
     */
    Route::group([
        'middleware' => 'api',
    ], function () {
        Route::get('api/v1/colors', 'ApiColors')->name('api.colors');
        Route::get('api/v1/fonts', 'ApiFonts')->name('api.fonts');
        Route::get('api/v1/images', 'ApiImages')->name('api.images');
    });

    /*
     * Authenticated routes
     */
    Route::group([
        'middleware' => 'auth',
    ], function () {
        Route::get('logout', 'PrivateLogout')->name('logout');
    });

    /*
     * Admin routes
     */
    Route::group([
        'middleware' => [
            'auth',
            'admin',
        ],
    ], function () {
        Route::get('admin', 'AdminDashboard')->name('admin.dashboard');
        // images
        Route::get('admin/backgrounds', 'AdminBackgrounds')->name('admin.backgrounds');
        Route::match(['get', 'post'], 'admin/backgrounds/add', 'AdminBackgroundsAdd')->name('admin.backgrounds.add');
        Route::match(['get', 'post'], 'admin/backgrounds/{id}', 'AdminBackgroundsEdit')->name('admin.backgrounds.edit');
        // fonts
        Route::get('admin/fonts', 'AdminFonts')->name('admin.fonts');
        Route::match(['get', 'post'], 'admin/fonts/add', 'AdminFontsAdd')->name('admin.fonts.add');
        Route::match(['get', 'post'], 'admin/fonts/{id}', 'AdminFontsEdit')->name('admin.fonts.edit');
        // colors
        Route::get('admin/colors', 'AdminColors')->name('admin.colors');
        Route::match(['get', 'post'], 'admin/colors/add', 'AdminColorsAdd')->name('admin.colors.add');
        Route::match(['get', 'post'], 'admin/colors/{id}', 'AdminColorsEdit')->name('admin.colors.edit');
        // orders
        Route::get('admin/orders', 'AdminOrders')->name('admin.orders');
        // customers
        Route::get('admin/customers', 'AdminCustomers')->name('admin.customers');
    });
});
