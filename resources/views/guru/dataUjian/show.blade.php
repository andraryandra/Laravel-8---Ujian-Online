@extends('layouts.appAdmin')
@section('title' ,'Show Data Hasil Ujian Siswa')
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

    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-dark shadow h-100 py-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Jumlah Data Ujian Sekolah">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                Data Ujian Sekolah
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $dataUjianCount ?? "" }}</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-dark" role="progressbar"
                                         style="width: {{ $dataUjianCount ?? "" }}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-journal-text fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="font-weight-bold text-primary">DataTable </h6>
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
                                <th>Total Jawaban Benar</th>
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
                                {{-- @if($dataUjian->category_ujian->name_category_ujian == $ujianSekolah && $dataUjian->category_pelajaran->name_category == $ujianSekolah && $dataUjian->user->name == $ujianSekolah && $dataUjian->kelas->name_kelas == $ujianSekolah) --}}
                                {{-- @if($dataUjian->category_ujian->name_category_ujian == $ujianSekolah && $dataUjian->category_pelajaran->name_category == $ujianSekolah && $dataUjian->user->name == $ujianSekolah && $dataUjian->kelas->name_kelas == $ujianSekolah) --}}

                                    {{-- <td>{{ count($ujianSekolah) }}</td> --}}



                                {{-- @endif --}}

                                {{-- <td>{{ round(($ujianSekolahs*100) / $ujianSekolahCount) }}</td> --}}

                            </tr>
                        </tbody>
                    </table>
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
                            <p class="text-capitalize badge bg-info fs-5 m-2 text-center">Soal Ujian Pilihan Ganda</p>
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
                                    {{ $no++ }}. {{ $ujianSekolahs->post->soal_ujian ?? "Not Found!"}}
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
                                <p class="text-capitalize badge bg-info fs-5 m-2 text-center">Soal Essay Ujian</p>
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
                                    {{ $noEssay++ }}. {{ $ujianSekolahEssays->postEssay->soal_ujian_essay ?? "Not Found!"}}
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

