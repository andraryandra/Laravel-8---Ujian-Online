<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kelas;
use App\Models\Category;
use App\Models\CategoryUjian;
use App\Models\DistribusiUjianKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Sekolah;

class DistribusiUjianKelasController extends Controller
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
        $sekolahs = Sekolah::pluck('name_sekolah', 'id')->all();
        $categori = Category::pluck('name_category', 'id')->all();
        $categoryUjians = CategoryUjian::pluck('name_category_ujian', 'id')->all();
        $DisujianKelasCount = DistribusiUjianKelas::count();

        return view('admin.distribusiUjianKelas.index', compact('DisujianKelases','kelas','sekolahs','categori','categoryUjians','DisujianKelasCount'));
    }

    public function indexDistribusiUjianKelas()
    {
        $DisujianKelases = DistribusiUjianKelas::with('category')->with('categoryUjian')->get();
        $categori = Category::pluck('name_category', 'id')->all();
        $categoryUjians = CategoryUjian::pluck('name_category_ujian', 'id')->all();
        $sekolahs = Sekolah::pluck('name_sekolah', 'id')->all();
        $DisujianKelasCount = DistribusiUjianKelas::count();
        return view('ujianSekolah.index', compact('DisujianKelases','categori','sekolahs','categoryUjians','DisujianKelasCount'));
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
        return view('admin.distribusiUjianKelas.create', compact('DisujianKelas','kelas'));
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
            'id_sekolah_asal' => 'required',
            'id_category' => 'required',
            'id_category_ujian' => 'required',
            'status' => 'required',
        ]);

        $DisujianKelas = DB::table('distribusi_ujian_kelas')->insert([
            'id_kelas' => $request->id_kelas,
            'id_sekolah_asal' => $request->id_sekolah_asal,
            'id_category' => $request->id_category,
            'id_category_ujian' => $request->id_category_ujian,
            'status' => $request->status,
            'created_at' => now(),
        ]);

        if($DisujianKelas){
            return redirect()->route('distribusiUjianKelas.index')->with('success', 'Data berhasil ditambahkan');
        }else{
            return redirect()->route('distribusiUjianKelas.index')->with('error', 'Data gagal ditambahkan');
        }

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
        $DisujianKelasCount = DistribusiUjianKelas::count();
        return view('admin.distribusiUjianKelas.show', compact('DisujianKelas','DisujianKelasCount'));
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
        $DisujianKelasCount = DistribusiUjianKelas::count();
        return view('admin.distribusiUjianKelas.edit', compact('DisujianKelas','kelas','categori','categoryUjians','DisujianKelasCount'));
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
            'id_sekolah_asal' => 'required',
            'id_category' => 'required',
            'id_category_ujian' => 'required',
            'status' => 'required',
        ]);

        $DisujianKelas = DB::table('distribusi_ujian_kelas')->where('id', $request->id)->update([
            'id_kelas' => $request->id_kelas,
            'id_sekolah_asal' => $request->id_sekolah_asal,
            'id_category' => $request->id_category,
            'id_category_ujian' => $request->id_category_ujian,
            'status' => $request->status,
            'updated_at' => now(),
        ]);

        if($DisujianKelas){
            return redirect()->route('distribusiUjianKelas.index')->with('success', 'Data berhasil diubah');
        }else{
            return redirect()->route('distribusiUjianKelas.index')->with('error', 'Data gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DistribusiUjianKelas  $distribusiUjianKelas
     * @return \Illuminate\Http\Response
     */

     public function status($id)
     {
         $data = DistribusiUjianKelas::where('id', $id)->first();

         $status_sekarang = $data->status;

         if($status_sekarang == 1)
         {
            DistribusiUjianKelas::where('id', $id)->update([
                'status' => 0,
            ]);
         }else {
            DistribusiUjianKelas::where('id', $id)->update([
                'status' => 1,
            ]);
         }

         if($status_sekarang == 1)
         {
            alert()->toast('Status berhasil diubah menjadi '. 'Tidak Aktif', 'success');

         } else{
            alert()->toast('Status berhasil diubah menjadi '. 'Aktif', 'success',);
         }

            return redirect()->route('distribusiUjianKelas.index');
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
