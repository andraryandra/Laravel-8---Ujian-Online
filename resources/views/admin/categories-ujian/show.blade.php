@extends('layouts.appAdmin')
@section('title', 'Show Category Ujian')
@section('categoryUjian')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between ">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/home') }}">{{ __("Dashboard") }}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ __("Category Ujian") }}</li>
            </ol>
          </nav>
    </div>

    <div class="mb-3">
        <a href="{{ url('/categories-ujian') }}" class="btn btn-success py-3"> <i class="bi bi-box-arrow-left"></i> Kembali</a>
    </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="font-weight-bold text-primary">DataTable </h6>
        <p class="">Fitur pada bagian Category ini berfungsi untuk mengedit Kategori Ujian yang dimana sesuai dengan mata Ujian SMP / SMA / SMK.</p>
            </div>
            <div class="card-body">
                <div class="table-responsive ">
                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th width="75%">Category Ujian</th>
                                <th width="25%">Sekolah</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><span class="badge bg-info text-white fs-6 text-roboto shadow-sm p-2">{{ $categoryUjian->id ?? "" }}</span></td>
                            <td><span class="badge bg-info text-white fs-6 text-roboto shadow-sm p-2">{{ $categoryUjian->name_category_ujian ?? "" }}</span></td>
                            <td>{{ $categoryUjian->sekolah->name_sekolah }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
