@extends('layouts.appAdmin')
@section('title', 'Show Post')

@section('postEssay')

  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between ">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
              <li class="breadcrumb-item {{ Request::is("post-essay") ? "active": "" }}" aria-current="page">Post Essay Ujian</a></li>
            </ol>
          </nav>
    </div>

    <div class="mb-3">
        <a href="{{ url('/post-essay') }}" class="btn btn-success py-3"> <i class="bi bi-box-arrow-left"></i> Kembali</a>
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
                                    <th class="">No</th>
                                    <th class="" width="20%">Category</th>
                                    <th class="w-50">Soal Ujian</th>
                                    <th class="w-50">Jawbaan Guru</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            <tr>
                                <td class="text-center fw-bold">{{ $no++ }}</td>
                                <td width="20%">{{ $postsEssay->category_pelajaran->name_category }}</td>

                                <td>{{ $postsEssay->soal_ujian_essay }}</td>
                                <td>{{ $postsEssay->jawaban_essay }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection


{{-- @if($post->pilihan_d == $post->jawaban)
text-white text-center bg-success @else text-white text-center bg-danger
@endif">{{ $post->pilihan_d }}</td> --}}
