<?php

use App\Livewire\Login\LoginPage;
use Illuminate\Support\Facades\Route;

Route::get('/login', LoginPage::class)->name('login');
