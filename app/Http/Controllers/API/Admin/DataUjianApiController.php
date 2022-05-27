<?php

namespace App\Http\Controllers\API\Admin;

use App\Models\DataUjian;
use App\Models\UjianSekolah;
use Illuminate\Http\Request;
use App\Models\UjianSekolahEssay;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DataUjianApiController extends Controller
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

        return response()->json([
            'data' => 'Data Ujian Sekolah Tampil Success',
            'dataUjian' => $dataUjian,
        ]);

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

        $ujianSekolahEssay = UjianSekolahEssay::with('category_ujian')
        ->with('category_pelajaran')
        ->with('postEssay')
        ->with('kelas')
        ->with('user')
        ->get();

        return response()->json([
            'data' => 'Data Ujian Sekolah Tampil Success',
            'dataUjian' => $dataUjian,
            'ujianSekolah' => $ujianSekolah,
            'ujianSekolahEssay' => $ujianSekolahEssay
        ]);
    }
}
