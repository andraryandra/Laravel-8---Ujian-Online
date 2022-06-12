<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\Admin\CategoryAPIController;
use App\Http\Controllers\API\Admin\CategoryUjianApiController;
use App\Http\Controllers\API\Admin\DataUjianApiController;
use App\Http\Controllers\API\Admin\DistribusiUjianKelasApiController;
use App\Http\Controllers\API\Admin\KelasApiController;
use App\Http\Controllers\API\Admin\PostApiController;
use App\Http\Controllers\API\Admin\PostEssayApiController;
use App\Http\Controllers\API\UjianSekolahApiController;
use App\Http\Controllers\API\UjianSekolahEssayApiController;
use App\Http\Controllers\PassportController;

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

Route::controller(AuthController::class)->group(function() {
    Route::get('/auth/index', 'index');
    Route::get('/auth/indexSuperAdmin', 'indexSuperAdmin');
    Route::get('/auth/indexAdmin', 'indexAdmin');
    Route::get('/auth/indexGuru', 'indexGuru');
    Route::get('/auth/indexSiswa', 'indexSiswa');

    Route::post('/auth/login', 'login');
    Route::post('/auth/register', 'register');

    // put all api protected routes here
        Route::post('/auth/user-detail', 'userDetail');
        Route::post('/auth/logout', 'logout');

});

// Route::controller(PassportController::class)->group(function() {
//     Route::get('/auth/index', 'index');
//     Route::get('/auth/indexSuperAdmin', 'indexSuperAdmin');
//     Route::get('/auth/indexAdmin', 'indexAdmin');
//     Route::get('/auth/indexGuru', 'indexGuru');
//     Route::get('/auth/indexSiswa', 'indexSiswa');

//     Route::post('/auth/login', 'login');
//     Route::post('/auth/register', 'register');

//     // put all api protected routes here
//     Route::middleware('auth:api')->group(function () {
//         Route::post('/auth/user-detail', 'userDetail');
//         Route::post('/auth/logout', 'logout');
//     });
// });

Route::controller(CategoryUjianApiController::class)->group(function () {
    Route::get('categories-ujian', 'index');
    Route::post('categories-ujian/store', 'store');
    Route::post('categories-ujian/update', 'update');
    Route::post('categories-ujian/delete', 'delete');
});

Route::controller(CategoryAPIController::class)->group(function () {
    Route::get('categoriesPelajaran', 'index');
    Route::post('categories-pelajaran/store', 'store');
    Route::post('categories-pelajaran/update', 'update');
    Route::post('categories-pelajaran/delete', 'delete');
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

Route::controller(DistribusiUjianKelasApiController::class)->group(function () {
    Route::get('/distribusi-ujian-kelas/index', 'index');
    Route::post('/distribusi-ujian-kelas/store', 'store');
    Route::post('/distribusi-ujian-kelas/update', 'update');
    Route::post('/distribusi-ujian-kelas/delete', 'delete');
});

Route::controller(DataUjianApiController::class)->group(function () {
    Route::get('/data-ujian/index', 'indexDataUjian2');
    Route::get('/data-ujian/show/{id}', 'show');
});

Route::controller(UjianSekolahApiController::class)->group(function () {
    Route::get('/ujian-sekolah/index', 'index');
    Route::post('/ujian-sekolah/store', 'store');
    Route::post('/ujian-sekolah/update', 'update');
    Route::post('/ujian-sekolah/delete', 'delete');
});

Route::controller(UjianSekolahEssayApiController::class)->group(function () {
    Route::get('/ujian-sekolah-essay/index', 'index');
    Route::post('/ujian-sekolah-essay/store', 'store');
    Route::post('/ujian-sekolah-essay/update', 'update');
    Route::post('/ujian-sekolah-essay/delete', 'delete');
});












