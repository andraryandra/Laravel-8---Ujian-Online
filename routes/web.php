<?php

use App\Models\User;
use App\Models\Sekolah;
use App\Models\Category;
use App\Models\TambahAdmin;
use App\Models\CategoryUjian;
use Illuminate\Support\Facades\Auth;
use UniSharp\LaravelFilemanager\Lfm;
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
use App\Http\Controllers\Admin\PostEssayController;
use App\Http\Controllers\Admin\TambahGuruController;
use App\Http\Controllers\Admin\TambahSiswaController;
use App\Http\Controllers\SuperAdmin\SekolahController;
use App\Http\Controllers\Admin\CategoryUjianController;
use App\Http\Controllers\SuperAdmin\TambahAdminController;
use App\Http\Controllers\Admin\DistribusiUjianKelasController;
use App\Http\Controllers\AuthenticationLogController;
use App\Http\Middleware\Authenticate;

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
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();

});

// Route::get('/log', function() {
//     return view('admin.log');
//     // Route::get('/log', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('log');
// })->name('log')->middleware('auth');

Route::get('/log', [AuthenticationLogController::class, 'index'])->name('log');

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
        Route::get('/sekolah/delete/{id}', 'destroy')->name('sekolah.destroy');
    });

    Route::controller(TambahAdminController::class)->group(function () {
        Route::get('/admin', 'index')->name('admin.index');
        Route::get('/admin-show-{id}', 'show')->name('admin.show');

        Route::get('/admin/create', 'create')->name('admin.create');
        Route::post('/admin/store', 'store')->name('admin.store');

        Route::get('/admin-edit-{id}', 'edit')->name('admin.edit');
        Route::post('/admin/update', 'update')->name('admin.update');

        Route::delete('/adminDeleteAll', 'deleteAll')->name('admin.deleteAll');
        Route::get('/admin/delete/{id}', 'destroy')->name('admin.destroy');
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
        Route::get('/post-essay/delete/{id}', 'destroy')->name('post-essay.destroy');

        Route::post('/importPostsEssay', 'importPostsEssay')->name('posts.importPosts');

    });

// Route Post
    Route::controller(PostController::class)->group(function () {
        Route::get('/posts', 'index')->name('posts.index');
        Route::get('/posts-show-{id}', 'show')->name('posts.show');

        Route::get('/posts/create', 'create')->name('posts.create');
        Route::post('/posts/store', 'store')->name('posts.store');

        Route::get('/posts-edit-{id}', 'edit')->name('posts.edit');
        Route::post('/posts/update', 'update')->name('posts.update');

        Route::delete('/postsDeleteAll', 'deleteAll')->name('posts.deleteAll');
        Route::get('/posts/delete/{id}', 'destroy')->name('posts.destroy');

        Route::post('/importPosts', 'importPosts')->name('posts.importPosts');

    });

    Route::controller(CategoryUjianController::class)->group(function () {
        Route::get('/categories-ujian', 'index')->name('categories-ujian.index');
        Route::get('/categories-ujian-show-{id}', 'show')->name('categories-ujian.show');

        Route::get('/categories-ujian/create', 'create')->name('categories-ujian.create');
        Route::post('/categories-ujian/store', 'store')->name('categories-ujian.store');

        Route::get('/categories-ujian-edit-{id}', 'edit')->name('categories-ujian.edit');
        Route::post('/categories-ujian/update', 'update')->name('categories-ujian.update');

        Route::delete('/categories-ujianDeleteAll', 'deleteAll')->name('categories-ujian.deleteAll');
        Route::get('/categories-ujian/delete/{id}', 'destroy')->name('categories-ujian.destroy');

        Route::post('/importCategoriesUjian', 'importCategoriesUjian')->name('categories-ujian.importCategoriesUjian');

    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories-pelajaran', 'index')->name('categories.index');
        Route::get('/categories-pelajaran-show-{id}', 'show')->name('categories.show');

        Route::get('/categories-pelajaran/create', 'create')->name('categories.create');
        Route::post('/categories-pelajaran/store', 'store')->name('categories.store');

        Route::get('/categories-pelajaran-edit-{id}', 'edit')->name('categories.edit');
        Route::post('/categories-pelajaran/update', 'update')->name('categories.update');

        Route::delete('/categories-pelajaranDeleteAll', 'deleteAll')->name('categories.deleteAll');
        Route::get('/categories-pelajaran/delete/{id}', 'destroy')->name('categories.destroy');

        Route::post('/importCategories', 'importCategories')->name('categories.importCategories');

    });

    Route::controller(KelasController::class)->group(function () {
        Route::get('/kelas', 'index')->name('kelas.index');
        Route::get('/kelas-show-{id}', 'show')->name('kelas.show');

        Route::get('/kelas/create', 'create')->name('kelas.create');
        Route::post('/kelas/store', 'store')->name('kelas.store');

        Route::get('/kelas-edit-{id}', 'edit')->name('kelas.edit');
        Route::post('/kelas/update', 'update')->name('kelas.update');

        Route::delete('/kelasDeleteAll', 'deleteAll')->name('kelas.deleteAll');
        Route::get('/kelas/delete/{id}', 'destroy')->name('kelas.destroy');

        Route::post('/importKelas', 'importKelas')->name('kelas.importKelas');

    });

    Route::controller(TambahSiswaController::class)->group(function () {
        Route::get('/siswa', 'index')->name('siswa.index');

        Route::get('/siswaPrint', 'listSiswa')->name('siswa.print');
        Route::get('/siswa-show-{id}', 'show')->name('siswa.show');

        Route::get('/siswa/create', 'create')->name('siswa.create');
        Route::post('/siswa/store', 'store')->name('siswa.store');

        Route::get('/siswa-edit-{id}', 'edit')->name('siswa.edit');
        Route::post('/siswa/update', 'update')->name('siswa.update');

        Route::delete('/siswaDeleteAll', 'deleteAll')->name('siswa.deleteAll');
        Route::get('/siswa/delete/{id}', 'destroy')->name('siswa.destroy');

        Route::post('/importSiswa', 'importSiswa')->name('siswa.importSiswa');
    });

// Route Tambah Guru
    Route::controller(TambahGuruController::class)->group(function () {
        Route::get('/guru', 'index')->name('guru.index');

        Route::get('/guruPrint', 'listGuru')->name('guru.print');
        Route::get('/guru-show-{id}', 'show')->name('guru.show');

        Route::get('/guru/create', 'create')->name('guru.create');
        Route::post('/guru/store', 'store')->name('guru.store');

        Route::get('/guru-edit-{id}', 'edit')->name('guru.edit');
        Route::post('/guru/update', 'update')->name('guru.update');

        Route::delete('/guruDeleteAll', 'deleteAll')->name('guru.deleteAll');
        Route::get('/guru/delete/{id}', 'destroy')->name('guru.destroy');

        Route::post('/importGuru', 'importGuru')->name('guru.importGuru');
    });

// Route Data Ujian
    Route::controller(DataUjianController::class)->group(function () {
        Route::get('/dataUjian', 'indexDataUjian2')->name('dataUjian.indexDataUjian')->middleware('auth');
        Route::get('/dataUjian-show-{id}', 'show')->name('dataUjian.show');

        Route::get('/dataUjian-edit-{id}', 'edit')->name('dataUjian.edit');
        Route::post('/dataUjian/update', 'update')->name('dataUjian.update');

        Route::get('/dataUjian/delete/{id}', 'destroy')->name('dataUjian.destroy');
    });

// Route Distribusi Ujian Kelas
    Route::controller(DistribusiUjianKelasController::class)->group(function () {
        Route::get('/distribusiUjianKelas', 'index')->name('distribusiUjianKelas.index');
        Route::get('/distribusiUjianKelas-show-{id}', 'show')->name('distribusiUjianKelas.show');

        Route::get('/distribusiUjianKelas/create', 'create')->name('distribusiUjianKelas.create');
        Route::post('/distribusiUjianKelas/store', 'store')->name('distribusiUjianKelas.store');

        Route::get('/distribusiUjianKelas-edit-{id}', 'edit')->name('distribusiUjianKelas.edit');
        Route::post('/distribusiUjianKelas/update', 'update')->name('distribusiUjianKelas.update');

        Route::get('/distribusiUjianKelas-status-{id}', 'status')->name('distribusiUjianKelas.status');

        Route::delete('/distribusiUjianKelasDeleteAll', 'deleteAll')->name('distribusiUjianKelas.deleteAll');
        Route::get('/distribusiUjianKelas/delete/{id}', 'destroy')->name('distribusiUjianKelas.destroy');

        Route::post('/importDistribusiUjianKelas', 'importDistribusiUjianKelas')->name('distribusiUjianKelas.importDistribusiUjianKelas');
    });
});


// Route UjianSoal
    Route::get('/ujianSekolah', [App\Http\Controllers\Admin\DistribusiUjianKelasController::class, 'indexDistribusiUjianKelas'])->name('ujianSekolah.indexDistribusiUjianKelas')->middleware('auth');

    Route::controller(UjianSekolahController::class)->group(function () {
        Route::get('/ujianSekolah-selesai', 'indexSelesai')->name('ujianSekolah.indexSelesai')->middleware('auth');
        Route::get('/ujianSekolah-show-{id}', 'show')->name('ujianSekolah.show')->middleware('auth');

        Route::get('/ujianSekolah-create-{id}', 'create')->name('ujianSekolah.create')->middleware('auth');
        Route::post('/ujianSekolah/store', 'store')->name('ujianSekolah.store')->middleware('auth');
    });

    // Route Profil
    Route::get('/home-siswa', [App\Http\Controllers\HomeController::class, 'indexSiswa'])->name('siswa.dashboard');
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');

    Route::get('/home-guru', [App\Http\Controllers\HomeController::class, 'indexGuru'])->name('guru.dashboard');
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
