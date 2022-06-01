<?php

// namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;

use App\Models\Sekolah;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Imports\CategoryImport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        $categories = Category::where('id_sekolah_asal', Auth::user()->sekolah_asal)->get();
        $sekolahs = Sekolah::pluck('name_sekolah', 'id')->all();
        $categoriesCount = Category::where('id_sekolah_asal', Auth::user()->sekolah_asal)->count();
        return view('admin.categories.index', compact('categories','sekolahs','categoriesCount'));
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
        $this->validate($request, [
            'id_sekolah_asal' => 'required',
            'name_category' => 'required|unique:categories',
        ]);

        $categori = Category::create([
            'id_sekolah_asal' => $request->id_sekolah_asal,
            'name_category' => $request->name_category,
        ]);

        if($categori){
            return redirect()->route('categories.index')->with('success', 'Created Category successfully!');
        } else {
            return redirect()->route('categories.index')->with('error', 'Failed to create Category!');
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
    public function update(Request $request, Category $categori)
    {
        $this->validate($request, [
            'id_sekolah_asal' => 'required',
            'name_category' => 'required|unique:categories',
        ]);

        $categori = Category::find($request->id);
        $categori = $categori->update([
            'id_sekolah_asal' => $request->id_sekolah_asal,
            'name_category' => $request->name_category,
        ]);

        if($categori){
            return redirect()->route('categories.index')->with('success', 'Updated Category successfully!');
        } else {
            return redirect()->route('categories.index')->with('error', 'Failed to update Category!');
        }

        // return redirect()->route('categories.index')->with('success', 'Edit Category successfully!');
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
