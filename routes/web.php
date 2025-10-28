<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\LandingPage;
use App\Livewire\Root;
use App\Livewire\Onboarding;
use App\Livewire\Projects\Project;
use App\Livewire\Projects\ProjectDetail;
use Illuminate\Support\Facades\Route;

//landing page
Route::get('/welcome', LandingPage::class)->name('welcome');

// auth
Route::middleware(['guest'])->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});


// Onboarding → hanya untuk user login tapi belum onboarding
Route::get('/onboarding', Onboarding::class)->name('onboarding')->middleware(['auth', 'onboarding']);

// Dashboard (Root) → hanya untuk user login + sudah onboarding
Route::get('/', Root::class)->name('home')->middleware(['auth', 'onboarded']);

Route::prefix('projects')->middleware(['auth', 'onboarded'])->group(function () {
    Route::get('/', Project::class)->name('projects.index');
    Route::get('/{id}', ProjectDetail::class)->name('projects.show');
});
