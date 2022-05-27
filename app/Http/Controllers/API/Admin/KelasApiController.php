<?php

namespace App\Http\Controllers\API\Admin;

use App\Models\User;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class KelasApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $kelases = Kelas::where('id_wali', null)->orderBy('id_wali', 'desc')->get();
        $kelases = Kelas::with('user')->get();
        $guruAdmin = User::where('role', 'guru')->pluck('name', 'id')->all();
        return response()->json([
            'data' => 'Data Kelas Tampil Success',
            'kelases' => $kelases,
            'guruAdmin' => $guruAdmin,
        ]);

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
        return response()->json([
            'data' => 'Data Kelas Tampil Success',
            'kelas' => $kelas,
            'guruAdmin' => $guruAdmin,
        ]);
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
        ]);

        $kelas = Kelas::create([
            'name_kelas' => $request->name_kelas,
            'id_wali' => $request->id_wali,
        ]);

        return response()->json([
            'data' => 'Data Kelas Tampil Success',
            'kelas' => $kelas,
        ]);
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
        return response()->json([
            'data' => 'Data Kelas Tampil Success',
            'kelas' => $kelas,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = Kelas::with('user')->find($id);
        $guruAdmin = User::where('role', 'guru')->pluck('name', 'id')->all();
        return response()->json([
            'data' => 'Data Kelas Tampil Success',
            'kelas' => $kelas,
            'guruAdmin' => $guruAdmin,
        ]);

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
        $kelas = DB::table('kelas')->where('id', $request->id)->update([
            'id_wali' => $request->id_wali,
            'name_kelas' => $request->name_kelas,
            'updated_at' => now(),
        ]);

        return response()->json([
            'data' => 'Data Kelas Tampil Success',
            'kelas' => $kelas,
        ]);

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
}
