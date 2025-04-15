<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


use App\Livewire\BankComponent;
 
 
Route::get('/posts', BankComponent::class);
