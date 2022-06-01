<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sekolah;
use Illuminate\Http\Request;
use App\Models\CategoryUjian;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Imports\CategoryUjianImport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class CategoryUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryUjians = CategoryUjian::where('id_sekolah_asal', Auth::user()->sekolah_asal)->get();
        $sekolahs = Sekolah::pluck('name_sekolah', 'id')->all();
        $categoryUjiansCount = CategoryUjian::where('id_sekolah_asal', Auth::user()->sekolah_asal)->count();
        return view('admin.categories-ujian.index', compact('categoryUjians','sekolahs','categoryUjiansCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryUjian = CategoryUjian::get();
        return view('admin.categories-ujian.create', compact('categoryUjian'));
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
            'name_category_ujian' => 'required|unique:category_ujians',
        ]);

        $categoryUjian = CategoryUjian::create([
            'id_sekolah_asal' => $request->id_sekolah_asal,
            'name_category_ujian' => $request->name_category_ujian,
        ]);

        if($categoryUjian){
            return redirect()->route('categories-ujian.index')->with('success', 'Created Category successfully!');
        } else {
            return redirect()->route('categories-ujian.index')->with('error', 'Failed to create Category!');
        }
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
        $categoryUjiansCount = CategoryUjian::count();
        return view('admin.categories-ujian.show', compact('categoryUjian','categoryUjiansCount'));
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
        $categoryUjiansCount = CategoryUjian::count();
        return view('admin.categories-ujian.edit', compact('categoryUjian','categoryUjiansCount'));
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
            'id_sekolah_asal' => 'required',
            'name_category_ujian' => 'required|unique:category_ujians',
        ]);

        DB::table('category_ujians')->where('id', $request->id)->update([
            'id_sekolah_asal' => $request->id_sekolah_asal,
            'name_category_ujian' => $request->name_category_ujian,
            'updated_at' => now(),
        ]);

        return redirect()->route('categories-ujian.index')->with('success', 'Category Ujian berhasil diubah');
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

    public function importCategoriesUjian(Request $request){
        //melakukan import file
        Excel::import(new CategoryUjianImport, request()->file('file'));
        //jika berhasil kembali ke halaman sebelumnya
        return back()->with('success', 'Import Category Ujian successfully!');
    }
}
