<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/auth/index', [AuthController::class, 'index']);
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/logout', [AuthController::class, 'logout']);
Route::post('/auth/person', [AuthController::class, 'userDetail']);

Route::controller(CategoryAPIController::class)->group(function () {
    Route::get('/category-pelajaran', [CategoryAPIController::class, 'index']);
    Route::get('/category-pelajaran/{id}', [CategoryAPIController::class, 'show']);
    Route::post('/category-pelajaran', [CategoryAPIController::class, 'store']);
    Route::put('/category-pelajaran/{id}', [CategoryAPIController::class, 'update']);
    Route::delete('/category-pelajaran/{id}', [CategoryAPIController::class, 'destroy']);
});
