@extends('layouts.appAdmin')
@section('title' ,'Ujian Siswa')
@section('siswa')

<div class="container-fluid">

    <div class="card mb-4 py-2 border-left-primary">
        <div class="card-body">
            <div class="card-header py-3 rounded">
                <h4 class="font-weight-bold text-primary"><span class="badge bg-info p-3 shadow-sm fw-bold text-white text-monospace"><i class="bi bi-tags"></i> Ujian Online</span></h4>
                <p class="text-monospace">
                    Diharapkan mengerjakan soal dengan baik dan benar. Pilihlah jawaban sesuai menurut apa kata hati kalian itu jawaban yang benar.
                    Dan jalan lupa selalu berdoa supaya ujian kalian dilancarkan.
                </p>
            </div>
        </div>
    </div>

    <br>
  <div class="card">
      <div class="card-body">

        <div class="table-responsive ">
            <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Kelas</th>
                        <th class="text-center">Mata Pelajaran</th>
                        <th class="text-center">Jenis Ujian</th>
                        <th class="text-center">Link Ujian</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                @endphp
                @foreach ($DisujianKelases as $DisujianKelas)
                {{-- && Auth::user()->kelas->name_kelas >= '7-A' && Auth::user()->kelas->name_kelas <= '7-Z' --}}
                @if ($DisujianKelas->status == 1 && $DisujianKelas->id_kelas == '7')
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td class="text-center">{{ $DisujianKelas->id_kelas }}</td>
                        <td class="text-center">{{ $DisujianKelas->category->name_category }}</td>
                        <td class="text-center">{{ $DisujianKelas->categoryUjian->name_category_ujian }}</td>
                        <td class="text-center">
                            <a href="{{ url('/ujianSekolah-create-'.$DisujianKelas->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-box-arrow-in-right"></i> Mulai Ujian</a>
                        </td>
                    </tr>
                @elseif($DisujianKelas->status == 1 && $DisujianKelas->id_kelas == '8')
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td class="text-center">{{ $DisujianKelas->id_kelas }}</td>
                        <td class="text-center">{{ $DisujianKelas->category->name_category }}</td>
                        <td class="text-center">{{ $DisujianKelas->categoryUjian->name_category_ujian }}</td>
                        <td class="text-center">
                            <a href="{{ url('/ujianSekolah-create-'.$DisujianKelas->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-box-arrow-in-right"></i> Mulai Ujian</a>
                        </td>
                    </tr>
                @elseif($DisujianKelas->status == 1 && $DisujianKelas->id_kelas == '9')
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td class="text-center">{{ $DisujianKelas->id_kelas }}</td>
                        <td class="text-center">{{ $DisujianKelas->category->name_category }}</td>
                        <td class="text-center">{{ $DisujianKelas->categoryUjian->name_category_ujian }}</td>
                        <td class="text-center">
                            <a href="{{ url('/ujianSekolah-create-'.$DisujianKelas->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-box-arrow-in-right"></i> Mulai Ujian</a>
                        </td>
                    </tr>
                @endif
                @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    {{-- <a href="{{ url('/ujianSekolah-create') }}" class="btn btn-primary fs-4 shadow-lg"><i class="bi bi-box-arrow-in-right"></i> Mulai Ujian</a> --}}

  </div>
</div>

@endsection

{{-- @if(Auth::User()->kelas->name_kelas == '7')
                <tr id="tr_{{ $DisujianKelas->id }}">
                     <td class="fw-bold text-center">{{ $no++ }}</td>
                     <td class="text-center">{{ $DisujianKelas->id_kelas ?? "" }}</td>
                     <td class="text-center">{{ $DisujianKelas->category->name_category ?? "" }}</td>
                     <td class="text-center">{{ $DisujianKelas->categoryUjian->name_category_ujian ?? "" }}</td>
                     <td class="text-center"><a href="#" class="btn btn-primary shadow text-monospace rounded-pill px-3">Mulai</a></td>
                </tr>
                @elseif(Auth::User()->kelas->name_kelas == '8')
                <tr id="tr_{{ $DisujianKelas->id }}">
                     <td class="fw-bold text-center">{{ $no++ }}</td>
                     <td class="text-center">{{ $DisujianKelas->id_kelas ?? "" }}</td>
                     <td class="text-center">{{ $DisujianKelas->category->name_category ?? "" }}</td>
                     <td class="text-center">{{ $DisujianKelas->categoryUjian->name_category_ujian ?? "" }}</td>
                     <td class="text-center"><a href="#" class="btn btn-primary shadow text-monospace rounded-pill px-3">Mulai</a></td>
                </tr>
                @endif --}}
