<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\PostEssay;
use App\Models\UjianSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\DistribusiUjianKelas;
use Illuminate\Support\Facades\Auth;

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
    public function store(Request $request)
    {
        DB::beginTransaction();
        foreach($request->id_jawaban as $key => $name) {
            $idjawaban = $request->id_jawaban[$key];
            $id_soalujian = $request->id_soalujian[$key];
            $jawaban = Post::find($id_soalujian)->jawaban;

            $benar = 1;
            $salah = 0;

            if($idjawaban == $jawaban) {
                $correct = 1;
            }else{
                $correct = 0;
            }

            $insert = [
                'id_kelas' => $request->id_kelas,
                'id_user' => $request->id_user,
                'id_sekolah_asal' => $request->id_sekolah_asal,
                'id_category_pelajaran' => $request->id_category_pelajaran,
                'id_category_ujian' => $request->id_category_ujian,
                'id_soalujian' => $id_soalujian,
                'id_jawaban' => $idjawaban,
                'correct' => $correct,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            if($correct == 1) {
                $hasil = UjianSekolah::where('id_user', Auth::user()->id)->sum('correct') + 1;
            }else{
                $hasil = UjianSekolah::where('id_user', Auth::user()->id)->sum('correct');
            }

            $dataUjian = [
                'id_kelas' => $request->id_kelas,
                'id_user' => $request->id_user,
                'id_sekolah_asal' => $request->id_sekolah_asal,
                'id_category_pelajaran' => $request->id_category_pelajaran,
                'id_category_ujian' => $request->id_category_ujian,
                // 'id_ujiansekolah' => $request->id,
                'total_correct' => $hasil,
                // 'total_nilai' => $hasil2,
                'created_at' => now(),
                'updated_at' => now(),
            ];


           $postsGanda =  DB::table('ujian_sekolahs')->insert($insert);
        }

        if(is_array($request->id_jawaban_essay) || is_object($request->id_jawaban_essay)) {
            foreach($request->id_jawaban_essay as $keyEssay => $name2) {
                $id_soalujianEssay = $request->id_soalujian_essay[$keyEssay];
                $idjawabanEssay = $request->id_jawaban_essay[$keyEssay];

                $insert2 = [
                    'id_kelas' => $request->id_kelas,
                    'id_user' => $request->id_user,
                    'id_sekolah_asal' => $request->id_sekolah_asal,
                    'id_category_pelajaran' => $request->id_category_pelajaran,
                    'id_category_ujian' => $request->id_category_ujian,
                    'id_soalujian_essay' => $id_soalujianEssay,
                    'id_jawaban_essay' => $idjawabanEssay,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                $postsEssay = DB::table('ujian_sekolah_essays')->insert($insert2);
            }
        };

       $datasUjian =  DB::table('data_ujians')->insert($dataUjian);
        DB::commit();

        return response()->json([
            'data' => 'Data Ujian Sekolah Tampil Success',
            'postsGanda' => $postsGanda,
            'postsEssay' => $postsEssay,
            'datasUjian' => $datasUjian,
        ]);

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
