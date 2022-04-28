<?php

namespace App\Http\Controllers;

use App\Models\UjianSekolah;
use Illuminate\Http\Request;

class UjianSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ujianSekolah = UjianSekolah::all();
        return view('ujianSekolah.index', compact('ujianSekolah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UjianSekolah  $ujianSekolah
     * @return \Illuminate\Http\Response
     */
    public function show(UjianSekolah $ujianSekolah)
    {
        //
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
    public function destroy(UjianSekolah $ujianSekolah)
    {
        //
    }
}
