<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Imports\PostImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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
        $posts = Post::with('category')->get();
        $categori = Category::pluck('name_category', 'id')->all();
        $categoriesCount = Category::count();
        $postCount = Post::count();
        return view('admin.posts.index', compact('posts','categori','categoriesCount','postCount'));
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
    public function store(Request $request)
    {
        try{
            DB::table('posts')->insert([
                'id_category' => $request->id_category,
                'soal_ujian' => $request->soal_ujian,
                'pilihan_a' => $request->pilihan_a,
                'pilihan_b' => $request->pilihan_b,
                'pilihan_c' => $request->pilihan_c,
                'pilihan_d' => $request->pilihan_d,
                'jawaban' => $request->jawaban,
            ]);
        return redirect()->route('posts.index')->with('success', 'Created Post successfully!');

        }catch (\Exception $e){
            return redirect()->route('posts.index')->with('error', 'Error during the creation!');
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
        $post = Post::find($id);
        $categori = Category::pluck('name_category', 'id')->all();
        $postCount = Post::count();
        return view('admin.posts.edit', compact('post', 'categori','postCount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('posts')->where('id', $request->id)->update(
            [
                'id_category' => $request->id_category,
                'soal_ujian' => $request->soal_ujian,
                'pilihan_a' => $request->pilihan_a,
                'pilihan_b' => $request->pilihan_b,
                'pilihan_c' => $request->pilihan_c,
                'pilihan_d' => $request->pilihan_d,
                'jawaban' => $request->jawaban,
            ]
        );

        return redirect()->route('posts.index')->with('success', 'Created Post successfully!');
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
