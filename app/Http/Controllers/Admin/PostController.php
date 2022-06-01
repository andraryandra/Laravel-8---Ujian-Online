<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Sekolah;
use App\Models\Category;
use App\Imports\PostImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('id_sekolah_asal', Auth::user()->sekolah_asal)->with('category')->get();
        $categori = Category::where('id_sekolah_asal', Auth::user()->sekolah_asal)->pluck('name_category', 'id')->all();
        $sekolahs = Sekolah::pluck('name_sekolah', 'id')->all();
        $postCount = Post::where('id_sekolah_asal', Auth::user()->sekolah_asal)->count();
        return view('admin.posts.index', compact('posts','categori','sekolahs','postCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = Post::all();
        $categori = Category::pluck('name_category', 'id')->all();
        return view('admin.posts.create', compact('categori','post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $this->validate($request, [
            'id_sekolah_asal' => 'required',
            'id_category' => 'required',
            'soal_ujian' => 'required',
            'pilihan_a' => 'required',
            'pilihan_b' => 'required',
            'pilihan_c' => 'required',
            'pilihan_d' => 'required',
            'jawaban' => 'required',
            // 'correct' => 'required',
        ]);

        $post = Post::create([
            'id_sekolah_asal' => $request->id_sekolah_asal,
            'id_category' => $request->id_category,
            'soal_ujian' => $request->soal_ujian,
            'pilihan_a' => $request->pilihan_a,
            'pilihan_b' => $request->pilihan_b,
            'pilihan_c' => $request->pilihan_c,
            'pilihan_d' => $request->pilihan_d,
            'jawaban' => $request->jawaban,
            // 'correct' => $request->correct,
        ]);

        if($post){
            return redirect()->route('posts.index')->with('success', 'Created Post successfully!');
        } else {
            return redirect()->route('posts.index')->with('error', 'Failed to create Post!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $categoriesCount = Category::count();
        $postCount = Post::count();
        return view('admin.posts.show', compact('post','categoriesCount','postCount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id_sekolah_asal', Auth::user()->sekolah_asal)->with('category')->find($id);
        $categori = Category::where('id_sekolah_asal', Auth::user()->sekolah_asal)->pluck('name_category', 'id')->all();
        return view('admin.posts.edit', compact('post', 'categori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'id_sekolah_asal' => 'required',
            'id_category' => 'required',
            'soal_ujian' => 'required',
            'pilihan_a' => 'required',
            'pilihan_b' => 'required',
            'pilihan_c' => 'required',
            'pilihan_d' => 'required',
            'jawaban' => 'required',
            // 'correct' => 'required',
        ]);

        $post = Post::find($request->id);
        $post = $post->update([
            'id_sekolah_asal' => $request->id_sekolah_asal,
            'id_category' => $request->id_category,
            'soal_ujian' => $request->soal_ujian,
            'pilihan_a' => $request->pilihan_a,
            'pilihan_b' => $request->pilihan_b,
            'pilihan_c' => $request->pilihan_c,
            'pilihan_d' => $request->pilihan_d,
            'jawaban' => $request->jawaban,
            // 'correct' => $request->correct,
        ]);

        if($post){
            return redirect()->route('posts.index')->with('success', 'Updated Post successfully!');
        }else{
            return redirect()->route('posts.index')->with('error', 'Error during the update!');
        }
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('posts')->where('id', $id)->delete();
        return redirect()->route('posts.index')->with('success', 'Delete Post successfully!');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Post::whereIn('id',explode(',',$ids))->delete();
        $messages = ['success', 'Delete Post successfully!'];
        return response()->json([
            'success' => $messages,
        ]);
    }

    public function importPosts(Request $request){
        //melakukan import file
        Excel::import(new PostImport, request()->file('file'));
        //jika berhasil kembali ke halaman sebelumnya
        return back()->with('success', 'Import Post successfully!');
    }
}
