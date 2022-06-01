<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\DataUjian;
use App\Models\PostEssay;
use App\Models\UjianSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\DistribusiUjianKelas;
use App\Models\UjianSekolahEssay;
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
        $dataUjian = DataUjian::where('id_sekolah_asal', Auth::user()->sekolah_asal)
        ->with('category_ujian')
        ->with('category_pelajaran')
        ->with('kelas')
        ->with('user')
        ->get();

        $dataUjianCount = DataUjian::where('id_sekolah_asal', Auth::user()->sekolah_asal)->count();
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
        $dataUjian = DataUjian::where('id_sekolah_asal', Auth::user()->sekolah_asal)->with('category_ujian')
        ->with('category_pelajaran')
        // ->with('post')
        ->with('kelas')
        ->with('user')
        ->findOrFail($id);


        $ujianSekolah = UjianSekolah::where('id_sekolah_asal', Auth::user()->sekolah_asal)->with('category_ujian')
        ->with('category_pelajaran')
        ->with('post')
        ->with('kelas')
        ->with('user')
        ->get();

        $ujianSekolahEssay = UjianSekolahEssay::where('id_sekolah_asal', Auth::user()->sekolah_asal)->with('category_ujian')
        ->with('category_pelajaran')
        ->with('postEssay')
        ->with('kelas')
        ->with('user')
        ->get();




        // $ujianSekolahCount = UjianSekolah::where('id_user', Auth::user()->id)->count();
        // $ujianSekolahCount = UjianSekolah::count();
        $ujianSekolahCount = UjianSekolah::where('id_sekolah_asal', Auth::user()->sekolah_asal)->where('id_user', $id)->count();

        $dataUjianCount = DataUjian::where('id_sekolah_asal', Auth::user()->sekolah_asal)->count();
        return view('guru.dataUjian.show', compact('dataUjian','ujianSekolahEssay','ujianSekolah','dataUjianCount','ujianSekolahCount'));

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
