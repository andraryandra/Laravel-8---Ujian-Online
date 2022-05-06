@extends('layouts.appAdmin')
@section('title', 'Show Kelas')
@section('kelas')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between ">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">{{ __("Dashboard") }}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ __("Kelas") }}</li>
            </ol>
          </nav>
    </div>

    <div class="mb-3">
        <a href="/kelas" class="btn btn-success py-3"> <i class="bi bi-box-arrow-left"></i> Kembali</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Jumlah Data Kelas">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                {{ __("Kelas") }}
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $kelasesCount }}</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-danger" role="progressbar"
                                            style="width: {{ $kelasesCount }}% " aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-house-door-fill fa-2x text-gray-300 "></i>
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
                <p class="">Fitur pada bagian Users - Kelas ini berfungsi untuk menambahkan Kelas Ujian yang dimana sesuai dengan kelasnya masing-masing Ujian SMP / SMA / SMK.</p>
            </div>
            <div class="card-body">
                <div class="table-responsive ">    
                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">                       
                        <thead>
                            <tr>
                                <th width="50%">Kelas</th>
                                <th width="20%">Wali Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><span class="badge bg-info text-white fs-6 text-roboto shadow-sm p-3">{{ $kelas->name_kelas }}</span></td>
                            @if($kelas->id_wali == null) 
                            <td class="text-white bg-danger text-center fw-bold">
                                <a href="/kelas-edit-{{ $kelas->id }}" class="btn btn-warning text-white p-2 shadow-sm m-2 fw-bold"> <i class="bi bi-pencil-square"></i> Isi Data Sekarang !!</a> 
                            </td>
                            @else
                            <td class=""><span class="badge bg-info text-white fs-6 text-roboto shadow-sm p-3">{{ $kelas->id_wali }}</span></td>
                            @endif
                        </tr>               
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection