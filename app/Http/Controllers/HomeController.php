<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $posts = Post::all();
        $categories = Category::all();
        $kelases = Kelas::all();

        $siswaCount = User::where('sekolah_asal', Auth::user()->sekolah_asal)->where('role', 'siswa')->count();
        $guruCount = User::where('sekolah_asal', Auth::user()->sekolah_asal)->where('role', 'guru')->count();
        $categoriesCount = Category::where('id_sekolah_asal', Auth::user()->sekolah_asal)->count();
        $postsCount = Post::where('id_sekolah_asal', Auth::user()->sekolah_asal)->count();
        $kelasesCount = Kelas::where('id_sekolah_asal', Auth::user()->sekolah_asal)->count();


        $usersChart = User::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count');

        return view('admin.dashboard', compact('users','usersChart','posts','categories','kelases','siswaCount','guruCount','categoriesCount', 'postsCount','kelasesCount'));
        // return view('admin.dashboard');
    }

    public function indexSiswa()
    {
       return view('siswa.dashboard');
    }

    public function indexGuru()
    {
        return view('guru.dashboard');
    }

    public function listLog()
    {
        $usersLogArray = [];
        $usersLogArray = DB::table('authentication_log')->get();
        // $usersLog = User::get();
        // dd($usersLogArray);
        return view('admin.log', compact('usersLogArray'));
    }
}
