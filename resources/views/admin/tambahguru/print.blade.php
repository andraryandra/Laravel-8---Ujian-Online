@extends('layouts.appAdmin')
@section('title', 'Print Data Guru')
@section('guruAdmin')


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between ">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">{{ __("Dashboard") }}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ __("Sekolah") }}</li>
            </ol>
          </nav>
    </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="font-weight-bold text-primary">DataTable </h6>
                <p class="">Fitur pada bagian Tambah Siswa ini berfungsi untuk menambahkan Siswa yang dimana sesuai dengan Data Sekolah SMP / SMA / SMK.</p>
            </div>
            <div class="card-body">
                <div class="table-responsive ">
                    <table class="table table-bordered" id="examplePrint" width="100%" cellspacing="0">
                        <thead>
                            <tr>

                                <th width="">No</th>
                                <th width="">Status</th>
                                <th width="">Nama</th>
                                <th width="">Gender</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                        @endphp
                        @foreach ($guruPersons as $guruPerson)
                        @if($guruPerson->sekolah_asal == Auth::user()->sekolah_asal)
                        <tr id="tr_{{ $guruPerson->id }}">
                            <td>{{ $no++ }}</td>
                            <td class="text-capitalize">{{ $guruPerson->role }}</td>
                            <td class="text-capitalize">{{ $guruPerson->name }}</td>
                            <td>{{ $guruPerson->jk }}</td>
                            @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

@endsection

