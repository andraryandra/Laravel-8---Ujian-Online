<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\DataUjian;
use App\Models\UjianSekolah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DistribusiUjianKelas;
use Illuminate\Support\Facades\Auth;

class DataUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexDataUjian2()
    {
        $dataUjian = DataUjian::with('category_ujian')
        ->with('category_pelajaran')
        ->with('kelas')
        ->with('user')
        ->get();

        $dataUjianCount = DataUjian::count();
        return view('guru.dataUjian.index', compact('dataUjian','dataUjianCount'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataUjian = DataUjian::with('category_ujian')
        ->with('category_pelajaran')
        // ->with('post')
        ->with('kelas')
        ->with('user')
        ->findOrFail($id);


        $ujianSekolah = UjianSekolah::with('category_ujian')
        ->with('category_pelajaran')
        ->with('post')
        ->with('kelas')
        ->with('user')
        ->get();

        // $ujianSekolahCount = UjianSekolah::where('id_user', Auth::user()->id)->count();
        // $ujianSekolahCount = UjianSekolah::count();
        $ujianSekolahCount = UjianSekolah::where('id_user', $id)->count();

        $dataUjianCount = DataUjian::count();
        return view('guru.dataUjian.show', compact('dataUjian','ujianSekolah','dataUjianCount','ujianSekolahCount'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
