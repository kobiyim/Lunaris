<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


use App\Livewire\BankComponent;
use App\Livewire\CardComponent;
use App\Livewire\ItemComponent;
use App\Livewire\UnitSetComponent;

Route::get('unit-sets', UnitSetComponent::class);
 
 
Route::get('/banks', BankComponent::class);
Route::get('/cards', CardComponent::class);
Route::get('/items', ItemComponent::class);
