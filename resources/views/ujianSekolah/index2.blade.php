@extends('layouts.appAdmin')
@section('title' ,'Ujian Siswa')
@section('siswa')

<div class="container-fluid">
  <div class="card">
    <div class="card-header ">
      <h3 class="fw-bold btn btn-info text-white"><i class="bi bi-book"></i> Ujian online</h3>
    </div>
    <div class="card-body">
      <h5 class="card-title"></h5>
      <p class="card-text lh-base ">
        Diharapkan mengerjakan soal dengan baik dan benar. Pilihlah jawaban sesuai menurut apa kata hati kalian itu jawaban yang benar.
        Dan jalan lupa selalu berdoa supaya ujian kalian dilancarkan.
      </p>
      <p class="fs-3 font-monospace text-capitalize">Nama : {{ Auth::user()->name ?? "" }}</p>
      <p class="fs-3 font-monospace">Kelas : {{ Auth::user()->kelas->name_kelas ?? "" }}</p>
      <p class="fs-3 font-monospace">Sekolah : {{ Auth::User()->sekolah_asal ?? "" }}</p>
 
    </div>
    <a href="{{ url('/ujianSekolah-create') }}" class="btn btn-primary fs-4 shadow-lg"><i class="bi bi-box-arrow-in-right"></i> Mulai Ujian</a>

  </div>
</div>

@endsection