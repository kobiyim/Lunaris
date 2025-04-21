<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Dashboard;

Route::group([], function() {
	Route::get('/', function() { return view('welcome'); });

	Route::get('cards', App\Http\Livewire\CardManager::class);
	Route::get('banks', App\Http\Livewire\BankManager::class);
	Route::get('items', App\Http\Livewire\ItemManager::class);
	Route::get('vaults', App\Http\Livewire\VaultManager::class);
	Route::get('unit-sets', App\Http\Livewire\UnitSetManager::class);

	Route::get('bank/{bankId}/accounts', App\Http\Livewire\BankAccounts::class);
	Route::get('unit-set/{bankId}', App\Http\Livewire\UnitManager::class);

	Route::group([ 'prefix' => 'bank' ], function() {
		Route::get('fiches', App\Http\Livewire\BankFiches::class);
		Route::get('movements', App\Http\Livewire\BankMovements::class);
		Route::get('fiche/create', App\Http\Livewire\BankFicheForm::class);
	});
});

