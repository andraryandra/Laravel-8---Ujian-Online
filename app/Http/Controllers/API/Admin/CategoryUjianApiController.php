<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Models\CategoryUjian;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoryUjianApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryUjians = CategoryUjian::all();
        return response()->json([
            'data' => 'Data Category Ujian Tampil Success',
            'categoryUjians' => $categoryUjians,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryUjian = CategoryUjian::get();
        return response()->json([
            'data' => 'Data Category Ujian Tampil Success',
            'categoryUjian' => $categoryUjian,
        ]);
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
            'name_category_ujian' => 'required|unique:category_ujians',
        ]);

        $categoryUjian = CategoryUjian::create([
            'name_category_ujian' => $request->name_category_ujian,
        ]);

        return response()->json([
            'data' => 'Data Category Ujian Tampil Success',
            'categoryUjian' => $categoryUjian,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryUjian  $categoryUjian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoryUjian = CategoryUjian::find($id);
        return response()->json([
            'data' => 'Data Category Ujian Tampil Success',
            'categoryUjian' => $categoryUjian,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryUjian  $categoryUjian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryUjian = CategoryUjian::find($id);
        return response()->json([
            'data' => 'Data Category Ujian Tampil Success',
            'categoryUjian' => $categoryUjian,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryUjian  $categoryUjian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name_category_ujian' => 'required|unique:category_ujians',
        ]);

        $categoryUjian = DB::table('category_ujians')->where('id', $request->id)->update([
            'name_category_ujian' => $request->name_category_ujian,
            'updated_at' => now(),
        ]);

        return response()->json([
            'data' => 'Data Category Ujian Tampil Success',
            'categoryUjian' => $categoryUjian,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryUjian  $categoryUjian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        DB::table('category_ujians')->where('id', $id)->delete();
        return redirect()->route('categories-ujian.index')->with('success', 'Category Ujian berhasil dihapus');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        CategoryUjian::whereIn('id',explode(',',$ids))->delete();
        $messages = ['success', 'Delete Category Ujian successfully!'];
        return response()->json([
            'success' => $messages,
        ]);
    }
}
