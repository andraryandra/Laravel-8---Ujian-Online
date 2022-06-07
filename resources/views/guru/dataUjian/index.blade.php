@extends('layouts.appAdmin')
@section('title' ,'Data Ujian Siswa')
@section('guru')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between ">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/home') }}">{{ __("Dashboard") }}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ __("Data Ujian Sekolah") }}</li>
            </ol>
          </nav>
    </div>

@if(Auth::user()->role == 'guru' || Auth::user()->role == 'admin')
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
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $dataUjianCount }}</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-dark" role="progressbar"
                                        style="width: {{ $dataUjianCount }}%" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100"></div>
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
@endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="font-weight-bold text-primary">DataTable </h6>
        <p class="">Fitur pada bagian Category ini berfungsi untuk menambahkan Kategori Ujian yang dimana sesuai dengan mata Ujian SMP / SMA / SMK.</p>
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
                                <th class="text-center w-25">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                        @endphp
                        @foreach ($dataUjian as $dataUjians)
                        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'guru')
                        <tr id="tr_{{ $dataUjians->id }}">
                            <td>{{ $no++ }}</td>
                            <td>{{ $dataUjians->category_ujian->name_category_ujian ?? ""}}</td>
                            <td class="text-capitalize">{{ $dataUjians->category_pelajaran->name_category ?? "" }}</td>
                            <td class="text-capitalize">{{ $dataUjians->user->name ?? "" }}</td>
                            <td>{{ $dataUjians->kelas->name_kelas ?? "" }}</td>
                            <td class="text-center w-25">
                                <a href="/dataUjian-show-{{ $dataUjians->id }}" class="btn btn-info text-white shadow-sm m-2 show-confirm" data-bs-toggle="tooltip" data-bs-placement="top" title="Show"> <i class="bi bi-eye-fill"></i> Lihat Hasil Ujian</a>
                                <a href="/dataUjian-edit-{{ $dataUjians->id }}" class="btn btn-primary text-white shadow-sm m-2 show-confirm" data-bs-toggle="tooltip" data-bs-placement="top" title="Store"> <i class="bi bi-pencil-square"></i> Store Nilai Ujian</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach

                            @foreach ($dataUjian as $dataUjians)
                                @if(Auth::user()->role == 'siswa '|| Auth::user()->id == $dataUjians->id_user)
                                <tr id="tr_{{ $dataUjians->id }}">
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $dataUjians->category_ujian->name_category_ujian ?? ""}}</td>
                                    <td class="text-capitalize">{{ $dataUjians->category_pelajaran->name_category ?? "" }}</td>
                                    <td class="text-capitalize">{{ $dataUjians->user->name ?? "" }}</td>
                                    <td>{{ $dataUjians->kelas->name_kelas ?? "" }}</td>
                                    <td class="text-center w-25">
                                        <a href="/dataUjian-show-{{ $dataUjians->id }}" class="btn btn-info text-white shadow-sm m-2 show-confirm" data-bs-toggle="tooltip" data-bs-placement="top" title="Show"> <i class="bi bi-eye-fill"></i> Lihat Hasil Ujian</a>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

@endsection
