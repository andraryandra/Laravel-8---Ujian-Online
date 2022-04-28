<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        $userCount = User::count();
        $categoriesCount = Category::count();
        $postsCount = Post::count();
        $kelasesCount = Kelas::count();
        
        return view('admin.dashboard', compact('users','posts','categories','kelases','userCount','categoriesCount', 'postsCount','kelasesCount'));
        // return view('admin.dashboard');
    }
}
