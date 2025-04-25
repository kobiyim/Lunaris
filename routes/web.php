<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Dashboard;

Route::group([], function() {
	Route::get('/', function() { return view('welcome'); });

	Route::get('cards', App\Http\Livewire\CardManager::class);
	
	Route::get('items', App\Http\Livewire\ItemManager::class);
	
	Route::get('unit-sets', App\Http\Livewire\UnitSetManager::class);

	Route::get('bank/{bankId}/accounts', App\Http\Livewire\BankAccounts::class);
	Route::get('unit-set/{bankId}', App\Http\Livewire\UnitManager::class);

	Route::get('banks', App\Http\Livewire\Bank\BankManager::class);
	Route::group([ 'prefix' => 'bank', 'namespace' => 'App\Http\Livewire\Bank' ], function() {
		Route::get('fiches', Fiches::class);
		Route::get('movements', Movements::class);

		Route::get('fiche/create', NewFiche::class);
	});

	Route::group([ 'prefix' => 'invoice', 'namespace' => 'App\Http\Livewire\Invoice' ], function() {
		Route::get('sales', Sales::class);
		Route::get('purchase', Purchase::class);
	});

	Route::get('vaults', App\Http\Livewire\Vault\VaultManager::class);
	Route::group([ 'prefix' => 'vault', 'namespace' => 'App\Http\Livewire\Vault' ], function() {
		Route::get('fiches', Fiches::class);
		Route::get('movements', Movements::class);
	});
});

