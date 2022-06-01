@extends('layouts.appAdmin')
@section('title', 'Kelas')
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

    <!-- Content Row -->
    <div class="row">
       <!-- Jumlah Kelas -->
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
                                        style="width: {{ $kelasesCount }}%" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-house-door-fill fa-2x text-gray-300"></i>
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
            <div class="m-3">
                <button type="button" class="btn btn-primary  m-1 p-3 shadow" data-bs-toggle="modal" data-bs-target="#createKelas">
                <i class="bi bi-folder-plus fa-1x"></i>
                    Create Kelas
                </button>

                <button type="button" class="btn btn-success  m-1 p-3 shadow" data-bs-toggle="modal" data-bs-target="#importKelas">
                    <i class="bi bi-file-earmark-spreadsheet-fill"></i>  Import Excel
                </button>

                <button class="btn btn-danger  m-1 p-3 shadow delete_all" data-url="{{ url('kelasDeleteAll') }}">
                    <i class="bi bi-trash-fill"></i>
                    Delete All Selected
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive ">
                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="5%" ><input type="checkbox" class="p-5" id="master" /> </th>
                                <th width="5%">No</th>
                                <th width="30%">Kelas</th>
                                <th width="20%">Sekolah</th>
                                <th width="15%">Wali Kelas</th>
                                <th class="text-center w-25">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                        @endphp
                        @foreach ($kelases as $kelas)
                        @if($kelas->sekolah->name_sekolah == Auth::user()->sekolah->name_sekolah)
                        <tr id="tr_{{ $kelas->id }}">
                            <td><input type="checkbox" class="sub_chk" data-id="{{$kelas->id}}"></td>
                            <td class="fw-bold">{{ $no++ }}</td>
                            <td>{{ $kelas->name_kelas ?? ""}}</td>
                            <td>{{ $kelas->sekolah->name_sekolah ?? ""}}</td>
                            @if($kelas->id_wali == null)
                            <td class="text-white bg-danger text-center fw-bold">
                                <a href="/kelas-edit-{{ $kelas->id }}" class="btn btn-warning text-white p-2 shadow-sm m-2 fw-bold"> <i class="bi bi-pencil-square"></i> Isi Data Sekarang !!</a>
                            </td>
                            @else
                            <td class="text-capitalize">{{ $kelas->user->name ?? "" }}</td>
                            @endif
                            <td class="text-center">
                                <a href="/kelas-show-{{ $kelas->id }}" class="btn btn-info text-white p-2 shadow-sm m-2 show-confirm" data-bs-toggle="tooltip" data-bs-placement="top" title="Show"> <i class="bi bi-eye-fill"></i></a>
                                <a href="/kelas-edit-{{ $kelas->id }}" class="btn btn-warning text-white p-2 shadow-sm m-2 edit-confirm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"> <i class="bi bi-pencil-square"></i></a>
                                <a href="/kelas/delete/{{ $kelas->id }}" class="btn btn-danger text-white p-2 shadow-sm m-2 delete-confirm" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"> <i class="bi bi-trash-fill"></i></a>
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


    {{-- Import Kelas --}}
    @include('admin.kelas.importkelas')

    {{-- Create Kelas --}}
   @include('admin.kelas.create')

@endsection
