<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Sekolah;
use App\Imports\KelasImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Worksheet\Validations;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $kelases = Kelas::where('id_wali', null)->orderBy('id_wali', 'desc')->get();
        $kelases = Kelas::with('user')->with('sekolah')->get();
        $kelasesCount = Kelas::where('id_sekolah_asal', Auth::user()->sekolah_asal)->count();
        $guruAdmin = User::where('sekolah_asal', Auth::user()->sekolah_asal)->where('role', 'guru')->pluck('name', 'id')->all();
        $sekolahs = Sekolah::pluck('name_sekolah', 'id')->all();

        return view('admin.kelas.index', compact('kelases','kelasesCount','guruAdmin','sekolahs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::with('user')->all();
        $guruAdmin = User::pluck('name', 'id')->all();
        $sekolahs = Sekolah::pluck('nama_sekolah', 'id')->all();
        return view('admin.kelas.create', compact('kelas','guruAdmin','sekolahs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Kelas $kelas)
    {
        $this->validate($request, [
            'name_kelas' => 'required|unique:kelas',
            'id_wali' => 'nullable',
            'id_sekolah_asal' => 'required',
        ]);

        $kelas = Kelas::create([
            'name_kelas' => $request->name_kelas,
            'id_wali' => $request->id_wali,
            'id_sekolah_asal' => $request->id_sekolah_asal,
        ]);

        if($kelas){
            return redirect()->route('kelas.index')->with('success', 'Created Kelas successfully!');
        } else {
            return redirect()->route('kelas.index')->with('error', 'Failed to create Kelas!');
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
        $kelas = Kelas::find($id);
        $kelasesCount = Kelas::count();
        return view('admin.kelas.show', compact('kelas','kelasesCount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = Kelas::with('user')->with('sekolah')->find($id);
        $guruAdmin = User::where('sekolah_asal', Auth::user()->sekolah_asal)->where('role', 'guru')->pluck('name', 'id')->all();
        $sekolahs = Sekolah::pluck('name_sekolah', 'id')->all();
        return view('admin.kelas.edit', compact('kelas','guruAdmin','sekolahs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas)
    {


         DB::table('kelas')->where('id', $request->id)->update([
            'id_wali' => $request->id_wali,
            'name_kelas' => $request->name_kelas,
            'id_sekolah_asal' => $request->id_sekolah_asal,
            'updated_at' => now(),
        ]);


        return redirect()->route('kelas.index')->with('success', 'Updated Kelas successfully!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('kelas')->where('id', $id)->delete();
        return redirect()->route('kelas.index')->with('success', 'Deleted Kelas successfully!');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Kelas::whereIn('id',explode(',',$ids))->delete();
        $messages = ['success', 'Delete Kelas successfully!'];
        return response()->json([
            'success' => $messages,
        ]);
    }

    public function importKelas(Request $request){
        //melakukan import file
        Excel::import(new KelasImport, request()->file('file'));
        //jika berhasil kembali ke halaman sebelumnya
        return back()->with('success', 'Import Kelas successfully!');
    }
}
