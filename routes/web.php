<?php

use App\Models\User;
use App\Models\Sekolah;
use App\Models\Category;
use App\Models\TambahAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Symfony\Component\HttpFoundation\Request;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\UjianSekolahController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DataUjianController;
use App\Http\Controllers\Admin\TambahGuruController;
use App\Http\Controllers\Admin\TambahSiswaController;
use App\Http\Controllers\SuperAdmin\SekolahController;
use App\Http\Controllers\Admin\CategoryUjianController;
use App\Http\Controllers\SuperAdmin\TambahAdminController;
use App\Http\Controllers\Admin\DistribusiUjianKelasController;
use App\Http\Controllers\Admin\PostEssayController;

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

Route::get('/blank', function () {
    return view('admin.component.404');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard');


Auth::routes();
// ----------------- SUPER ADMIN -----------------------
Route::group(['middleware' => ['auth']], function(){
//Route Sekolah
    Route::controller(SekolahController::class)->group(function () {
        Route::get('/sekolah', 'index')->name('sekolah.index');
        Route::get('/sekolah-show-{id}', 'show')->name('sekolah.show');

        Route::get('/sekolah/create', 'create')->name('sekolah.create');
        Route::post('/sekolah/store', 'store')->name('sekolah.store');

        Route::get('/sekolah-edit-{id}', 'edit')->name('sekolah.edit');
        Route::post('/sekolah/update', 'update')->name('sekolah.update');

        Route::post('/importSekolah', 'importSekolah')->name('sekolah.importSekolah');

        Route::delete('/sekolahDeleteAll', 'deleteAll')->name('sekolah.deleteAll');
        Route::get('/sekolah/delete/{id}', 'destroy')->name('sekolah.delete');
    });

    Route::controller(TambahAdminController::class)->group(function () {
        Route::get('/admin', 'index')->name('admin.index');
        Route::get('/admin-show-{id}', 'show')->name('admin.show');

        Route::get('/admin/create', 'create')->name('admin.create');
        Route::post('/admin/store', 'store')->name('admin.store');

        Route::get('/admin-edit-{id}', 'edit')->name('admin.edit');
        Route::post('/admin/update', 'update')->name('admin.update');

        Route::delete('/adminDeleteAll', 'deleteAll')->name('admin.deleteAll');
        Route::get('/admin/delete/{id}', 'destroy')->name('admin.delete');
    });

});

// ----------------- ADMIN -----------------------
Route::group(['middleware' => ['auth','role:admin']], function(){
//Route Profile
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');

    Route::controller(PostEssayController::class)->group(function () {
        Route::get('/post-essay', 'index')->name('post-essay.index');
        Route::get('/post-essay-show-{id}', 'show')->name('post-essay.show');

        Route::get('/post-essay/create', 'create')->name('post-essay.create');
        Route::post('/post-essay/store', 'store')->name('post-essay.store');

        Route::get('/post-essay-edit-{id}', 'edit')->name('post-essay.edit');
        Route::post('/post-essay/update', 'update')->name('post-essay.update');

        Route::delete('/postEssayDeleteAll', 'deleteAll')->name('post-essay.deleteAll');
        Route::get('/post-essay/delete/{id}', 'destroy')->name('post-essay.delete');

        Route::post('/importPostsEssay', 'importPostsEssay')->name('posts.importPosts');

    });

// Route Post
    Route::get('/posts', [App\Http\Controllers\Admin\PostController::class, 'index'])->name('posts.index');
    Route::get('/posts-show-{id}', [App\Http\Controllers\Admin\PostController::class, 'show'])->name('posts.show');

    Route::get('/posts/create', [App\Http\Controllers\Admin\PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/store', [App\Http\Controllers\Admin\PostController::class, 'store'])->name('posts.store');

    Route::get('/posts-edit-{id}', [App\Http\Controllers\Admin\PostController::class, 'edit'])->name('posts.edit');
    Route::post('/posts/update', [App\Http\Controllers\Admin\PostController::class, 'update'])->name('posts.update');

    Route::get('/posts/delete/{id}', [App\Http\Controllers\Admin\PostController::class, 'destroy'])->name('posts.destroy');
    Route::delete('/postsDeleteAll', [App\Http\Controllers\Admin\PostController::class, 'deleteAll'])->name('posts.deleteAll');
    Route::post('/importPosts', [App\Http\Controllers\Admin\PostController::class, 'importPosts'])->name('posts.importPosts');

// Route Category Ujian
    Route::get('/categories-ujian', [App\Http\Controllers\Admin\CategoryUjianController::class, 'index'])->name('categories-ujian.index');
    Route::get('/categories-ujian-show-{id}', [App\Http\Controllers\Admin\CategoryUjianController::class, 'show'])->name('categories-ujian.show');

    Route::get('/categories-ujian/create', [App\Http\Controllers\Admin\CategoryUjianController::class, 'create'])->name('categories-ujian.create');
    Route::post('/categories-ujian/store', [App\Http\Controllers\Admin\CategoryUjianController::class, 'store'])->name('categories-ujian.store');

    Route::get('/categories-ujian-edit-{id}', [App\Http\Controllers\Admin\CategoryUjianController::class, 'edit'])->name('categories-ujian.edit');
    Route::post('/categories-ujian/update', [App\Http\Controllers\Admin\CategoryUjianController::class, 'update'])->name('categories-ujian.update');

    Route::get('/categories-ujian/delete/{id}', [App\Http\Controllers\Admin\CategoryUjianController::class, 'destroy'])->name('categories-ujian.destroy');
    Route::delete('/categories-ujianDeleteAll', [App\Http\Controllers\Admin\CategoryUjianController::class, 'deleteAll'])->name('categories-ujian.deleteAll');
    Route::post('/importCategoriesUjian', [App\Http\Controllers\Admin\CategoryUjianController::class, 'importCategoriesUjian'])->name('categories-ujian.importCategoriesUjian');

// Route Category Pelajaran
    Route::get('/categories-pelajaran', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories-pelajaran-show-{id}', [App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('categories.show');

    Route::get('/categories-pelajaran/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories-pelajaran/store', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('categories.store');

    Route::get('/categories-pelajaran-edit-{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/categories-pelajaran/update', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('categories.update');

    Route::get('/categories-pelajaran/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::delete('/categories-pelajaranDeleteAll', [App\Http\Controllers\Admin\CategoryController::class, 'deleteAll'])->name('categories.deleteAll');
    Route::post('/importCategories', [App\Http\Controllers\Admin\CategoryController::class, 'importCategories'])->name('categories.importCategories');

// Route Kelas
    Route::get('/kelas', [App\Http\Controllers\Admin\KelasController::class, 'index'])->name('kelas.index');
    Route::get('/kelas-show-{id}', [App\Http\Controllers\Admin\KelasController::class, 'show'])->name('kelas.show');

    Route::get('/kelas/create', [App\Http\Controllers\Admin\KelasController::class, 'create'])->name('kelas.create');
    Route::post('/kelas/store', [App\Http\Controllers\Admin\KelasController::class, 'store'])->name('kelas.store');

    Route::get('/kelas-edit-{id}', [App\Http\Controllers\Admin\KelasController::class, 'edit'])->name('kelas.edit');
    Route::post('/kelas/update', [App\Http\Controllers\Admin\KelasController::class, 'update'])->name('kelas.update');

    Route::get('/kelas/delete/{id}', [App\Http\Controllers\Admin\KelasController::class, 'destroy'])->name('kelas.destroy');
    Route::delete('/kelasDeleteAll', [App\Http\Controllers\Admin\KelasController::class, 'deleteAll'])->name('kelas.deleteAll');
    Route::post('/importKelas', [App\Http\Controllers\Admin\KelasController::class, 'importKelas'])->name('kelas.importKelas');

// Route Siswa
    Route::get('/siswa', [App\Http\Controllers\Admin\TambahSiswaController::class, 'index'])->name('siswa.index');
    Route::get('/siswa-show-{id}', [App\Http\Controllers\Admin\TambahSiswaController::class, 'show'])->name('siswa.show');

    Route::get('/siswa/create', [App\Http\Controllers\Admin\TambahSiswaController::class, 'create'])->name('siswa.create');
    Route::post('/siswa/store', [App\Http\Controllers\Admin\TambahSiswaController::class, 'store'])->name('siswa.store');

    Route::get('/siswa-edit-{id}', [App\Http\Controllers\Admin\TambahSiswaController::class, 'edit'])->name('siswa.edit');
    Route::post('/siswa/update', [App\Http\Controllers\Admin\TambahSiswaController::class, 'update'])->name('siswa.update');

    Route::get('/siswa/delete/{id}', [App\Http\Controllers\Admin\TambahSiswaController::class, 'destroy'])->name('siswa.destroy');
    Route::delete('/siswaDeleteAll', [App\Http\Controllers\Admin\TambahSiswaController::class, 'deleteAll'])->name('siswa.deleteAll');
    Route::post('/importSiswa', [App\Http\Controllers\Admin\TambahSiswaController::class, 'importSiswa'])->name('siswa.importSiswa');

// Route Guru
    Route::get('/guru', [App\Http\Controllers\Admin\TambahGuruController::class, 'index'])->name('guru.index');
    Route::get('/guru-show-{id}', [App\Http\Controllers\Admin\TambahGuruController::class, 'show'])->name('guru.show');

    Route::get('/guru/create', [App\Http\Controllers\Admin\TambahGuruController::class, 'create'])->name('guru.create');
    Route::post('/guru/store', [App\Http\Controllers\Admin\TambahGuruController::class, 'store'])->name('guru.store');

    Route::get('/guru-edit-{id}', [App\Http\Controllers\Admin\TambahGuruController::class, 'edit'])->name('guru.edit');
    Route::post('/guru/update', [App\Http\Controllers\Admin\TambahGuruController::class, 'update'])->name('guru.update');

    Route::get('/guru/delete/{id}', [App\Http\Controllers\Admin\TambahGuruController::class, 'destroy'])->name('guru.destroy');
    Route::delete('/guruDeleteAll', [App\Http\Controllers\Admin\TambahGuruController::class, 'deleteAll'])->name('guru.deleteAll');
    Route::post('/importGuru', [App\Http\Controllers\Admin\TambahGuruController::class, 'importGuru'])->name('guru.importGuru');

// Route Data Ujian
    Route::get('/dataUjian', [App\Http\Controllers\Admin\DataUjianController::class, 'indexDataUjian2'])->name('dataUjian.indexDataUjian');
    Route::get('/dataUjian-show-{id}', [App\Http\Controllers\Admin\DataUjianController::class, 'show'])->name('dataUjian.show');

    Route::delete('/dataUjianDeleteAll', [App\Http\Controllers\Admin\DataUjianController::class, 'deleteAll'])->name('dataUjian.deleteAll');


// Route Distribusi Ujian Kelas
    Route::get('/distribusiUjianKelas', [App\Http\Controllers\Admin\DistribusiUjianKelasController::class, 'index'])->name('distribusiUjianKelas.index');
    Route::get('/distribusiUjianKelas-show-{id}', [App\Http\Controllers\Admin\DistribusiUjianKelasController::class, 'show'])->name('distribusiUjianKelas.show');

    Route::get('/distribusiUjianKelas/create', [App\Http\Controllers\Admin\DistribusiUjianKelasController::class, 'create'])->name('distribusiUjianKelas.create');
    Route::post('/distribusiUjianKelas/store', [App\Http\Controllers\Admin\DistribusiUjianKelasController::class, 'store'])->name('distribusiUjianKelas.store');

    Route::get('/distribusiUjianKelas-edit-{id}', [App\Http\Controllers\Admin\DistribusiUjianKelasController::class, 'edit'])->name('distribusiUjianKelas.edit');
    Route::post('/distribusiUjianKelas/update', [App\Http\Controllers\Admin\DistribusiUjianKelasController::class, 'update'])->name('distribusiUjianKelas.update');

    Route::get('/distribusiUjianKelas/delete/{id}', [App\Http\Controllers\Admin\DistribusiUjianKelasController::class, 'destroy'])->name('distribusiUjianKelas.destroy');
    Route::delete('/distribusiUjianKelasDeleteAll', [App\Http\Controllers\Admin\DistribusiUjianKelasController::class, 'deleteAll'])->name('distribusiUjianKelas.deleteAll');
    Route::post('/importDistribusiUjianKelas', [App\Http\Controllers\Admin\DistribusiUjianKelasController::class, 'importDistribusiUjianKelas'])->name('distribusiUjianKelas.importDistribusiUjianKelas');

});

    // Route::get('/siswa-ujian', [App\Http\Controllers\SiswaUjianController::class, 'indexDistribusiUjianKelas'])->name('siswa-ujian.indexDistribusiUjianKelas');



// Route UjianSoal
    Route::get('/ujianSekolah', [App\Http\Controllers\Admin\DistribusiUjianKelasController::class, 'indexDistribusiUjianKelas'])->name('ujianSekolah.indexDistribusiUjianKelas')->middleware('auth');

    // Route::get('/ujianSekolah', [App\Http\Controllers\UjianSekolahController::class, 'index'])->name('ujianSekolah.index')->middleware('auth');
    Route::get('/ujianSekolah-selesai', [App\Http\Controllers\UjianSekolahController::class, 'indexSelesai'])->name('ujianSekolah.indexSelesai')->middleware('auth');
    Route::get('/ujianSekolah-show-{id}', [App\Http\Controllers\UjianSekolahController::class, 'show'])->name('ujianSekolah.show')->middleware('auth');

    Route::get('/ujianSekolah-create-{id}', [App\Http\Controllers\UjianSekolahController::class, 'create'])->name('ujianSekolah.create')->middleware('auth');
    Route::post('/ujianSekolah/store', [App\Http\Controllers\UjianSekolahController::class, 'store'])->name('ujianSekolah.store')->middleware('auth');
    // Route::get('/ujianSekolah-create', [App\Http\Controllers\UjianSekolahController::class, 'create'])->name('ujianSekolah.create')->middleware('auth');
    // Route::post('/ujianSekolah/store', [App\Http\Controllers\UjianSekolahController::class, 'store'])->name('ujianSekolah.store')->middleware('auth');



// Route Siswa
// Route::group(['middleware' => ['auth','role:siswa']], function () {
    Route::get('/home-siswa', [App\Http\Controllers\HomeController::class, 'indexSiswa'])->name('siswa.dashboard');
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');


// });

// Route Guru

    Route::get('/home-guru', [App\Http\Controllers\HomeController::class, 'indexGuru'])->name('guru.dashboard');
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
