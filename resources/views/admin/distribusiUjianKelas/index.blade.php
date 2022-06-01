@extends('layouts.appAdmin')
@section('title', 'Distribusi Ujian Kelas')
@section('distribusiUjianKelas')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between ">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/home') }}">{{ __("Dashboard") }}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ __("Distribusi Ujian Kelas") }}</li>
            </ol>
          </nav>
    </div>

    <!-- Content Row -->
    <div class="row">
       <!-- Earnings (Monthly) Card Example -->
       <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Jumlah Data Distribusi Ujian Kelas">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Distribusi Ujian Kelas
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $DisujianKelasCount }}</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar"
                                        style="width: {{ $DisujianKelasCount }}%" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-card-checklist fa-2x text-gray-300"></i>
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
        <p class="">Fitur pada bagian Category ini berfungsi untuk menambahkan Kategori Ujian yang dimana sesuai dengan mata Ujian SMP / SMA / SMK.</p>
            </div>
            <div class="m-3">
                <button type="button" class="btn btn-primary  m-1 p-3" data-bs-toggle="modal" data-bs-target="#createdistribusiUjianKelas">
                <i class="bi bi-folder-plus fa-1x"></i>
                    Create Distribusi Ujian Kelas
                </button>

                <button type="button" class="btn btn-success  m-1 p-3" data-bs-toggle="modal" data-bs-target="#importCategoriesUjian">
                    <i class="bi bi-file-earmark-spreadsheet-fill"></i>  Import Excel
                </button>

                <button class="btn btn-danger  m-1 p-3 delete_all" data-url="{{ url('categories-ujianDeleteAll') }}">
                    <i class="bi bi-trash-fill"></i>
                    Delete All Selected
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive ">
                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <input type="checkbox" class="p-5" id="master" />
                                </th>
                                <th>No</th>
                                <th>Kelas</th>
                                <th>Mata Pelajaran</th>
                                <th>Sekolah</th>
                                <th>Jenis Ujian</th>
                                <th class="text-center">Status</th>
                                <th class="text-center w-25">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                        @endphp
                        @foreach ($DisujianKelases as $DisujianKelas)
                        <tr id="tr_{{ $DisujianKelas->id }}">
                            <td class="text-center">
                                <input type="checkbox" class="sub_chk" data-id="{{ $DisujianKelas->id }}">
                            </td>
                            <td class="fw-bold">{{ $no++ }}</td>
                            <td>{{ $DisujianKelas->id_kelas ?? "" }}</td>
                            <td>{{ $DisujianKelas->category->name_category ?? "" }}</td>
                            <td>{{ $DisujianKelas->sekolah->name_sekolah ?? "" }}</td>
                            <td>{{ $DisujianKelas->categoryUjian->name_category_ujian ?? "" }}</td>
                            <td>
                                <div class="dropdown no-arrow mb-4">
                                    <button class="@if($DisujianKelas->status == 1) btn btn-success @else btn btn-danger @endif dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                       @if($DisujianKelas->status == 1)
                                        Active
                                        @else
                                        Non Active
                                        @endif
                                    </button>
                                    <div class="dropdown-menu @if($DisujianKelas->status == 1) bg-danger @else bg-success @endif" aria-labelledby="dropdownMenuButton">
                                        @if($DisujianKelas->status == 1)
                                        <a class="dropdown-item text-white rounded bg-danger" style="font-size: 18px;" href="{{ url('/distribusiUjianKelas-status-'.$DisujianKelas->id) }}">Non Active</a>
                                        @else
                                        <a class="dropdown-item text-white rounded bg-success" style="font-size: 18px;" href="{{ url('/distribusiUjianKelas-status-'.$DisujianKelas->id) }}">Active</a>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="text-center" >
                                <a href="/distribusiUjianKelas-show-{{ $DisujianKelas->id }}" class="btn btn-info text-white p-2 shadow-sm m-2 show-confirm" data-bs-toggle="tooltip" data-bs-placement="top" title="Show"> <i class="bi bi-eye-fill"></i></a>
                                <a href="/distribusiUjianKelas-edit-{{ $DisujianKelas->id }}" class="btn btn-warning text-white p-2 shadow-sm m-2 edit-confirm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"> <i class="bi bi-pencil-square"></i></a>
                                <a href="/distribusiUjianKelas/delete/{{ $DisujianKelas->id }}" class="btn btn-danger text-white p-2 shadow-sm m-2 delete-confirm" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"> <i class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    {{-- Import Category --}}
    {{-- @include('admin.categories-ujian.importcategories-ujian') --}}

    {{-- Create Category Ujian --}}
    @include('admin.distribusiUjianKelas.create')

@endsection
