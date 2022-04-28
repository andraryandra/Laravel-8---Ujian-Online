<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Kelas;
use App\Imports\PostImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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
        $kelas = Kelas::pluck('name_kelas', 'id')->all();
        $kelasesCount = Kelas::count();
        $siswaAdminCount = User::count();
        return view('admin.tambahsiswa.index', compact('siswaAdmins','kelas','siswaAdminCount','kelasesCount'));
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
    public function store(Request $request)
    {
        DB::table('users')->insert([
            'id_kelas' => $request->id_kelas,
            'role' => $request->role,
            'no_induk' => $request->no_induk,
            'nisn' => $request->nisn,
            'jk' => $request->jk,
            'gambar' => $request->gambar,
            'sekolah_asal' => $request->sekolah_asal,
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),

        ]);
        return redirect()->route('siswa.index')->with('success', 'Created Siswa successfully!');
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
        $siswaAdmins = User::with('kelas')->get();
        $siswaAdminCount = User::count();
        return view('admin.tambahsiswa.show', compact('siswaAdmin','siswaAdmins','siswaAdminCount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswaAdmin = User::findOrFail($id);
        $kelas = Kelas::pluck('name_kelas', 'id')->all();
        $siswaAdminCount = User::count();
        return view('admin.tambahsiswa.edit', compact('siswaAdmin','kelas','siswaAdminCount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('users')->where('id', $request->id)->update([
            'id_kelas' => $request->id_kelas,
            'no_induk' => $request->no_induk,
            'nisn' => $request->nisn,
            'jk' => $request->jk,
            'sekolah_asal' => $request->sekolah_asal,
            'name' => $request->name,
            // 'username' => $request->username,
            // 'password' => Hash::make($request->password),
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
