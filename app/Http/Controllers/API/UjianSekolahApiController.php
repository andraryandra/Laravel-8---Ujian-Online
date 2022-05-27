<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\DataUjian;
use App\Models\PostEssay;
use App\Models\UjianSekolah;
use Illuminate\Http\Request;
use App\Models\UjianSekolahEssay;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\DistribusiUjianKelas;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DataUjianController;

class UjianSekolahApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $ujianSekolahs = User::with('kelas')->get();
        $ujianSekolahs = UjianSekolah::all();
        return response()->json([
            'data' => 'Data Ujian Sekolah Tampil Success',
            'ujianSekolahs' => $ujianSekolahs,
        ]);
    }

    public function indexSelesai(Request $request)
    {
        // $ujianSekolah = UjianSekolah::sum('correct', Auth::user()->id, '=', 1);
        $ujianSekolah = UjianSekolah::where('id_user', Auth::user()->id)->sum('correct');

        return response()->json([
            'data' => 'Data Ujian Sekolah Tampil Success',
            'ujianSekolah' => $ujianSekolah,
        ]);

    }

    public function indexDataUjian()
    {

        $ujianSekolah = UjianSekolah::with('category')
        ->with('kelas')
        ->with('user')
        ->get();

        return response()->json([
            'data' => 'Data Ujian Sekolah Tampil Success',
            'ujianSekolah' => $ujianSekolah,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $DisujianKelases = DistribusiUjianKelas::with('kelas')->with('category')->with('categoryUjian')->find($id);
        $ujianSekolah = UjianSekolah::with('kelas')->with('distribusiUjianKelas')->get();
        $post = Post::get();
        $postsEssay = PostEssay::get();
        $categori = Category::pluck('name_category', 'id')->all();

        return response()->json([
            'data' => 'Data Ujian Sekolah Tampil Success',
            'DisujianKelases' => $DisujianKelases,
            'ujianSekolah' => $ujianSekolah,
            'post' => $post,
            'postsEssay' => $postsEssay,
            'categori' => $categori,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, UjianSekolah $ujianSekolah)
    {
        // DB::beginTransaction();
         foreach((array) $request->id_jawaban as $key => $value) {
            $idjawaban = $request->id_jawaban[$key];
            $idsoal = $request->id_soalujian[$key];
            $jawaban = Post::find($idsoal)->jawaban;

            if($idjawaban == $jawaban) {
                $correct = 1;
            }else{
                $correct = 0;
            }

            $insert = UjianSekolah::create([
                'id_kelas' => $request->id_kelas,
                'id_user' => $request->id_user,
                'id_sekolah_asal' => $request->id_sekolah_asal,
                'id_category_pelajaran' => $request->id_category_pelajaran,
                'id_category_ujian' => $request->id_category_ujian,
                'id_soalujian' => $request->id_soalujian[$key],
                'id_jawaban' => $request->id_jawaban[$key],
                'correct' => $correct,
            ]);

            if($correct == 1) {
                $hasil = UjianSekolah::where('id_user', $request->id_user)->sum('correct');
            }else{
                $hasil = UjianSekolah::where('id_user', $request->id_user)->sum('correct');
            }

            $insert2 = DataUjian::create([
                'id_kelas' => $request->id_kelas,
                'id_user' => $request->id_user,
                'id_sekolah_asal' => $request->id_sekolah_asal,
                'id_category_pelajaran' => $request->id_category_pelajaran,
                'id_category_ujian' => $request->id_category_ujian,
                'total_correct' => $hasil,
            ]);

            return response()->json([
                'data' => 'Data Ujian Sekolah Tampil Success',
                'ujianSekolah' => $insert,
                'ujianSekolah2' => $insert2,
            ]);
        }

            foreach((array) $request->id_jawaban_essay as $keyEssay => $name3)
            {
                $idjawabanEssay = $name3;
                $idsoalEssay = $request->id_soalujian_essay[$keyEssay];

                $insert3 = UjianSekolahEssay::create([
                    'id_kelas' => $request->id_kelas,
                    'id_user' => $request->id_user,
                    'id_sekolah_asal' => $request->id_sekolah_asal,
                    'id_category_pelajaran' => $request->id_category_pelajaran,
                    'id_category_ujian' => $request->id_category_ujian,
                    'id_soalujian_essay' => $idsoalEssay,
                    'id_jawaban_essay' => $idjawabanEssay,
                ]);

                return response()->json([
                    'data' => 'Data Ujian Sekolah Tampil Success',
                    'insert3' => $insert3,
                ]);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UjianSekolah  $ujianSekolah
     * @return \Illuminate\Http\Response
     */
    public function show(UjianSekolah $ujianSekolah, $id)
    {
        $ujianSekolah = User::with('kelas')->findOrFail($id);
        return response()->json([
            'data' => 'Data Ujian Sekolah Tampil Success',
            'ujianSekolah' => $ujianSekolah,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UjianSekolah  $ujianSekolah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('ujian_sekolahs')->where('id', $id)->delete();
        return redirect()->route('dataUjian.indexDataUjian')->with('success', 'Data berhasil dihapus');
    }
}
