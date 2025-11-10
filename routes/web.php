<?php

use App\Livewire\Applications\Application;
use App\Livewire\Applications\ApplicationByProject;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Logout;
use App\Livewire\Auth\Register;
use App\Livewire\LandingPage;
use App\Livewire\Projects\ProjectForm;
use App\Livewire\Root;
use App\Livewire\Onboarding;
use App\Livewire\Projects\Project;
use App\Livewire\Projects\ProjectDetail;
use App\Livewire\Talents\Talent;
use App\Livewire\Talents\TalentDetail;
use Illuminate\Support\Facades\Route;

//landing page
Route::get('/welcome', LandingPage::class)->name('welcome');

// auth
Route::middleware(['guest'])->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

Route::get('/logout', [Logout::class, 'logout'])->name('logout');


// Onboarding → hanya untuk user login tapi belum onboarding
Route::get('/onboarding', Onboarding::class)->name('onboarding')->middleware(['auth', 'onboarding']);

// Dashboard (Root) → hanya untuk user login + sudah onboarding
Route::get('/', Root::class)->name('home')->middleware(['auth', 'onboarded']);

Route::prefix('projects')->middleware(['auth', 'onboarded'])->group(function () {
    Route::get('/', Project::class)->name('projects.index');
    Route::get('/create', ProjectForm::class)->name('projects.create');
    Route::get('/{id}', ProjectDetail::class)->name('projects.show');
    Route::get('/{project}/edit', ProjectForm::class)->name('projects.edit');
});

Route::prefix('talents')->middleware(['auth', 'onboarded'])->group(function () {
    Route::get('/', Talent::class)->name('talents.index');
    Route::get('/{id}', TalentDetail::class)->name('talents.show');
});

Route::prefix('applications')->middleware(['auth', 'onboarded'])->group(function () {
    Route::get('/', Application::class)->name('applications.index');
    Route::get('/project/{project}', ApplicationByProject::class)->name('applications.byProject');
});
