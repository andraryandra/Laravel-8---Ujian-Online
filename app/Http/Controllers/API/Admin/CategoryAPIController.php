<?php

namespace App\Http\Controllers\API\Admin;

use App\Models\Sekolah;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryApiController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $categories = Category::get();
    //     return response()->json([
    //         'data' => 'Data Category Pelajaran Tampil Success',
    //         'categories' => $categories,
    //     ], 200);
    // }

    public function index()
    {
        $categories = Category::get();
        // $sekolahs = Sekolah::pluck('name_sekolah', 'id')->all();

        return response()->json(['categories' => $categories]);

        // return response()->json([
        //     'data' => 'Data Category Pelajaran Tampil Success',
        //     'categories' => $categories,
        //     // 'sekolahs' => $sekolahs,

        // ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categori = Category::get();
        return response()->json([
            'data' => 'Data Category Pelajaran Tampil Success',
            'categori' => $categori,
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
            'name_category' => 'required|unique:categories',
        ]);

        $categori = Category::create([
            'name_category' => $request->name_category,
        ]);

        if($categori){
            return response()->json([
                'data' => 'Data Category Pelajaran Tampil Success',
                'categori' => $categori,
            ]);
        } else {
            return response()->json([
                'data' => 'Data Category Pelajaran Tampil Failed',
                'categori' => $categori,
            ]);
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
        $categori = Category::find($id);
        return response()->json([
            'data' => 'Data Category Pelajaran Tampil Success',
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
        $categori = Category::find($id);
        return response()->json([
            'data' => 'Data Category Pelajaran Tampil Success',
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
    public function update(Request $request, Category $categori)
    {
        $this->validate($request, [
            'name_category' => 'required|unique:categories',
        ]);

        $categori = Category::find($request->id);
        $categori = $categori->update([
            'name_category' => $request->name_category,
        ]);

        if($categori){
            return response()->json([
                'data' => 'Data Category Pelajaran Tampil Success',
                'categori' => $categori,
            ]);
        } else {
            return response()->json([
                'data' => 'Data Category Pelajaran Tampil Failed',
                'categori' => $categori,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        DB::table('categories')->where('id', $id)->delete();
        return response()->json([
            'data' => 'Data Category Pelajaran Tampil Success',
        ]);
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Category::whereIn('id',explode(',',$ids))->delete();
        $messages = ['success', 'Delete Category successfully!'];
        return response()->json([
            'success' => $messages,
        ]);

    }
}
