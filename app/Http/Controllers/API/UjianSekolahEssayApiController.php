<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\UjianSekolahEssay;
use App\Http\Controllers\Controller;

class UjianSekolahEssayApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ujianEssay = UjianSekolahEssay::with('category_ujian')
        ->with('category_pelajaran')
        ->with('kelas')
        ->with('user')
        ->get();

        return response()->json([
            'data' => 'Data Ujian Sekolah Essay Tampil Success',
            'ujianEssay' => $ujianEssay,
        ]);
    }
}
