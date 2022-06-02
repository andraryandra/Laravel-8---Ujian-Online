<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Sekolah;
use App\Imports\PostImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class TambahSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswaAdmins = User::with('kelas')->where('role', 'siswa')->orderBy('id', 'desc')->get(); // Menampilkan data terbaru
        // ->whereRole('admin') // menampilkan data  Admin saja
        $sekolahs = Sekolah::pluck('name_sekolah', 'id')->all();
        $kelas = Kelas::where('id_sekolah_asal', Auth::user()->sekolah_asal)->pluck('name_kelas', 'id')->all();
        $siswaAdminCount = User::where('sekolah_asal', Auth::user()->sekolah_asal)->where('role', 'siswa')->count();
        return view('admin.tambahsiswa.index', compact('siswaAdmins','sekolahs','kelas','siswaAdminCount'));
    }

    public function listSiswa()
    {
       $siswaPersons = DB::select("CALL `getSiswaData`()");
        return view('admin.tambahsiswa.print', compact('siswaPersons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswaAdmin = User::all();
        return view('admin.siswa.create', compact('siswaAdmin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $siswaAdmin)
    {
        $this->validate($request, [
            'id_kelas' => 'required',
            'role' => 'required',
            'no_induk' => 'required',
            'nisn' => 'required',
            'jk' => 'required',
            // 'gambar' => 'nullable',
            'sekolah_asal' => 'required',
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $siswaAdmin = User::insert([
            'id_kelas' => $request->id_kelas,
            'role' => $request->role,
            'no_induk' => $request->no_induk,
            'nisn' => $request->nisn,
            'jk' => $request->jk,
            // 'gambar' => $request->gambar,
            'sekolah_asal' => $request->sekolah_asal,
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if($siswaAdmin){
            return redirect()->route('siswa.index')->with('success', 'Created Siswa successfully!');
        } else {
            return redirect()->route('siswa.index')->with('error', 'Failed to create Siswa Admin!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswaAdmin = User::findOrFail($id);
        $sekolahs = Sekolah::pluck('name_sekolah', 'id')->all();
        $siswaAdmins = User::with('kelas')->get();
        $siswaAdminCount = User::where('role', 'siswa')->count();
        return view('admin.tambahsiswa.show', compact('siswaAdmin','sekolahs','siswaAdmins','siswaAdminCount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswaAdmin = User::with('kelas')->findOrFail($id);
        $sekolahs = Sekolah::pluck('name_sekolah', 'id')->all();
        $kelas = Kelas::where('id_sekolah_asal', Auth::user()->sekolah_asal)->pluck('name_kelas', 'id')->all();
        $siswaAdminCount = User::where('role', 'siswa')->count();
        return view('admin.tambahsiswa.edit', compact('siswaAdmin','sekolahs','kelas','siswaAdminCount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $siswaAdmin)
    {

        DB::table('users')->where('id', $request->id)->update([
            'id_kelas' => $request->id_kelas,
            'no_induk' => $request->no_induk,
            'nisn' => $request->nisn,
            'jk' => $request->jk,
            'sekolah_asal' => $request->sekolah_asal,
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'updated_at' => now(),
        ]);

        return redirect()->route('siswa.index')->with('success', 'Updated Siswa successfully!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('siswa.index')->with('success', 'Deleted Siswa successfully!');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        User::whereIn('id',explode(',',$ids))->delete();
        $messages = ['success', 'Delete Post successfully!'];
        return response()->json([
            'success' => $messages,
        ]);
    }

    public function importKelas(Request $request){
        //melakukan import file
        Excel::import(new PostImport, request()->file('file'));
        //jika berhasil kembali ke halaman sebelumnya
        return back()->with('success', 'Import Post successfully!');
    }

}
