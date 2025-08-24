<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RumahController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('rumah.home');
});
Route::get('/', [RumahController::class, 'index'])->name('rumah.index');
Route::get('login', [AuthController::class, 'loginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::middleware(['auth', 'is_admin'])->group(function (){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/admin/tambahproduk', [AdminController::class, 'showcreate'])->name('admin.tambahproduk');
    Route::post('admin/tambahproduk/create', [AdminController::class, 'store'])->name('admin.tambahproduk.store');
    Route::resource('tags', TagController::class)->names([
        'index' => 'admin.tags',
        'create' => 'tags.create',
        'store' => 'tags.store',
        'edit' => 'tags.edit',
        'update' => 'tags.update',
        'destroy' => 'tags.destroy',
    ]);
});



