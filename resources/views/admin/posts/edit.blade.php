@extends('layouts.appAdmin')
@section('title', 'Edit Post')

@section('post')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between ">
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
        <div class="col-xl-3 col-md-6 mb-4" data-bs-toggle="tooltip" data-bs-placement="top" title="Jumlah Data Post Ujian">
            <div class="card border-left-info shadow h-100 py-2">
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
                <p class="">Fitur pada bagian Post ini berfungsi untuk menambahkan Soal Ujian yang dimana sesuai dengan mata Ujian SMP / SMA / SMK.</p>
            </div>
            <div class="card-body">
                <form action="/posts/update" method="post">
                    @csrf   
                <div class="m-3" hidden>
                    <label for="id" class="pb-2 fw-bold">ID</label>
                    <input type="text" class="form-control" placeholder="id" name="id" value="{{ $post->id }}" required>
                </div>
                    <div class="form-group m-3">
                        <label for="id_category" class="pb-2 fw-bold mb-2 btn btn-info text-white"><i class="bi bi-bookmarks-fill"></i> {{ __('Category') }}</label>
                        <select class="form-control" name="id_category" id="id_category">
                            <option disabled="readonly">Pilih Category ...</option>
                            @foreach ($categori as $id => $categories)
                                                          {{-- Jika $id (Category) == $id (POST Category) maka 'Pilih' jika tidak Kosongkan --}}
                                <option value="{{ $id }}" {{ $id == $post->id_category ? 'selected' : '' }}>{{ $categories }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="m-3">
                        <label for="soal_ujian" class="pb-2 fw-bold mb-2 btn btn-info text-white"><i class="bi bi-book-fill "></i> {{ __('Create Soal Ujian') }}</label>
                        <textarea name="soal_ujian" id="soal_ujian" cols="30" rows="10" class="form-control" required>{{ $post->soal_ujian }}</textarea>
                    </div>
                    <div class="m-3">
                        <label for="pilihan_a" class="pb-2 fw-bold mb-2 btn btn-dark"><i class="bi bi-chevron-double-right"></i> {{ __('Pilihan A') }}</label>
                        <input type="text" class="form-control" placeholder="pilihan_a" name="pilihan_a" value="{{ $post->pilihan_a }}" required>
                    </div>    
                    <div class="m-3">
                        <label for="pilihan_b" class="pb-2 fw-bold mb-2 btn btn-dark"><i class="bi bi-chevron-double-right"></i> {{ __('Pilihan B') }}</label>
                        <input type="text" class="form-control" placeholder="pilihan_b" name="pilihan_b" value="{{ $post->pilihan_b }}" required>
                    </div>
                    <div class="m-3">
                        <label for="pilihan_c" class="pb-2 fw-bold mb-2 btn btn-dark"><i class="bi bi-chevron-double-right"></i> {{ __('Pilihan C') }}</label>
                        <input type="text" class="form-control" placeholder="pilihan_c" name="pilihan_c" value="{{ $post->pilihan_c }}" required>
                    </div> 
                    <div class="m-3">
                        <label for="pilihan_d" class="pb-2 fw-bold mb-2 btn btn-dark"><i class="bi bi-chevron-double-right"></i> {{ __('Pilihan D') }}</label>
                        <input type="text" class="form-control" placeholder="pilihan_d" name="pilihan_d" value="{{ $post->pilihan_d }}" required>
                    </div> 
                    <div class="m-3">
                        <label for="jawaban" class="pb-2 fw-bold mb-2 btn btn-success"><i class="bi bi-bookmark-check-fill"></i> {{ __('Jawaban Benar') }}</label>
                        <input type="text" class="form-control" placeholder="jawaban" name="jawaban" value="{{ $post->jawaban }}" required>
                    </div> 

                    <div class="m-3 mt-4">
                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                        <button type="reset" class="btn btn-warning">RESET</button>
                    </div> 
                </form>
            </div>
         </div>
    </div>

@endsection