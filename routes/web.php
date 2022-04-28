<?php

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TambahSiswaController;
use App\Http\Controllers\UjianSekolahController;

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

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// });


Auth::routes();
Route::group(['middleware' => ['auth']], function(){
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard');
    
//Route Profile
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
    
// Route Post
    Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
    Route::get('/posts-show-{id}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
    
    Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/store', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
    
    Route::get('/posts-edit-{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
    Route::post('/posts/update', [App\Http\Controllers\PostController::class, 'update'])->name('posts.update');
    
    Route::get('/posts/delete/{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy');
    Route::delete('/postsDeleteAll', [App\Http\Controllers\PostController::class, 'deleteAll'])->name('posts.deleteAll');
    Route::post('/importPosts', [App\Http\Controllers\PostController::class, 'importPosts'])->name('posts.importPosts');
    
// Route Category
    Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories-show-{id}', [App\Http\Controllers\CategoryController::class, 'show'])->name('categories.show');
    
    Route::get('/categories/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');
    
    Route::get('/categories-edit-{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/categories/update', [App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update');
    
    Route::get('/categories/delete/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::delete('categoriesDeleteAll', [App\Http\Controllers\CategoryController::class, 'deleteAll'])->name('categories.deleteAll');
    Route::post('/importCategories', [App\Http\Controllers\CategoryController::class, 'importCategories'])->name('categories.importCategories');
    
    
// Route Kelas
    Route::get('/kelas', [App\Http\Controllers\KelasController::class, 'index'])->name('kelas.index');
    Route::get('/kelas-show-{id}', [App\Http\Controllers\KelasController::class, 'show'])->name('kelas.show');
    
    Route::get('/kelas/create', [App\Http\Controllers\KelasController::class, 'create'])->name('kelas.create');
    Route::post('/kelas/store', [App\Http\Controllers\KelasController::class, 'store'])->name('kelas.store');
    
    Route::get('/kelas-edit-{id}', [App\Http\Controllers\KelasController::class, 'edit'])->name('kelas.edit');
    Route::post('/kelas/update', [App\Http\Controllers\KelasController::class, 'update'])->name('kelas.update');
    
    Route::get('/kelas/delete/{id}', [App\Http\Controllers\KelasController::class, 'destroy'])->name('kelas.destroy');
    Route::delete('/kelasDeleteAll', [App\Http\Controllers\KelasController::class, 'deleteAll'])->name('kelas.deleteAll');
    Route::post('/importKelas', [App\Http\Controllers\KelasController::class, 'importKelas'])->name('kelas.importKelas');
    
// Route Siswa
    Route::get('/siswa', [App\Http\Controllers\TambahSiswaController::class, 'index'])->name('siswa.index');
    Route::get('/siswa-show-{id}', [App\Http\Controllers\TambahSiswaController::class, 'show'])->name('siswa.show');
    
    Route::get('/siswa/create', [App\Http\Controllers\TambahSiswaController::class, 'create'])->name('siswa.create');
    Route::post('/siswa/store', [App\Http\Controllers\TambahSiswaController::class, 'store'])->name('siswa.store');
 
    Route::get('/siswa-edit-{id}', [App\Http\Controllers\TambahSiswaController::class, 'edit'])->name('siswa.edit');
    Route::post('/siswa/update', [App\Http\Controllers\TambahSiswaController::class, 'update'])->name('siswa.update');
 
    Route::get('/siswa/delete/{id}', [App\Http\Controllers\TambahSiswaController::class, 'destroy'])->name('siswa.destroy');
    Route::delete('/siswaDeleteAll', [App\Http\Controllers\TambahSiswaController::class, 'deleteAll'])->name('siswa.deleteAll');
    Route::post('/importSiswa', [App\Http\Controllers\TambahSiswaController::class, 'importSiswa'])->name('siswa.importSiswa');

// Route UjianSoal
    Route::get('/ujianSekolah', [App\Http\Controllers\UjianSekolahController::class, 'index'])->name('ujianSekolah.index');

});