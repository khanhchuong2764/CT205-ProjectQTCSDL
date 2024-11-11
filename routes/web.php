<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProducersController;
use App\Http\Controllers\admin\UnitController;
use App\Http\Controllers\admin\AuthenController;
use App\Http\Controllers\admin\AccountController;

use App\Http\Controllers\client\HomeConntroller;
use App\Http\Controllers\client\ProductClientController;

Route::middleware(['authen'])->group(function () {

    Route::prefix('/admin/category')->group(function () {

        Route::get('/', [CategoryController::class, 'index']);    

        Route::get('/create', [CategoryController::class, 'create']); 

        Route::post('/create', [CategoryController::class, 'createPost']); 

        Route::patch('/ChangeStatus/{id}/{status}/', [CategoryController::class, 'ChangeStatus']);

        Route::delete('/delete/{id}', [CategoryController::class, 'Delete']);

        Route::get('/edit/{id}', [CategoryController::class, 'edit']);

        Route::patch('/edit/{id}', [CategoryController::class, 'editPatch']);

        Route::get('/detail/{id}', [CategoryController::class, 'detail']);

        Route::patch('/changeMulti', [CategoryController::class, 'changeMulti']);

    });

    
    Route::prefix('admin/product')->group(function () {
        
        Route::get('/', [ProductController::class, 'index']);

        Route::patch('/ChangeStatus/{id}/{status}/', [ProductController::class, 'ChangeStatus']);

        Route::patch('/changeMulti', [ProductController::class, 'changeMulti']);

        Route::delete('/delete/{id}', [ProductController::class, 'Delete']);

        Route::get('/create', [ProductController::class, 'create']);

        Route::post('/create', [ProductController::class, 'createPost']);

        Route::get('/edit/{id}', [ProductController::class, 'edit']);

        Route::patch('/edit/{id}', [ProductController::class, 'editPatch']);

        Route::get('/detail/{id}', [ProductController::class, 'detail']);
    });

    Route::prefix('admin/producers')->group(function () {
        
        Route::get('/', [ProducersController::class, 'index']);

        Route::delete('/delete/{id}', [ProducersController::class, 'Delete']);

        Route::get('/create', [ProducersController::class, 'create']);

        Route::post('/create', [ProducersController::class, 'createPost']);

        Route::get('/edit/{id}', [ProducersController::class, 'edit']);

        Route::patch('/edit/{id}', [ProducersController::class, 'editPatch']);

    });

    Route::prefix('admin/unit')->group(function () {
        
        Route::get('/', [UnitController::class, 'index']);

        Route::delete('/delete/{id}', [UnitController::class, 'Delete']);

        Route::get('/create', [UnitController::class, 'create']);

        Route::post('/create', [UnitController::class, 'createPost']);

        Route::get('/edit/{id}', [UnitController::class, 'edit']);

        Route::patch('/edit/{id}', [UnitController::class, 'editPatch']);

    });

    Route::prefix('admin/account')->group(function () {
        
        Route::get('/', [AccountController::class, 'index']);

        Route::patch('/ChangeStatus/{id}/{status}/', [AccountController::class, 'ChangeStatus']);

        Route::delete('/delete/{id}', [AccountController::class, 'Delete']);

        Route::get('/create', [AccountController::class, 'create']);

        Route::post('/create', [AccountController::class, 'createPost']);

        Route::get('/edit/{id}', [AccountController::class, 'edit']);

        Route::patch('/edit/{id}', [AccountController::class, 'editPatch']);

        Route::get('/detail/{id}', [AccountController::class, 'detail']);

    });
});


Route::prefix('admin/auth')->group(function () {

    Route::get('/login', [AuthenController::class, 'login']);

    Route::post('/login', [AuthenController::class, 'loginPost']);

    Route::get('/logout', [AuthenController::class, 'logout']);
});



// Clients

Route::prefix('/')->group(function () {

    Route::get('/', [HomeConntroller::class, 'index']);


});

Route::prefix('/products')->group(function () {

    Route::get('/', [ProductClientController::class, 'index']);

    Route::get('/detail/{id}', [ProductClientController::class, 'detail']);

});