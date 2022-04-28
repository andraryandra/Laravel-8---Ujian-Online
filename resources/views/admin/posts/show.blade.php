@extends('layouts.appAdmin')
@section('title', 'Show Post')

@section('post')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Post Ujian</li>
            </ol>
          </nav>
    </div>

    <div class="mb-3">
        <a href="/posts" class="btn btn-success py-3"> <i class="bi bi-box-arrow-left"></i> Kembali</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Jumlah Data Post Ujian">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Post Ujian
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $postCount }}</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: {{ $postCount }}% " aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-file-post fa-2x text-gray-300"></i>
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
                <p class="">Fitur pada bagian Post ini berfungsi untuk menambahkan Soal Ujian yang dimana sesuai dengan mata Ujian SMP / SMA / SMK .</p>
            </div>
            <div class="card-body">
                <div class="table-responsive "> 
                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">           
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 5%"> No</th>
                                <th class="text-center" style="width: 20%"> Category</th>
                                <th class="text-center" style="width: 55%"> Soal Ujian</th>                        
                                <th class="text-center" style="width: 55%"> Pilihan_A</th>
                                <th class="text-center" style="width: 55%"> Pilihan_B</th>
                                <th class="text-center" style="width: 55%"> Pilihan_C</th>
                                <th class="text-center" style="width: 55%"> Pilihan_D</th>
                                <th class="text-center" style="width: 5%"> Jawaban Benar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            <tr>
                                <td class="text-center fw-bold">{{ $no++ }}</td>
                                <td style="width: 25%">{{ $post->category->name_category }}</td>
                                <td style="width: 55%">{{ $post->soal_ujian }}</td>       
                                <td class="
                                @if($post->pilihan_a == $post->jawaban) 
                                text-white text-center bg-success @else text-white text-center bg-danger
                                @endif">{{ $post->pilihan_a }}</td>
                                <td class="
                                @if($post->pilihan_b == $post->jawaban) 
                                text-white text-center bg-success @else text-white text-center bg-danger
                                @endif">{{ $post->pilihan_b }}</td>
                                <td class="
                                @if($post->pilihan_c == $post->jawaban) 
                                text-white text-center bg-success @else text-white text-center bg-danger
                                @endif">{{ $post->pilihan_c }}</td>
                                <td class="
                                @if($post->pilihan_d == $post->jawaban) 
                                text-white text-center bg-success @else text-white text-center bg-danger
                                @endif">{{ $post->pilihan_d }}</td>
                                <td class="text-white text-center bg-success">{{ $post->jawaban }}</td>
                            </tr> 
                        </tbody>  
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
