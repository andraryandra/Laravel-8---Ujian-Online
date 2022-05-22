<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\User;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class TambahAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::where('role', 'admin')
        ->with('sekolah')
        ->orderBy('id', 'desc')
        ->get();
        $sekolahs = Sekolah::pluck('name_sekolah', 'id')->all();
        $adminCount = User::where('role', 'admin')->count();
        return view('superadmin.tambahadmin.index', compact('admins','sekolahs','adminCount'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admins = User::all();
        $sekolahs = Sekolah::pluck('name_sekolah', 'id')->all();
        return view('superadmin.tambahadmin.index', compact('admins','sekolahs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $admin)
    {
        $this->validate($request, [
            'role' => 'required',
            'sekolah_asal' => 'required',
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        DB::table('users')->insert([
            'role' => $request->role,
            'sekolah_asal' => $request->sekolah_asal,
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TambahAdmin  $tambahAdmin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = User::find($id);
        return view('superadmin.tambahadmin.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TambahAdmin  $tambahAdmin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = User::find($id);
        $sekolahs = Sekolah::pluck('name_sekolah', 'id')->all();
        $adminCount = User::where('role', 'admin')->count();
        return view('superadmin.tambahadmin.edit', compact('admin','sekolahs','adminCount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TambahAdmin  $tambahAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        DB::table('users')->where('id', $request->id)->update([
            'role' => $request->role,
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'sekolah_asal' => $request->sekolah_asal,
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TambahAdmin  $tambahAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();
        return redirect()->route('admin.index')->with('success', 'Data berhasil dihapus');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        User::whereIn('id',explode(',',$ids))->delete();
        $messages = ['success', 'Delete Admin successfully!'];
        return response()->json([
            'success' => $messages,
        ]);
    }

}
