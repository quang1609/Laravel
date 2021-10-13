<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\User\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('admin/user/login',[LoginController::class,'index'])->name('login');
Route::post('admin/user/login',[LoginController::class,'store']);

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('main', [MainController::class, 'index']);  

        #item
        Route::get('item/list', [ItemController::class, 'index']);
        Route::get('item/add', [ItemController::class, 'create']);
        Route::post('item/add', [ItemController::class, 'store']);
        Route::get('item/edit/{id}', [ItemController::class, 'show']);
        Route::post('item/edit/{id} ', [ItemController::class, 'update']);
        Route::get('item/destroy/{id}', [ItemController::class, 'destroy']);

        #user
        Route::get('user/list', [UserController::class, 'index']);
        Route::get('user/add', [UserController::class, 'create']);
        Route::post('user/add', [UserController::class, 'store']);
        Route::get('user/change', [UserController::class, 'show']);
        Route::post('user/change', [UserController::class, 'update']);

        #category
        Route::get('category/list', [CategoryController::class, 'index']);
        Route::get('category/add', [CategoryController::class, 'create']);
        Route::post('category/add', [CategoryController::class, 'store']);
    });
    
});
