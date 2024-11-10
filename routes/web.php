<?php

use App\Http\Controllers\PermissionController;
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
});

require __DIR__.'/auth.php';
