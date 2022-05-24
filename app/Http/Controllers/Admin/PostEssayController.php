<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\PostEssay;
use Illuminate\Http\Request;
use App\Imports\PostEssayImport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class PostEssayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postsEssays = PostEssay::with('category')->get();
        $categori = Category::pluck('name_category', 'id')->all();
        $postEssayCount = PostEssay::count();
        return view('admin.postsEssay.index', compact('postsEssays','categori','postEssayCount'));
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

        DB::table('post_essays')->insert([
            'id_category' => $request->id_category,
            'soal_ujian_essay' => $request->soal_ujian_essay,
            'jawaban_essay' => $request->jawaban_essay,
            'created_at' => now(),
        ]);

        return redirect()->route('post-essay.index')->with('success', 'Data berhasil ditambahkan');
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
        $postEssayCount = PostEssay::count();
        return view('admin.postsEssay.show', compact('postsEssay','categori','postEssayCount'));
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
        $postEssayCount = PostEssay::count();
        return view('admin.postsEssay.edit', compact('postsEssay','categori','postEssayCount'));
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

        PostEssay::where('id', $request->id)->update([
            'id_category' => $request->id_category,
            'soal_ujian_essay' => $request->soal_ujian_essay,
            'jawaban_essay' => $request->jawaban_essay,
            'updated_at' => now(),
        ]);

        return redirect()->route('post-essay.index')->with('success', 'Data berhasil diubah');
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

    public function importPostsEssay(Request $request){
        //melakukan import file
        Excel::import(new PostEssayImport, request()->file('file'));
        //jika berhasil kembali ke halaman sebelumnya
        return back()->with('success', 'Data berhasil diimport');
    }

}
