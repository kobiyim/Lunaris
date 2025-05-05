<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Dashboard;

Route::group([ 'middleware' => 'auth' ], function() {
	Route::get('/', function() { return view('welcome'); })->name('dashboard');

	Route::get('cards', App\Livewire\Card\CardManager::class);
	
	Route::get('items', App\Livewire\ItemManager::class);
	
	Route::get('unit-sets', App\Livewire\UnitSetManager::class);

	Route::get('bank/{bankId}/accounts', App\Livewire\Bank\BankAccountManager::class);
	Route::get('bank/{bankAccountId}/credit-cards', App\Livewire\Bank\BankCreditCardManager::class);
	Route::get('unit-set/{bankId}', App\Livewire\UnitManager::class);

	Route::get('banks', App\Livewire\Bank\BankManager::class);
	Route::group([ 'prefix' => 'bank', 'namespace' => 'App\Livewire\Bank' ], function() {
		Route::get('fiches', Fiches::class);
		Route::get('movements', Movements::class);

		Route::get('fiche/create', Create::class);
	});

	Route::group([ 'prefix' => 'invoice', 'namespace' => 'App\Livewire\Invoice' ], function() {
		Route::get('sales', Sales\Fiches::class);
		Route::get('sales/create', Sales\Create::class);
		Route::get('sales/{salesId}', Sales\Show::class);
		Route::get('sales/{salesId}/edit', Sales\Edit::class);

		Route::get('purchase', Purchase\Fiches::class);
		Route::get('purchase/create', Purchase\Create::class);
		Route::get('purchase/{purchaseId}', Purchase\Show::class);
		Route::get('purchase/{purchaseId}/edit', Purchase\Edit::class);
	});

	Route::get('vaults', App\Livewire\Vault\VaultManager::class);
	Route::group([ 'prefix' => 'vault', 'namespace' => 'App\Livewire\Vault' ], function() {
		Route::get('fiches', Fiches::class);
		Route::get('movements', Movements::class);
	});
});

