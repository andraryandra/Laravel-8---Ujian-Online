<?php

namespace App\Http\Controllers\API\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PostApiController extends Controller
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
        return response()->json([
            'data' => 'Data Post Tampil Success',
            'posts' => $posts,
            'categori' => $categori,
        ]);

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
        return response()->json([
            'data' => 'Data Post Tampil Success',
            'post' => $post,
            'categori' => $categori,
        ]);
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
            'id_category' => $request->id_category,
            'soal_ujian' => $request->soal_ujian,
            'pilihan_a' => $request->pilihan_a,
            'pilihan_b' => $request->pilihan_b,
            'pilihan_c' => $request->pilihan_c,
            'pilihan_d' => $request->pilihan_d,
            'jawaban' => $request->jawaban,
            // 'correct' => $request->correct,
        ]);

        return response()->json([
            'data' => 'Data Post Tampil Success',
            'post' => $post,
        ]);
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

        return response()->json([
            'data' => 'Data Post Tampil Success',
            'post' => $post,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::with('category')->find($id);
        $categori = Category::pluck('name_category', 'id')->all();

        return response()->json([
            'data' => 'Data Post Tampil Success',
            'post' => $post,
            'categori' => $categori,
        ]);

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
            'id_category' => $request->id_category,
            'soal_ujian' => $request->soal_ujian,
            'pilihan_a' => $request->pilihan_a,
            'pilihan_b' => $request->pilihan_b,
            'pilihan_c' => $request->pilihan_c,
            'pilihan_d' => $request->pilihan_d,
            'jawaban' => $request->jawaban,
            // 'correct' => $request->correct,
        ]);

        return response()->json([
            'data' => 'Data Post Tampil Success',
            'post' => $post,
        ]);
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
}
