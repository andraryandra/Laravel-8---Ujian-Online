<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Category;
use App\Models\UjianSekolah;
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

        $ujianSekolahs = User::with('kelas')->get();
        return view('ujianSekolah.index', compact('ujianSekolahs'));
    }

    public function indexSelesai()
    {
        $ujianSekolah = User::with('kelas')->get();
        return view('ujianSekolah.indexSelesai', compact('ujianSekolah'));
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
        // $DisujianKelases = DistribusiUjianKelas::with('category')->with('categoryUjian')->first();
        $ujianSekolah = UjianSekolah::with('kelas')->with('distribusiUjianKelas')->get();
        $post = Post::get();
        $categori = Category::pluck('name_category', 'id')->all();
        return view('ujianSekolah.create', compact('ujianSekolah','categori','post','DisujianKelases'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, UjianSekolah $ujianSekolah)
    {
        // $this->validate($request, [
        //     'id_kelas' => 'required',
        //     'id_user' => 'required',
        //     'nama_ujian' => 'required',
        //     'tanggal_ujian' => 'required',
        //     'waktu_ujian' => 'required',
        //     'jumlah_soal' => 'required',
        //     'jumlah_benar' => 'required',
        //     'jumlah_salah' => 'required',
        //     'jumlah_kosong' => 'required',
        //     'nilai' => 'required',
        // ]);

        $this->validate($request, [
            // 'id_kelas' => 'required',
            'id_user' => 'required',
            // 'id_sekolah_asal' => 'required',
            'id_category_ujian' => 'required',
            'id_soal_ujian' => 'required',
            // 'pila' => 'required',
            // 'pilb' => 'required',
            // 'pilc' => 'required',
            // 'pild' => 'required',
            'id_jawaban' => 'required',
        ]);

            $ujianSekolah = UjianSekolah::insert([
            // 'id_kelas' => $request->id_kelas,
            'id_user' => $request->id_user,
            // 'id_sekolah_asal' => $request->id_sekolah_asal,
            'id_category_ujian' => $request->id_category_ujian,
            'id_soal_ujian' => $request->id_soal_ujian,
            // 'pila' => $request->pila,
            // 'pilb' => $request->pilb,
            // 'pilc' => $request->pilc,
            // 'pild' => $request->pild,
            'id_jawaban' => $request->id_jawaban,
            'created_at' => now(),
        ]);

        if($ujianSekolah){
            return redirect()->route('ujianSekolah.indexSelesai')->with('success', 'Selalamat Anda Telah Mengerjakan Ujian Sekolah dengan baik.');
        }else{
            return redirect()->route('ujianSekolah.index')->with('error', 'Terjadi kesalahan sistem, silahkan menghubungi pihak Admin.');
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
        return view('ujianSekolah.show', compact('ujianSekolah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UjianSekolah  $ujianSekolah
     * @return \Illuminate\Http\Response
     */
    public function edit(UjianSekolah $ujianSekolah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UjianSekolah  $ujianSekolah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UjianSekolah $ujianSekolah)
    {
        //
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
