<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Sekolah;
use App\Imports\PostImport;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class TambahGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $guruAdmins = User::all();
        $guruAdmins = User::where('sekolah_asal', Auth::user()->sekolah_asal)->where('role', 'guru')->orderBy('id', 'desc')->get(); // Menampilkan data terbaru
        $sekolahs = Sekolah::pluck('name_sekolah', 'id')->all();
        // ->whereRole('admin') // menampilkan data  Admin saja
        // $guruAdminCount = User::where('role', 'guru', '=' )->count();
        $guruAdminCount = User::where('sekolah_asal', Auth::user()->sekolah_asal)->where('role', 'guru')->count();
        return view('admin.tambahguru.index', compact('guruAdmins','sekolahs','guruAdminCount'));

    }

    public function listGuru()
    {
       $guruPersons = DB::select("CALL `getGuruData`()");
        return view('admin.tambahguru.print', compact('guruPersons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guruAdmin = User::all();
        return view('admin.guru.create', compact('guruAdmin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $guruAdmin)
    {
        $this->validate($request, [
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

        $noInduk = $request->no_induk = $request->username;

        $guruAdmin = User::insert([
            'role' => $request->role,
            // 'no_induk' => $request->no_induk = $request->username,
            'no_induk' => $noInduk,
            'nisn' => $request->nisn,
            'jk' => $request->jk,
            'sekolah_asal' => $request->sekolah_asal,
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'created_at' => now(),
        ]);

        if(!$guruAdmin){
            return redirect()->route('guru.index')->with('success', 'Created Guru Admin successfully!');
        } else {
            return redirect()->route('guru.index')->with('error', 'Failed to create Guru Admin!');
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
        $guruAdmin = User::findOrFail($id);
        $guruAdminCount = User::where('role', 'guru')->count();
        return view('admin.tambahguru.show', compact('guruAdmin','guruAdminCount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guruAdmin = User::where('sekolah_asal', Auth::user()->sekolah_asal)->findOrFail($id);
        $sekolahs = Sekolah::pluck('name_sekolah', 'id')->all();
        return view('admin.tambahguru.edit', compact('guruAdmin','sekolahs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $guruAdmin)
    {

        DB::table('users')->where('id', $request->id)->update([
            'no_induk' => $request->no_induk = $request->username,
            'nisn' => $request->nisn,
            'jk' => $request->jk,
            'sekolah_asal' => $request->sekolah_asal,
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'updated_at' => now(),
        ]);

        return redirect()->route('guru.index')->with('success', 'Updated Guru successfully!');
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
        return redirect()->route('guru.index')->with('success', 'Deleted Guru successfully!');
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

    public function importGuru(Request $request){
        //melakukan import file
        Excel::import(new PostImport, request()->file('file'));
        //jika berhasil kembali ke halaman sebelumnya
        return back()->with('success', 'Import Guru successfully!');
    }

}
