<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::middleware('auth')->group(function () {
    
    Route::get('dashboard', function () {
        return view('dashboard.dashboard');
    })->middleware('verified')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('dashboard.profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('dashboard.profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('dashboard.profile.destroy');

    Route::resource('permissions', PermissionController::class)
        ->only(['index', 'store', 'update', 'destroy'])
        ->names('dashboard.permissions');

    Route::resource('roles', RoleController::class)
        ->only(['index', 'store', 'update', 'destroy'])
        ->names('dashboard.roles');

    Route::resource('users', UserController::class)
        ->except(['create', 'edit'])
        ->names('dashboard.users');

    Route::post('users/{user}/addrole', [UserController::class, 'addRole'])
        ->name('dashboard.users.addrole');

    Route::post('users/{user}/addpermission', [UserController::class, 'addPermission'])
        ->name('dashboard.users.addpermission');

    Route::resource('categories', CategoryController::class)
        ->only(['index', 'store', 'update', 'destroy'])
        ->names('dashboard.categories');

    Route::resource('products', ProductController::class)
        ->except(['create', 'edit'])
        ->names('dashboard.products');

    Route::delete('products/{product}/image/{image}', [ProductController::class, 'destroyImage'])
        ->name('dashboard.products.image.destroy');

    Route::resource('discounts', DiscountController::class)
        ->only(['index', 'store', 'update', 'destroy'])
        ->names('dashboard.discounts');
});

require __DIR__.'/auth.php';
