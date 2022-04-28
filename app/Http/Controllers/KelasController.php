<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Imports\KelasImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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
      
        $kelases = Kelas::all();
        $kelasesCount = Kelas::count();
        return view('admin.kelas.index', compact('kelases','kelasesCount'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::with('user')->all();
        return view('admin.kelas.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        DB::table('kelas')->insert([
            'id_wali' => $request->id_wali,
            'name_kelas' => $request->name_kelas,
        ]);
        return redirect()->route('kelas.index')->with('success', 'Created Kelas successfully!');
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
        $kelas = Kelas::find($id);
        $kelasesCount = Kelas::count();
        return view('admin.kelas.edit', compact('kelas','kelasesCount'));
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
        DB::table('kelas')->where('id', $request->id)->update([
            'id_wali' => $request->id_wali,
            'name_kelas' => $request->name_kelas,
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
