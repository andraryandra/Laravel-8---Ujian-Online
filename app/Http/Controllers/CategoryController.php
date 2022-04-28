<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Imports\CategoryImport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Collection;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $categoriesCount = Category::count();
        return view('admin.categories.index', compact('categories','categoriesCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categori = Category::get();
        return view('admin.categories.create', compact('categori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('categories')->insert([
            'name_category' => $request->name_category,
        ]);
        return redirect()->route('categories.index')->with('success', 'Created Category successfully!');
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
        $categoriesCount = Category::count();
        return view('admin.categories.show', compact('categori','categoriesCount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::get();
        $categori = Category::find($id);
        $categoriesCount = Category::count();
        return view('admin.categories.edit', compact('categories','categori','categoriesCount'));
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
        DB::table('categories')->where('id', $request->id)->update([
            'name_category' => $request->name_category,
        ]);

        return redirect()->route('categories.index')->with('success', 'Edit Category successfully!');
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
        return redirect()->route('categories.index')->with('success', 'Delete Category successfully!');
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

    public function importCategories(Request $request){
        //melakukan import file
        Excel::import(new CategoryImport, request()->file('file'));
        //jika berhasil kembali ke halaman sebelumnya
        return back()->with('success', 'Import Category successfully!');
    }
    
}
