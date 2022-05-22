@extends('layouts.appAdmin')
@section('title', 'Edit Sekolah')
@section('sekolah')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">{{ __("Dashboard") }}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ __("Sekolah") }}</li>
            </ol>
          </nav>
    </div>

    <div class="mb-3">
        <a href="{{ url('/sekolah') }}" class="btn btn-success py-3"> <i class="bi bi-box-arrow-left"></i> Kembali</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-success shadow h-100 py-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Jumlah Data Siswa">
             <div class="card-body">
                 <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                         <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                             {{ __("Sekolah") }}
                         </div>
                         <div class="row no-gutters align-items-center">
                             <div class="col-auto">
                                 <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $sekolahCount ?? "" }}</div>
                             </div>
                             <div class="col">
                                 <div class="progress progress-sm mr-2">
                                     <div class="progress-bar bg-success" role="progressbar"
                                         style="width: {{ $sekolahCount ?? "" }}%" aria-valuenow="50" aria-valuemin="0"
                                         aria-valuemax="100"></div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-auto">
                         <i class="bi bi-person-fill fa-2x text-gray-300"></i>
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
             <p class="">Fitur pada bagian Sekolah ini berfungsi untuk menambahkan Kategori Ujian yang dimana sesuai dengan mata Ujian SMP / SMA / SMK.</p>
        </div>

         <div class="card-body">
            <form action="/sekolah/update" method="post">
                @csrf
                    <div class="m-3">
                        <label for="id" class="pb-2 fw-bold" hidden >{{ __('ID Sekolah') }}</label>
                        <input type="hidden" class="form-control" placeholder="id" name="id" value="{{ $sekolah->id ?? "" }}" required>
                    </div>
                    <div class="m-3">
                        <label for="name_sekolah" class="pb-2 fw-bold"><i class="bi bi-bookmarks-fill"></i> {{ __('Name Sekolah') }}</label>
                        <input type="text" class="form-control" placeholder="Name Sekolah" name="name_sekolah" value="{{ $sekolah->name_sekolah ?? "" }}" required>
                    </div>
                    <div class="m-3">
                        <button type="submit" class="btn btn-primary fs-5 shadow mb-5"><i class="bi bi-check-circle"></i> SIMPAN</button><hr>
                        <button type="reset" class="btn btn-warning fs-5 fst-italic fw-bold shadow" style="float: right;"><i class="bi bi-info-circle-fill"></i> Kembalikan Data Awal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
