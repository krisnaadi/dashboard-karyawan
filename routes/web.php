<?php

use App\Livewire\Dashboard\DashboardPage;
use App\Livewire\Employee\EmployeeList;
use App\Livewire\Login\LoginPage;
use App\Livewire\Position\PositionList;
use App\Livewire\Unit\UnitList;
use Illuminate\Support\Facades\Route;

Route::get('/login', LoginPage::class)->name('login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', DashboardPage::class)->name('dashboard.index');
    Route::group(['as' => 'master-data.'], function () {
        Route::get('/unit', UnitList::class)->name('unit.index');
        Route::get('/jabatan', PositionList::class)->name('position.index');
        Route::get('/karyawan', EmployeeList::class)->name('employee.index');
    });
});
