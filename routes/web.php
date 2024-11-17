<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Shop\ProductController as ShopProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Shop\CategoryController as ShopCategoryController;
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

    Route::resource('admin-permissions', PermissionController::class)
        ->only(['index', 'store', 'update', 'destroy'])
        ->names('dashboard.permissions');

    Route::resource('admin-roles', RoleController::class)
        ->only(['index', 'store', 'update', 'destroy'])
        ->names('dashboard.roles');

    Route::resource('admin-users', UserController::class)
        ->except(['create', 'edit'])
        ->names('dashboard.users');

    Route::post('admin-users/{user}/addrole', [UserController::class, 'addRole'])
        ->name('dashboard.users.addrole');

    Route::post('admin-users/{user}/addpermission', [UserController::class, 'addPermission'])
        ->name('dashboard.users.addpermission');

    Route::resource('admin-categories', CategoryController::class)
        ->only(['index', 'store', 'update', 'destroy'])
        ->names('dashboard.categories');

    Route::resource('admin-products', ProductController::class)
        ->except(['create', 'edit'])
        ->names('dashboard.products');

    Route::delete('admin-products/{product}/image/{image}', [ProductController::class, 'destroyImage'])
        ->name('dashboard.products.image.destroy');

    Route::resource('admin-discounts', DiscountController::class)
        ->only(['index', 'store', 'update', 'destroy'])
        ->names('dashboard.discounts');
});

Route::resource('products', ShopProductController::class)
    ->only(['index', 'show'])
    ->names('products');

Route::post('products/{product}/apply-discount', [ShopProductController::class, 'applyDiscount'])
    ->name('apply.discount');

Route::resource('shop/categories', ShopCategoryController::class)->only(['index', 'show'])->names('categories');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

Route::get('/checkout/complete', [CheckoutController::class, 'completed'])->name('checkout.completed');

require __DIR__.'/auth.php';
