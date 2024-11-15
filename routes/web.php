<?php

use App\Http\Middleware\RequirePermission;
use App\Livewire\Auth\Login;
use App\Livewire\Features\Roles\RoleCreate;
use App\Livewire\Features\Roles\RoleEdit;
use App\Livewire\Features\Roles\RoleIndex;
use App\Livewire\Features\Users\UserCreate;
use App\Livewire\Features\Users\UserEdit;
use App\Livewire\Features\Users\UserIndex;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', action: Login::class)->name('login');
});
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    // ! Feautures 
    Route::get('/roles', RoleIndex::class)
        ->middleware('require.permission:roles,view')
        ->name('roles.index');
    Route::get('/roles/create', RoleCreate::class)
        ->middleware('require.permission:roles,create')
        ->name('roles.create');
    Route::get('/roles/{role}/edit', RoleEdit::class)
        ->middleware('require.permission:roles,edit')
        ->name('roles.edit');

    Route::get('/users', UserIndex::class)
        ->middleware('require.permission:users,view')
        ->name('users.index');
    Route::get('/users/create', UserCreate::class)
        ->middleware('require.permission:users,create')
        ->name('users.create');
    Route::get('/users/{user}/edit', action: UserEdit::class)
        ->middleware('require.permission:users,edit')
        ->name('users.edit');
});
