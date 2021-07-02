<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::resource('category',CategoryController::class)->only(['index','store','show','update','destroy']);
Route::resource('posts',PostController::class)->only(['index','store','show','update','destroy']);
Route::resource('users',UserController::class)->only(['index','store','show','update','destroy']);

Route::post('/postsearch', [PostController::class, 'postsearch']);
Route::post('/usersearch', [UserController::class, 'usersearch']);

Route::post('/logintest', [UserController::class, 'logintest']);
Route::post('/show', [UserController::class, 'show']);


Route::post('/passstore', [UserController::class, 'passstore']);
Route::post('/export', [PostController::class, 'export']);


