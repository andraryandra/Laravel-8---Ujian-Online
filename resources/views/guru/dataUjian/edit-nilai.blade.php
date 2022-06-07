@extends('layouts.appAdmin')
@section('title' ,'Edit Nilai Data Hasil Ujian Siswa')
@section('guru')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">{{ __("Dashboard") }}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ __("Data Ujian Sekolah") }}</li>
            </ol>
          </nav>
    </div>

    <div class="mb-3">
        <a href="{{ url('/dataUjian') }}" class="btn btn-success py-3"> <i class="bi bi-box-arrow-left"></i> Kembali</a>
    </div>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="font-weight-bold text-primary">DataTable Nilai Siswa</h6>
                <p class="">Fitur pada bagian Show ini berfungsi untuk menampilkan Identitas data diri yang dimana sesuai dengan data SMP / SMA / SMK .</p>
            </div>
            <div class="card-body">
                <div class="table-responsive ">
                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Category Ujian</th>
                                <th>Mata Pelajaran</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Total Jawaban Benar Pilihan Ganda</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            <tr>
                                <td class="text-center fw-bold">{{ $no++ }}</td>
                                <td>{{ $dataUjian->category_ujian->name_category_ujian }}</td>
                                <td class="text-capitalize">{{ $dataUjian->category_pelajaran->name_category }}</td>
                                <td class="text-capitalize">{{ $dataUjian->user->name }}</td>
                                <td>{{ $dataUjian->kelas->name_kelas }}</td>
                                <td class="text-center"><span class="btn bg-success text-white fw-bold">{{ $dataUjian->total_correct }}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="font-weight-bold text-primary">DataTable Correct Nilai</h6>
                <p class="">Fitur pada bagian Show ini berfungsi untuk menampilkan Identitas data diri yang dimana sesuai dengan data SMP / SMA / SMK .</p>
            </div>
            <div class="card-body">
                <div class="table-responsive ">

                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th>No</th>
                                <th>Total Jawaban Benar Pilihan Ganda</th>
                                <th>Total Nilai Keseluruhan Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            <tr>
                                <td class="text-center fw-bold">{{ $no++ }}</td>
                                <td class="text-center fs-5">{{ $dataUjian->total_correct }}</td>
                                <form action="/dataUjian/update" method="post">
                                    @csrf
                                <td hidden>
                                    <input type="text" name="id" value="{{ $dataUjian->id }}">
                                </td>
                                <td>
                                    <input type="text" name="total_nilai" id="total_nilai" class="form-control" placeholder="Total Nilai" value="{{ $dataUjian->total_nilai }}" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                        <button type="submit" class="btn btn-primary fs-5 shadow float-end"><i class="bi bi-check-circle"></i> SIMPAN</button>
                        <button type="reset" class="btn btn-warning shadow fst-italic fw-bold float-start" ><i class="bi bi-info-circle-fill"></i> Kembalikan Data Awal</button>
                </form>
                </div>
            </div>
        </div>


        <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __("Data Hasil Ujian Online -") }} {{ $dataUjian->category_ujian->name_category_ujian }} - {{ $dataUjian->category_pelajaran->name_category }}
                </h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    <div class="card mb-4 py-3 border-left-primary">
                        <div class="card-body">
                            <p class="fw-bold btn bg-primary text-light">Identitas Profil:</p>
                            <div class="fw-bold">
                                <p class="text-capitalize">{{ __("Nama:") }} <span class="badge bg-primary" style="font-size: 16px;">
                                    {{ $dataUjian->user->name }}
                                </span></p>
                                <p>{{ __("Kelas:") }} <span class="badge bg-primary" style="font-size: 16px;">
                                    {{ $dataUjian->kelas->name_kelas }}
                                </span></p>
                                <p>{{ __("Kategori Ujian:") }} <span class="badge bg-primary" style="font-size: 16px;">
                                    {{ $dataUjian->category_ujian->name_category_ujian }}
                                </span></p>
                                <p>{{ __("Kategori Pelajaran:") }} <span class="badge bg-primary" style="font-size: 16px;">
                                    {{ $dataUjian->category_pelajaran->name_category }}
                                </span></p>
                            </div>
                        </div>
                    </div>

                    <div class="card text-start|center|end">
                        <div class="card-header">
                            <p class="text-capitalize badge bg-info fs-5 mt-3 text-center">Soal Ujian Pilihan Ganda</p>
                        </div>
                    </div>
                    @php
                        $no = 1;
                    @endphp

                    <!-- Hasil Rekapan Data Ujian -->
                    @foreach ($ujianSekolah as $ujianSekolahs)
                        @if($dataUjian->id_category_ujian == $ujianSekolahs->id_category_ujian && $dataUjian->id_category_pelajaran == $ujianSekolahs->id_category_pelajaran && $dataUjian->id_user == $ujianSekolahs->id_user && $dataUjian->id_kelas == $ujianSekolahs->id_kelas)
                            <div class="card mb-3">
                                <div class="card-header fw-bold">
                                    <p class=" fw-bold badge bg-secondary" style="font-size: 16px;">Soal No.{{ $no++ }}.</p>
                                    <p class=" m-2">{!! $ujianSekolahs->post->soal_ujian ?? "Not Found!"!!}</p>
                                </div>
                                <div class="card-body">
                                    <div class="list-group m-3">
                                        <label for="id_category" class="fw-bold mb-2"> Jawaban:</label>
                                            <div class="list-group-item list-group-item-action">
                                                <div class="row ">
                                                    <div class="col-md-6 ">
                                                        <div class="form-group ">
                                                            <label for="id_category" class="fw-bold"> Jawaban Benar:</label>
                                                                <div class="form-control bg-success text-white fw-bold">
                                                                    @if($ujianSekolahs->post->jawaban == 'A')
                                                                    {{ __("A.") }} {{ $ujianSekolahs->post->pilihan_a }}
                                                                    @elseif($ujianSekolahs->post->jawaban == 'B')
                                                                    {{ __("B.") }} {{ $ujianSekolahs->post->pilihan_b }}
                                                                    @elseif($ujianSekolahs->post->jawaban == 'C')
                                                                    {{ __("C.") }} {{ $ujianSekolahs->post->pilihan_c }}
                                                                    @elseif($ujianSekolahs->post->jawaban == 'D')
                                                                    {{ __("D.") }} {{ $ujianSekolahs->post->pilihan_d }}
                                                                    @endif
                                                                </div>
                                                        </div>
                                                    </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="id_category" class="fw-bold"> Jawaban Siswa:</label>
                                                        <div class="@if($ujianSekolahs->id_jawaban == $ujianSekolahs->post->jawaban) form-control bg-success text-white fw-bold @else form-control bg-danger text-white fw-bold @endif">
                                                            @if($ujianSekolahs->id_jawaban == $ujianSekolahs->post->jawaban)
                                                                @if($ujianSekolahs->id_jawaban == 'A')
                                                                {{ __("A.") }} {{ $ujianSekolahs->post->pilihan_a }}
                                                                @elseif($ujianSekolahs->id_jawaban == 'B')
                                                                {{ __("B.") }} {{ $ujianSekolahs->post->pilihan_b }}
                                                                @elseif($ujianSekolahs->id_jawaban == 'C')
                                                                {{ __("C.") }} {{ $ujianSekolahs->post->pilihan_c }}
                                                                @elseif($ujianSekolahs->id_jawaban == 'D')
                                                                {{ __("D.") }} {{ $ujianSekolahs->post->pilihan_d }}
                                                                @endif
                                                            @else
                                                                @if($ujianSekolahs->id_jawaban == 'A')
                                                                {{ __("A.") }} {{ $ujianSekolahs->post->pilihan_a }}
                                                                @elseif($ujianSekolahs->id_jawaban == 'B')
                                                                {{ __("B.") }} {{ $ujianSekolahs->post->pilihan_b }}
                                                                @elseif($ujianSekolahs->id_jawaban == 'C')
                                                                {{ __("C.") }} {{ $ujianSekolahs->post->pilihan_c }}
                                                                @elseif($ujianSekolahs->id_jawaban == 'D')
                                                                {{ __("D.") }} {{ $ujianSekolahs->post->pilihan_d }}
                                                                @endif
                                                            @endif
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                            <hr>
                        <div class="card text-start|center|end">
                            <div class="card-header">
                                <p class="text-capitalize badge bg-info fs-5 mt-3 text-center">Soal Essay Ujian</p>
                            </div>
                        </div>
                            @php
                                $noEssay = 1;
                            @endphp
                        <!-- Hasil Rekapan Data Ujian -->
                    @foreach ($ujianSekolahEssay as $ujianSekolahEssays)
                        @if($dataUjian->id_category_ujian == $ujianSekolahEssays->id_category_ujian && $dataUjian->id_category_pelajaran == $ujianSekolahEssays->id_category_pelajaran && $dataUjian->id_user == $ujianSekolahEssays->id_user && $dataUjian->id_kelas == $ujianSekolahEssays->id_kelas)
                            <div class="card mb-3">
                                <div class="card-header fw-bold">
                                    <p class=" fw-bold badge bg-secondary" style="font-size: 16px;">Soal No.{{ $noEssay++ }}.</p>
                                    <p class=" m-2">{!! $ujianSekolahEssays->postEssay->soal_ujian_essay ?? "Not Found!" !!}</p>
                                </div>
                                <div class="card-body">
                                    <div class="list-group m-3">
                                        <label for="id_category" class="fw-bold mb-2"> Jawaban:</label>
                                            <div class="list-group-item list-group-item-action">
                                                <div class="row ">
                                                    <div class="col-md-6 ">
                                                        <div class="form-group ">
                                                            <label for="id_category" class="fw-bold"> Jawaban Guru:</label>
                                                                <textarea name="" disabled class="form-control bg-success text-white fw-bold" id="" cols="30" rows="10">{{ $ujianSekolahEssays->postEssay->jawaban_essay ?? "Not Found!" }}</textarea>
                                                        </div>
                                                    </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="id_category" class="fw-bold"> Jawaban Siswa:</label>
                                                        <textarea name="" disabled class="form-control bg-gray-350 text-black fw-bold" id="" cols="30" rows="10">{{ $ujianSekolahEssays->id_jawaban_essay ?? "Not Found!" }}</textarea>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                @endforeach
            </div>
@endsection

