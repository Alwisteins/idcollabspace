<?php

use App\Livewire\Users\Applications\Application;
use App\Livewire\Users\Applications\ApplicationByProject;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Logout;
use App\Livewire\Auth\Register;
use App\Livewire\LandingPage;
use App\Livewire\Users\Projects\ProjectForm;
use App\Livewire\Users\DashboardUser;
use App\Livewire\Onboarding;
use App\Livewire\Profile\EditProfile;
use App\Livewire\Profile\Profile;
use App\Livewire\Users\Projects\Project;
use App\Livewire\Users\Projects\ProjectDetail;
use App\Livewire\Users\Talents\Talent;
use App\Livewire\Users\Talents\TalentDetail;
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

Route::prefix('user')->middleware(['auth', 'onboarded'])->group(function () {
    Route::get('/', DashboardUser::class)->name('home');

    Route::prefix('projects')->group(function () {
        Route::get('/', Project::class)->name('projects.index');
        Route::get('/create', ProjectForm::class)->name('projects.create');
        Route::get('/{id}', ProjectDetail::class)->name('projects.show');
        Route::get('/{project}/edit', ProjectForm::class)->name('projects.edit');
    });

    Route::prefix('talents')->group(function () {
        Route::get('/', Talent::class)->name('talents.index');
        Route::get('/{id}', TalentDetail::class)->name('talents.show');
    });

    Route::prefix('applications')->group(function () {
        Route::get('/', Application::class)->name('applications.index');
        Route::get('/project/{project}', ApplicationByProject::class)->name('applications.byProject');
    });
});

Route::prefix('profile')->middleware(['auth', 'onboarded'])->group(function () {
    Route::get('/', Profile::class)->name('profile.show');
    Route::get('/edit', EditProfile::class)->name('profile.edit');
});
