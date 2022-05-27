<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\Admin\CategoryAPIController;
use App\Http\Controllers\API\Admin\CategoryUjianApiController;
use App\Http\Controllers\API\Admin\KelasApiController;
use App\Http\Controllers\API\Admin\PostApiController;
use App\Http\Controllers\API\Admin\PostEssayApiController;

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

Route::controller(AuthController::class)->group(function () {
    Route::get('/auth/index', 'index');
    Route::post('/auth/register', 'register');
    Route::post('/auth/login', 'login');
    Route::post('/auth/logout', 'logout');
    Route::post('/auth/person', 'userDetail');
});

Route::controller(CategoryUjianApiController::class)->group(function () {
    Route::get('/categories-ujian/index', 'index');
    Route::post('/categories-ujian/store', 'store');
    Route::post('/categories-ujian/update', 'update');
    Route::post('/categories-ujian/delete', 'delete');
});

Route::controller(CategoryAPIController::class)->group(function () {
    Route::get('/categories-pelajaran/index', 'index');
    Route::post('/categories-pelajaran/store', 'store');
    Route::post('/categories-pelajaran/update', 'update');
    Route::post('/categories-pelajaran/delete', 'delete');
});

Route::controller(KelasApiController::class)->group(function () {
    Route::get('/kelas/index', 'index');
    Route::post('/kelas/store', 'store');
    Route::post('/kelas/update', 'update');
    Route::post('/kelas/delete', 'delete');
});

Route::controller(PostApiController::class)->group(function () {
    Route::get('/posts/index', 'index');
    Route::post('/posts/store', 'store');
    Route::post('/posts/update', 'update');
    Route::post('/posts/delete', 'delete');
});

Route::controller(PostEssayApiController::class)->group(function () {
    Route::get('/posts-essay/index', 'index');
    Route::post('/posts-essay/store', 'store');
    Route::post('/posts-essay/update', 'update');
    Route::post('/posts-essay/delete', 'delete');
});









