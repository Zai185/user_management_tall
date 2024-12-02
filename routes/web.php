<?php

use App\Http\Middleware\RequirePermission;
use App\Livewire\Auth\Login;
use App\Livewire\Features\Brands\BrandCreate;
use App\Livewire\Features\Brands\BrandEdit;
use App\Livewire\Features\Brands\BrandIndex;
use App\Livewire\Features\Categories\CategoryCreate;
use App\Livewire\Features\Categories\CategoryEdit;
use App\Livewire\Features\Categories\CategoryIndex;
use App\Livewire\Features\Products\ProductCreate;
use App\Livewire\Features\Products\ProductEdit;
use App\Livewire\Features\Products\ProductIndex;
use App\Livewire\Features\Roles\RoleCreate;
use App\Livewire\Features\Roles\RoleEdit;
use App\Livewire\Features\Roles\RoleIndex;
use App\Livewire\Features\Units\UnitCreate;
use App\Livewire\Features\Units\UnitEdit;
use App\Livewire\Features\Units\UnitIndex;
use App\Livewire\Features\Users\UserCreate;
use App\Livewire\Features\Users\UserEdit;
use App\Livewire\Features\Users\UserIndex;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', action: Login::class)->name('login');
});
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    //! Roles
    Route::prefix("/roles")->group(function () {
        Route::get('/', RoleIndex::class)
            ->name('roles.index');
        Route::get('/create', RoleCreate::class)
            ->middleware('require.permission:roles,create')
            ->name('roles.create');
        Route::get('/{role}/edit', RoleEdit::class)
            ->middleware('require.permission:roles,edit')
            ->name('roles.edit');
    })->middleware('require.permission:roles,view');

    //! Users
    Route::prefix("/users")->group(function () {
        Route::get('/', UserIndex::class)
            ->middleware(middleware: 'require.permission:users,view')
            ->name('users.index');
        Route::get('/create', UserCreate::class)
            ->middleware('require.permission:users,create')
            ->name('users.create');
        Route::get('/{user}/edit', action: UserEdit::class)
            ->middleware('require.permission:users,edit')
            ->name('users.edit');
    });

    //! Products
    Route::get("/products", ProductIndex::class)
        ->name('products.index')
        ->middleware('require.permission:products,view');
    Route::get("/products/create", ProductCreate::class)
        ->middleware('require.permission:products,create')
        ->name('products.create');
    Route::get("/products/{product}/edit", ProductEdit::class)
        ->middleware('require.permission:products,edit')
        ->name('products.edit');
    // //! Products
    // Route::prefix("/products")->group(function () {
    //     Route::get("/", ProductIndex::class)

    //         ->name('products.index');
    //     Route::get("/create", ProductCreate::class)
    //         ->middleware('require.permission:products,create')
    //         ->name('products.create');
    //     Route::get("/{product}/edit", ProductEdit::class)
    //         ->middleware('require.permission:products,edit')
    //         ->name('products.edit');
    // })->middleware('require.permission:products,view');

    Route::prefix("/categories")->group(function () {
        Route::get("/", CategoryIndex::class)
            ->middleware('require.permission:categories,view')
            ->name('categories.index');
        Route::get("/create", CategoryCreate::class)
            ->middleware('require.permission:categories,create')
            ->name('categories.create');
        Route::get("/{category}/edit", CategoryEdit::class)
            ->middleware('require.permission:categories,edit')
            ->name('categories.edit');
    });

    Route::prefix("/brands")->group(function () {
        Route::get("/", BrandIndex::class)
            ->middleware('require.permission:brands,view')
            ->name('brands.index');
        Route::get("/create", BrandCreate::class)
            ->middleware('require.permission:brands,create')
            ->name('brands.create');
        Route::get("/{brand}/edit", BrandEdit::class)
            ->middleware('require.permission:brands,edit')
            ->name('brands.edit');
    });

    Route::prefix("/units")->group(function () {
        Route::get("/", UnitIndex::class)
            ->middleware('require.permission:units,view')
            ->name('units.index');
        Route::get("/create", UnitCreate::class)
            ->middleware('require.permission:units,create')
            ->name('units.create');
        Route::get("/{unit}/edit", UnitEdit::class)
            ->middleware('require.permission:units,edit')
            ->name('units.edit');
    });
});
