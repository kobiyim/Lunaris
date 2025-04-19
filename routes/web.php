<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Dashboard;

Route::group([ 'middleware' => 'auth' ], function() {
	Route::get('/', Dashboard::class);

	Route::get('cards', App\Http\Livewire\CardManager::class);
});

