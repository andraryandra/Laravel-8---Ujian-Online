@extends('layouts.app')
@section('title' ,'Start')
@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header ">
      <h3 class="fw-bold btn btn-info text-white"><i class="bi bi-book"></i> Ujian online</h3>
    </div>
    <div class="card-body">
      <h5 class="card-title btn btn-success font-monospace">Identitas Siswa:</h5>
      <div class="card w-auto border border-3 border-success rounded shadow">
        <div class="card-body">
          <p class="fs-5 font-monospace text-capitalize">Nama : {{ Auth::User()->name ?? "" }}</p>
          <p class="fs-5 font-monospace text-uppercase">Kelas : {{ Auth::User()->kelas->name_kelas ?? "" }}</p>
          <p class="fs-5 font-monospace text-uppercase">Sekolah : {{ Auth::User()->sekolah_asal ?? "" }}</p>
        </div>
      </div>

      <div class="card mt-3">
        <h5 class="card-header">Ujian Online</h5>
        <div class="card-body">
          <h5 class="card-title">Information</h5>
          <p class="card-text">Terima kasih sudah mengerjakan Ujian ini dengan baik.</p>
          <p class="card-text">Untuk Nilai Hasil Ujian ini untuk akan di post Account Ujian masing-masing, jadi tetap stand-by untuk mengecek.</p>

        </div>
      </div>
      
      
      <a href="{{ url('#') }}" class="btn btn-primary mt-4"><i class="bi bi-box-arrow-in-right fa-2x"></i> Keluar</a>

      
    </div>
  </div>
</div>
@endsection
