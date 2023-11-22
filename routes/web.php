<?php

use Illuminate\Support\Facades\Route;

// Auth Controller
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;

// Admin Controller 
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ManageCategoriesController;
use App\Http\Controllers\admin\ManageProductsController;
use App\Http\Controllers\admin\ManageTransactionsController;

// User Controller
use App\Http\Controllers\user\ProfileUserController;
use App\Http\Controllers\user\PagesController;
use App\Http\Controllers\user\ProductController;
use App\Http\Controllers\user\CheckoutController;
use App\Http\Controllers\user\TransactionController;

// Homepage & Main Page ( Before Login )
Route::get('/', [PagesController::class, 'index'])->name('homepage');
Route::get('/show', [PagesController::class, 'showProduct'])->name('show.product');
Route::get('/product/detail/{id}', [PagesController::class, 'detailProduct'])->name('detail.product');
Route::get('/cart', [PagesController::class, 'cart'])->name('cart');

// GUEST 
Route::middleware('isGuest')->group(function () {
    // Auth
    Route::get('/login', [LoginController::class, 'login'])->name('login.page');
    Route::post('/login/auth', [LoginController::class, 'loginAuth'])->name('login');
    Route::get('/register', [RegisterController::class, 'register'])->name('register.page');
    Route::post('/register/input', [RegisterController::class, 'registerAccount'])->name('register.account');
});

// ROLE USER 
Route::middleware(['isLogin', 'CekRole:admin,user'])->group(function () {
    // CHANGE PROFILE
    Route::get('/profile', [ProfileUserController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [ProfileUserController::class, 'editProfile'])->name('profile.edit');
    Route::patch('/profile/edit', [ProfileUserController::class, 'changeProfile'])->name('profile.change');
    Route::patch('/profilePassword/edit', [ProfileUserController::class, 'changePassword'])->name('password.change');

    // CHECKOUT & PAYMENT HISTORY
    Route::get('/checkout', [PagesController::class, 'checkout'])->name('checkout');
    Route::get('/history', [PagesController::class, 'historyTransaction'])->name('history');
    Route::post('/pembayaran', [PagesController::class, 'pembayaran'])->name('pembayaran');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::patch('/history/penerimaan/{checkout:id}', [PagesController::class, 'penerimaan'])->name('penerimaan');
});


// ROLE ADMIN
Route::middleware(['isLogin', 'CekRole:admin'])->prefix('/dashboard')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index.admin');

        // CRUD PRODUCT
        Route::prefix('/product')->group(function () {
            Route::get('/', [ManageProductsController::class, 'index'])->name('product');
            Route::get('/create', [ManageProductsController::class, 'create'])->name('create.product');
            Route::post('/create/store', [ManageProductsController::class, 'store'])->name('dashboard.store.product');
            Route::get('/edit/{id}', [ManageProductsController::class, 'edit'])->name('edit.product');
            Route::put('/update/{id}', [ManageProductsController::class, 'update'])->name('update.product');
            Route::delete('/delete/{id}', [ManageProductsController::class, 'destroy'])->name('delete.product');
        });

        // CRUD CATEGORY
        Route::prefix('/category')->group(function () {
            Route::get('/', [ManageCategoriesController::class, 'index'])->name('category');
            Route::get('/create', [ManageCategoriesController::class, 'create'])->name('create.category');
            Route::post('/create/store', [ManageCategoriesController::class, 'store'])->name('dashboard.store.category');
            Route::get('/edit/{id}', [ManageCategoriesController::class, 'edit'])->name('edit.category');
            Route::put('/update/{id}', [ManageCategoriesController::class, 'update'])->name('update.category');
            Route::delete('/delete/{id}', [ManageCategoriesController::class, 'destroy'])->name('delete.category');
        });

        //USER DATA
        Route::get('/users', [AdminController::class, 'userData'])->name('users.data');
        Route::delete('/delete/{id}', [AdminController::class, 'userDelete'])->name('users.delete');

        // LIST ORDER & DETAIL PEMBAYARAN
        Route::get('/list-order', [AdminController::class, 'listOrder'])->name('list.order');
        Route::get('/detailpembayaran/{checkout:id}', [AdminController::class, 'detail_pembayaran'])->name('detail.pembayaran');
        Route::patch('/detailpembayaran/validasi/{checkout:id}', [AdminController::class, 'validasi'])->name('validasi');
        Route::patch('/detailpembayaran/tolak/{checkout:id}', [AdminController::class, 'tolak'])->name('tolak');
});