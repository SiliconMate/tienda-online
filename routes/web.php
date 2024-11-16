<?php

use App\Http\Controllers\CategoryController;
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
        return view('dashboard');
    })->middleware('verified')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('permissions', PermissionController::class)
        ->only(['index', 'store', 'update', 'destroy'])
        ->names('permissions');

    Route::resource('roles', RoleController::class)
        ->only(['index', 'store', 'update', 'destroy'])
        ->names('roles');

    Route::resource('users', UserController::class)
        ->except(['create', 'edit'])
        ->names('users');

    Route::post('users/{user}/addrole', [UserController::class, 'addRole'])
        ->name('users.addrole');

    Route::post('users/{user}/addpermission', [UserController::class, 'addPermission'])
        ->name('users.addpermission');

    Route::resource('categories', CategoryController::class)
        ->only(['index', 'store', 'update', 'destroy'])
        ->names('categories');

    Route::resource('products', ProductController::class)
        ->except(['create', 'edit'])
        ->names('products');

    Route::delete('products/{product}/image/{image}', [ProductController::class, 'destroyImage'])
        ->name('products.image.destroy');
});

require __DIR__.'/auth.php';
