<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Sekolah;
use Illuminate\Http\Request;
use App\Imports\SekolahImport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sekolahs = Sekolah::all();
        $sekolahCount = Sekolah::count();
        return view('superadmin.tambahsekolah.index', compact('sekolahs','sekolahCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sekolah = Sekolah::all();
        return view('superadmin.tambahsekolah.create', compact('sekolah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name_sekolah' => 'required|string|max:255',
        ]);

        DB::table('sekolahs')->insert([
            'name_sekolah' => request('name_sekolah'),
        ]);

        return redirect()->route('sekolah.index')->with('success', 'Sekolah berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sekolah = Sekolah::find($id);
        $sekolahCount = Sekolah::count();
        return view('superadmin.tambahsekolah.show', compact('sekolah','sekolahCount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sekolah = Sekolah::find($id);
        $sekolahCount = Sekolah::count();
        return view('superadmin.tambahsekolah.edit', compact('sekolah','sekolahCount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name_sekolah' => 'required|string|max:255',
        ]);

        DB::table('sekolahs')
            ->where('id', request('id'))
            ->update([
                'name_sekolah' => request('name_sekolah'),
            ]);

        return redirect()->route('sekolah.index')->with('success', 'Sekolah berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('sekolahs')->where('id', $id)->delete();
        return redirect()->route('sekolah.index')->with('success', 'Sekolah berhasil dihapus');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Sekolah::whereIn('id',explode(',',$ids))->delete();
        $messages = ['success', 'Delete Sekolah successfully!'];
        return response()->json([
            'success' => $messages,
        ]);
    }

    public function importSekolah(Request $request){
        //melakukan import file
        Excel::import(new SekolahImport, request()->file('file'));
        //jika berhasil kembali ke halaman sebelumnya
        return back()->with('success', 'Import Sekolah successfully!');
    }
}
