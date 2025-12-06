<?php

use App\Livewire\Admin\Category;
use App\Livewire\Admin\DashboardAdmin;
use App\Livewire\Admin\Roles\Role;
use App\Livewire\User\Applications\Application;
use App\Livewire\User\Applications\Components\ReceivedByProject;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Logout;
use App\Livewire\Auth\Register;
use App\Livewire\LandingPage;
use App\Livewire\User\Projects\ProjectForm;
use App\Livewire\User\DashboardUser;
use App\Livewire\Onboarding;
use App\Livewire\Profile\EditProfile;
use App\Livewire\Profile\Profile;
use App\Livewire\User\Projects\Project;
use App\Livewire\User\Projects\ProjectDetail;
use App\Livewire\User\Projects\Workspace;
use App\Livewire\User\Projects\Workspace\Discussion;
use App\Livewire\User\Projects\Workspace\Task;
use App\Livewire\User\Talents\Talent;
use App\Livewire\User\Talents\TalentDetail;
use Illuminate\Support\Facades\Route;

//landing page
Route::get('/', LandingPage::class)->name('welcome');

// auth
Route::middleware(['guestByRole'])->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

Route::get('/logout', [Logout::class, 'logout'])->name('logout');


// Onboarding → hanya untuk user login tapi belum onboarding
Route::get('/onboarding', Onboarding::class)->name('onboarding')->middleware(['auth', 'onboarding']);

Route::prefix('user')->middleware(['auth', 'user'])->group(function () {
    Route::get('/', DashboardUser::class)->name('user.home');

    Route::prefix('projects')->group(function () {
        Route::get('/', Project::class)->name('projects.index');
        Route::get('/create', ProjectForm::class)->name('projects.create');
        Route::get('/{project}', ProjectDetail::class)->name('projects.show');
        Route::get('/{project}/edit', ProjectForm::class)->name('projects.edit');
        Route::get('/{project}/workspace/task', Task::class)->name('projects.workspace.task');
        Route::get('/{project}/workspace/discussion', Discussion::class)->name('projects.workspace.discussion');
    });

    Route::prefix('talents')->group(function () {
        Route::get('/', Talent::class)->name('talents.index');
        Route::get('/{id}', TalentDetail::class)->name('talents.show');
    });

    Route::prefix('applications')->group(function () {
        Route::get('/', Application::class)->name('applications.index');
        Route::get('/project/{project}', ReceivedByProject::class)->name('applications.byProject');
    });
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', DashboardAdmin::class)->name('admin.home');

    Route::prefix('roles')->group(function () {
        Route::get('/', Role::class)->name('admin.roles.index');
    });
    Route::prefix('categories')->group(function () {
        Route::get('/', Category::class)->name('admin.categories.index');
    });
});

Route::prefix('profile')->middleware(['auth', 'onboarded'])->group(function () {
    Route::get('/', Profile::class)->name('profile.show');
    Route::get('/edit', EditProfile::class)->name('profile.edit');
});
