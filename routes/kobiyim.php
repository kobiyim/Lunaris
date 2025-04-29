<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => '\App\Auth\Http\Controllers', 'middleware' => 'guest'], function () {
    // Authentication...
    Route::get('login', 'AuthenticatedSessionController@create')
         ->name('login');

    Route::post('login', 'AuthenticatedSessionController@store');

    Route::get('forgot-password', 'PasswordResetLinkController@create')
         ->name('password.request');

    // Registration...
    Route::get('register', 'RegisteredUserController@create')
         ->name('register');

    Route::post('register', 'RegisteredUserController@store');
});


Route::post('logout', '\App\Auth\Http\Controllers\AuthenticatedSessionController@destroy')
     ->name('logout');