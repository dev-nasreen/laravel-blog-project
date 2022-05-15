<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
    Route::get('edit-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::put('update-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
    Route::get('delete-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);

    Route::get('posts', [App\Http\Controllers\admin\PostController::class, 'index']);
    Route::get('add-post', [App\Http\Controllers\admin\PostController::class, 'create']);
   Route::post('add-post', [App\Http\Controllers\admin\PostController::class, 'store']);
   Route::get('edit-post/{post_id}', [App\Http\Controllers\admin\PostController::class, 'edit']);
   Route::put('update-post/{post_id}', [App\Http\Controllers\admin\PostController::class, 'update']);
   Route::get('delete-post/{post_id}', [App\Http\Controllers\admin\PostController::class, 'destroy']);
   
   Route::get('users', [App\Http\Controllers\admin\userController::class, 'index']);
   Route::get('users/{user_id}', [App\Http\Controllers\admin\userController::class, 'edit']);
   Route::put('update-user/{user_id}', [App\Http\Controllers\admin\userController::class, 'update']);
});
 