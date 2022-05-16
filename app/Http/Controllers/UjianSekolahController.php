<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Category;
use App\Models\UjianSekolah;
use App\Models\DataUjian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\DistribusiUjianKelas;
use Illuminate\Support\Facades\Auth;

class UjianSekolahController extends Controller
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
        return view('ujianSekolah.index', compact('ujianSekolahs'));
    }

    public function indexSelesai(Request $request)
    {
        // $ujianSekolah = UjianSekolah::sum('correct', Auth::user()->id, '=', 1);
        $ujianSekolah = UjianSekolah::where('id_user', Auth::user()->id)->sum('correct');
        $ujianSekolahCount = UjianSekolah::where('id_user', Auth::user()->id)->count();
        return view('ujianSekolah.indexSelesai', compact('ujianSekolah','ujianSekolahCount'));

    }

    public function indexDataUjian()
    {
        $dataUjian = UjianSekolah::count();

        $ujianSekolah = UjianSekolah::with('category')
        ->with('kelas')
        ->with('user')
        ->get();
        return view('guru.dataUjian.index', compact('ujianSekolah','dataUjian'));
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
        $categori = Category::pluck('name_category', 'id')->all();
        return view('ujianSekolah.create', compact('ujianSekolah', 'categori', 'post', 'DisujianKelases'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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


            DB::table('ujian_sekolahs')->insert($insert);

        }
        DB::table('data_ujians')->insert($dataUjian);

        return redirect()->route('ujianSekolah.indexSelesai')->withSuccess('Selamat Telah Mengerjakan Ujian Dengan Baik '. Auth::user()->name .'!');

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
        return view('ujianSekolah.show', compact('ujianSekolah'));
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
