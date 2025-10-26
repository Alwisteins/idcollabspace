<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\LandingPage;
use App\Livewire\Root;
use App\Livewire\Onboarding;
use Illuminate\Support\Facades\Route;

// Dashboard (Root) → hanya untuk user login + sudah onboarding
Route::get('/', Root::class)->name('home')->middleware(['auth', 'onboarded']);

// Onboarding → hanya untuk user login tapi belum onboarding
Route::get('/onboarding', Onboarding::class)->name('onboarding')->middleware(['auth', 'onboarding']);

Route::get('/welcome', LandingPage::class)->name('welcome');
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');
