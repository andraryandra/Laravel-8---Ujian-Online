@extends('layouts.app')
@section('title' ,'Ujian Selesai')
@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header ">
      <h3 class="fw-bold btn btn-info text-white"><i class="bi bi-book"></i> Ujian online </h3>
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
          <p>Nilai Ujian:</p>
          {{-- <input type="text" name="total_correct" value="{{ round(($ujianSekolah*100) / $ujianSekolahCount) }}"> --}}
          {{-- {{ round(($correct*100) / $total_quiz) }} --}}
          {{-- {{-- <span class="badge bg-success p-3 text-white fw-bold  " style="font-size: 16px;">{{ $ujianSekolah ?? "" }}</span> --}}
          {{-- <span class="badge bg-success p-3 text-white fw-bold  " style="font-size: 16px;">{{ $ujianSekolahCount ?? "" }}</span> --}}
          <span class="badge bg-success p-3 text-white fw-bold  " style="font-size: 16px;">{{ round(($ujianSekolah*100) / $ujianSekolahCount) }}</span>
        </div>

    </div>


      <a href="{{ url('/home') }}" class="btn btn-primary mt-4"><i class="bi bi-box-arrow-in-right fa-2x"></i> Keluar</a>


    </div>
  </div>
</div>
@endsection
