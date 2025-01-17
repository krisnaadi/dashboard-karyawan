<?php

use App\Livewire\Login\LoginPage;
use App\Livewire\Position\PositionList;
use App\Livewire\Unit\UnitList;
use Illuminate\Support\Facades\Route;

Route::get('/login', LoginPage::class)->name('login');

Route::group(['middleware' => 'auth', 'as' => 'master-data.'], function () {
    Route::get('/unit', UnitList::class)->name('unit.index');
    Route::get('/jabatan', PositionList::class)->name('position.index');
});
