@extends('layouts.appAdmin')
@section('title', 'Guru')
@section('guruAdmin')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between ">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/home') }}">{{ __("Dashboard") }}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ __("Guru") }}</li>
            </ol>
          </nav>
    </div>

    <!-- Content Row -->
    <div class="row">
       <!-- Earnings (Monthly) Card Example -->
       <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Jumlah Data Guru">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            {{ __("Guru") }}
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    {{ $guruAdminCount }}
                                </div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-primary" role="progressbar"
                                        style="width: {{ $guruAdminCount }}%" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-person-lines-fill fa-2x text-gray-300"></i>
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
                <p class="">Fitur pada bagian Tambah Guru ini berfungsi untuk menambahkan Guru yang dimana sesuai dengan Data Sekolah SMP / SMA / SMK.</p>
            </div>
            <div class="m-3">
                <button type="button" class="btn btn-primary  m-1 p-3 shadow" data-bs-toggle="modal" data-bs-target="#createGuru">
                <i class="bi bi-folder-plus fa-1x"></i>
                    Create Guru
                </button>

                <button type="button" class="btn btn-success  m-1 p-3 shadow" data-bs-toggle="modal" data-bs-target="#importGuru">
                    <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                    Import Excel
                </button>

                <button class="btn btn-danger  m-1 p-3 shadow delete_all" data-url="{{ url('/guruDeleteAll') }}">
                    <i class="bi bi-trash-fill"></i>
                    Delete All Selected
                </button>
                <a href="{{ url('/guruPrint') }}" class="btn btn-info  m-1 p-3 shadow">
                    <i class="bi bi-printer-fill" style="color: white;"></i>
                    Print All Data
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive ">
                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="5%" class="text-center">
                                    <input type="checkbox" class="p-5" id="master" />
                                </th>
                                <th width="">No</th>
                                <th width="">Status</th>
                                <th width="">Nama</th>
                                <th width="">Gender</th>
                                <th width="">Sekolah</th>
                                <th class="text-center" width="">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                        @endphp
                        @foreach ($guruAdmins as $guru)
                        @if($guru->sekolah->name_sekolah == Auth::user()->sekolah->name_sekolah)
                        <tr id="tr_{{ $guru->id }}">
                            <td class="text-center">
                                <input type="checkbox" class="sub_chk" data-id="{{$guru->id }}">
                            </td>
                            <td class="fw-bold">{{ $no++ }}</td>
                            <td class="fw-bold bg-primary text-white text-capitalize">{{ $guru->role ?? "" }}</td>
                            <td class="text-capitalize">{{ $guru->name ?? "" }}</td>
                            <td>{{ $guru->jk ?? "" }}</td>
                            <td>{{ $guru->sekolah->name_sekolah ?? "" }}</td>
                            <td class="text-center">
                                <a href="/guru-show-{{ $guru->id }}" class="btn btn-info text-white p-2 shadow-sm m-2 show-confirm" data-bs-toggle="tooltip" data-bs-placement="top" title="Show"> <i class="bi bi-eye-fill"></i></a>
                                <a href="/guru-edit-{{ $guru->id }}" class="btn btn-warning text-white p-2 shadow-sm m-2 edit-confirm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"> <i class="bi bi-pencil-square"></i></a>
                                <a href="/guru/delete/{{ $guru->id }}" class="btn btn-danger text-white p-2 shadow-sm m-2 delete-confirm" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"> <i class="bi bi-trash-fill"></i></a>
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


{{-- Import guru --}}
    @include('admin.tambahguru.importguru')

{{-- Create guru --}}
    @include('admin.tambahguru.create')

@endsection
