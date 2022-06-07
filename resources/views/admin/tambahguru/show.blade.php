@extends('layouts.appAdmin')
@section('title', 'Show Guru')

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

    <div class="mb-3">
        <a href="{{ url('/guru') }}" class="btn btn-success py-3"> <i class="bi bi-box-arrow-left"></i> Kembali</a>
    </div>

    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseCardExample">
            <div class="card mb-4 py-3 border-left-primary">
                <div class="card-body">
                    <p class="fw-bold btn bg-primary text-light">Identitas Profil Guru:</p>
                    <div class="fw-bold">
                        <p class="text-capitalize">{{ __("NIS :") }} <span class="badge bg-primary" style="font-size: 16px;">
                            {{ $guruAdmin->no_induk }}
                        </span></p>
                         <p class="text-capitalize">{{ __("NISN:") }} <span class="badge bg-primary" style="font-size: 16px;">
                            {{ $guruAdmin->nisn }}
                        </span></p>
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
                                <th width="">No</th>
                                <th width="">Status</th>
                                <th width="">Nama</th>
                                <th width="">Gender</th>
                                <th width="">Sekolah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td class="text-capitalize">{{ $guruAdmin->role ?? "" }}</td>
                                <td class="text-capitalize">{{ $guruAdmin->name ?? "" }}</td>
                                <td class="text-uppercase">{{ $guruAdmin->jk ?? "" }}</td>
                                <td class="text-uppercase">{{ $guruAdmin->sekolah->name_sekolah ?? "" }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
