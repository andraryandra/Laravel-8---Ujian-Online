<?php

namespace App\Http\Controllers\API\Admin;

use App\Models\Category;
use App\Models\PostEssay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PostEssayApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postsEssays = PostEssay::with('category_pelajaran')->get();
        $categori = Category::pluck('name_category', 'id')->all();

        return response()->json([
            'data' => 'Data Post Essay Tampil Success',
            'postsEssays' => $postsEssays,
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_category' => 'required',
            'soal_ujian_essay' => 'required',
            'jawaban_essay' => 'required',
        ]);

       $postsEssay =  DB::table('post_essays')->insert([
            'id_category' => $request->id_category,
            'soal_ujian_essay' => $request->soal_ujian_essay,
            'jawaban_essay' => $request->jawaban_essay,
            'created_at' => now(),
        ]);

        return response()->json([
            'data' => 'Data Post Essay Tambah Success',
            'postEssay' => $postsEssay,
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
        $postsEssay = PostEssay::findOrFail($id);
        $categori = Category::pluck('name_category', 'id')->all();

        return response()->json([
            'data' => 'Data Post Essay Tampil Success',
            'postsEssay' => $postsEssay,
            'categori' => $categori,
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
        $postsEssay = PostEssay::find($id);
        $categori = Category::pluck('name_category', 'id')->all();

        return response()->json([
            'data' => 'Data Post Essay Tampil Success',
            'postsEssay' => $postsEssay,
            'categori' => $categori
        ]);
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

        $postsEssay = PostEssay::where('id', $request->id)->update([
            'id_category' => $request->id_category,
            'soal_ujian_essay' => $request->soal_ujian_essay,
            'jawaban_essay' => $request->jawaban_essay,
            'updated_at' => now(),
        ]);

        return response()->json([
            'data' => 'Data Post Essay Update Success',
            'postsEssay' => $postsEssay,
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
        DB::table('post_essays')->where('id', $id)->delete();
        return redirect()->route('post-essay.index')->with('success', 'Data berhasil dihapus');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        PostEssay::whereIn('id',explode(',',$ids))->delete();
        $messages = ['success', 'Delete Post successfully!'];
        return response()->json([
            'success' => $messages,
        ]);
    }
}
