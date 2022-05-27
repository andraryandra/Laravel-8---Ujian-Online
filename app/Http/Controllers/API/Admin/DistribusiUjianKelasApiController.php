<?php

namespace App\Http\Controllers\API\Admin;

use App\Models\Kelas;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\CategoryUjian;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\DistribusiUjianKelas;

class DistribusiUjianKelasApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DisujianKelases = DistribusiUjianKelas::with('kelas')->with('category')->with('categoryUjian')->get();
        $kelas = Kelas::pluck('name_kelas', 'id')->all();
        $categori = Category::pluck('name_category', 'id')->all();
        $categoryUjians = CategoryUjian::pluck('name_category_ujian', 'id')->all();

        return response()->json([
            'data' => 'Data Distribusi Ujian Kelas Tampil Success',
            'DisujianKelases' => $DisujianKelases,
            'kelas' => $kelas,
            'categori' => $categori,
            'categoryUjians' => $categoryUjians,
        ]);
    }

    public function indexDistribusiUjianKelas()
    {
        $DisujianKelases = DistribusiUjianKelas::with('category')->with('categoryUjian')->get();
        $categori = Category::pluck('name_category', 'id')->all();
        $categoryUjians = CategoryUjian::pluck('name_category_ujian', 'id')->all();

        return response()->json([
            'data' => 'Data Distribusi Ujian Kelas Tampil Success',
            'DisujianKelases' => $DisujianKelases,
            'categori' => $categori,
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
        $DisujianKelas = DistribusiUjianKelas::with('kelas')->get();
        $kelas = Kelas::pluck('name_kelas', 'id')->all();
        return response()->json([
            'data' => 'Data Distribusi Ujian Kelas Tampil Success',
            'DisujianKelas' => $DisujianKelas,
            'kelas' => $kelas,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, DistribusiUjianKelas $DisujianKelas)
    {
        $this->validate($request, [
            'id_kelas' => 'required',
            'id_category' => 'required',
            'id_category_ujian' => 'required',
            'status' => 'required',
        ]);

        $DisujianKelas = DB::table('distribusi_ujian_kelas')->insert([
            'id_kelas' => $request->id_kelas,
            'id_category' => $request->id_category,
            'id_category_ujian' => $request->id_category_ujian,
            'status' => $request->status,
            'created_at' => now(),
        ]);

       return response()->json([
            'data' => 'Data Distribusi Ujian Kelas Tampil Success',
            'DisujianKelas' => $DisujianKelas,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DistribusiUjianKelas  $distribusiUjianKelas
     * @return \Illuminate\Http\Response
     */
    public function show(DistribusiUjianKelas $distribusiUjianKelas, $id)
    {
        $DisujianKelas = DistribusiUjianKelas::with('kelas')->with('category')->with('categoryUjian')->find($id);
        return response()->json([
            'data' => 'Data Distribusi Ujian Kelas Tampil Success',
            'DisujianKelas' => $DisujianKelas,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DistribusiUjianKelas  $distribusiUjianKelas
     * @return \Illuminate\Http\Response
     */
    public function edit(DistribusiUjianKelas $distribusiUjianKelas, $id)
    {
        $DisujianKelas = DistribusiUjianKelas::with('kelas')->with('category')->with('categoryUjian')->find($id);
        $kelas = Kelas::pluck('name_kelas', 'id')->all();
        $categori = Category::pluck('name_category', 'id')->all();
        $categoryUjians = CategoryUjian::pluck('name_category_ujian', 'id')->all();

        return response()->json([
            'data' => 'Data Distribusi Ujian Kelas Tampil Success',
            'DisujianKelas' => $DisujianKelas,
            'kelas' => $kelas,
            'categori' => $categori,
            'categoryUjians' => $categoryUjians,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DistribusiUjianKelas  $distribusiUjianKelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DistribusiUjianKelas $distribusiUjianKelas)
    {
        $this->validate($request, [
            'id_kelas' => 'required',
            'id_category' => 'required',
            'id_category_ujian' => 'required',
            'status' => 'required',
        ]);

        $DisujianKelas = DB::table('distribusi_ujian_kelas')->where('id', $request->id)->update([
            'id_kelas' => $request->id_kelas,
            'id_category' => $request->id_category,
            'id_category_ujian' => $request->id_category_ujian,
            'status' => $request->status,
            'updated_at' => now(),
        ]);

        return response()->json([
            'data' => 'Data Distribusi Ujian Kelas Tampil Success',
            'DisujianKelas' => $DisujianKelas,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DistribusiUjianKelas  $distribusiUjianKelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(DistribusiUjianKelas $distribusiUjianKelas, $id)
    {
        DB::table('distribusi_ujian_kelas')->where('id', $id)->delete();
        return redirect()->route('distribusiUjianKelas.index')->with('success', 'Data berhasil dihapus');
    }
}
