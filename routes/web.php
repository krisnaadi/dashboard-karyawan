<?php

use App\Livewire\Login\LoginPage;
use App\Livewire\Unit\UnitList;
use Illuminate\Support\Facades\Route;

Route::get('/login', LoginPage::class)->name('login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/unit', UnitList::class)->name('unit.index');
});
