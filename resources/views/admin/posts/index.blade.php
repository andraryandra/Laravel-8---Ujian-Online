@extends('layouts.appAdmin')
@section('title', 'Post')

@section('post')

  <!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between ">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
              <li class="breadcrumb-item {{ Request::is("posts") ? "active": "" }}" aria-current="page">Post Ujian</a></li>
            </ol>
          </nav>
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
                <p class="">Fitur pada bagian Post ini berfungsi untuk menambahkan Soal Ujian yang dimana sesuai dengan mata Ujian SMP / SMA / SMK.</p>
            </div>
            <div class="m-3">
                <button type="button" class="btn btn-primary  m-1 p-3 shadow" data-bs-toggle="modal" data-bs-target="#createPost">
                <i class="bi bi-folder-plus fa-1x"></i> 
                    Create Post
                </button>

                <button type="button" class="btn btn-success  m-1 p-3 shadow" data-bs-toggle="modal" data-bs-target="#importPosts">
                    <i class="bi bi-file-earmark-spreadsheet-fill"></i>  Import Excel
                </button>

                <button class="btn btn-danger m-1 p-3 shadow delete_all" data-url="{{ url('postsDeleteAll') }}">
                    <i class="bi bi-trash-fill"></i> 
                    Delete All Selected
                </button>

            </div>
            <div class="card-body">
                <div class="table-responsive ">
                    <table class="table table-bordered display" id="example" cellspacing="0">                       
                            <thead>
                                <tr>
                                <th width="5%"><input type="checkbox" class="p-5" id="master" /> </th>
                                    <th style="width: 5%">No</th>
                                    <th width="10%">Category</th>
                                    <th width="35%">Soal Ujian</th>
                                    <th class="text-center" width="20%">Jawaban Benar</th>
                                    <th class="text-center" width="25%">Action</th>    
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($posts as $post)
                                <tr id="tr_{{ $post->id }}">
                                    <th width="5%" ><input type="checkbox" class="p-5" id="master" /> </th>
                                    <td class="text-start fw-bold">{{ $no++ }}</td>
                                    <td>{{ $post->category->name_category }}</td>
                                    <td >{{ $post->soal_ujian }}</td>
                                    <td class="text-white text-start bg-success">{{ $post->jawaban }}</td>
                                    <td class="text-center">
                                        <a href="/posts-show-{{ $post->id }}" class="btn btn-info text-white p-2 shadow-sm m-2 show-confirm" data-bs-toggle="tooltip" data-bs-placement="top" title="Show"> <i class="bi bi-eye-fill"></i></a>
                                        <a href="/posts-edit-{{ $post->id }}" class="btn btn-warning text-white p-2 shadow-sm m-2 edit-confirm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"> <i class="bi bi-pencil-square"></i></a>
                                        <a href="/posts/delete/{{ $post->id }}" class="btn btn-danger text-white p-2 shadow-sm m-2 delete-confirm" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"> <i class="bi bi-trash-fill"></i></a>             
                                    </td> 
                                </tr> 
                                @endforeach
                            </tbody>  
                        </table>
                    </div>
                </div>
            </div>
    
        <!-- Import Categories -->
        <div class="modal fade" id="importPosts" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title btn btn-success" id="staticBackdropLabel"><i class="bi bi-file-earmark-spreadsheet-fill"></i> {{ __("Import Category Excel") }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('importPosts') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row m-2">  
                                <input type="file" name="file" class="form-control" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-box-arrow-in-left"></i> Close</button>
                        <button class="btn btn-success"><i class="bi bi-check-circle-fill"></i> Submit</button>
                    </div>
                </form>
            </div>
        </div>
     </div> 
            
        <!-- Create Post -->
        <div class="modal fade" id="createPost" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title btn btn-primary" id="staticBackdropLabel">
                            <i class="bi bi-folder-plus fa-1x"></i>
                            Create Post
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/posts/store" method="post">
                        @csrf
                            <div class="form-group m-3 ">
                                <label for="id_category" class="fw-bold selectpicker"><i class="bi bi-bookmarks-fill"></i> Category</label><br>
                                <select class="form-control selectpicker m-3" data-style="btn-success" name="id_category" id="id_category">
                                    @forelse($categori as $id => $categories)
                                        <option value="{{ $id}}">{{ $categories}}</option>
                                        @empty
                                            <option value="">No Category</option>
                                        @endempty
                                </select>
                            </div>
                        <div class="m-3">
                            <label for="soal_ujian" class="pb-2 fw-bold"><i class="bi bi-book-fill "></i> Create Soal Ujian</label>
                            <textarea name="soal_ujian" id="soal_ujian" cols="30" rows="10" class="form-control" required>{{ old('soal_ujian') }}</textarea>
                        </div>
                        <div class="m-3">
                            <label for="pilihan_a" class="pb-2 fw-bold"><i class="bi bi-arrow-right-square-fill"></i> {{ __('Pilihan A') }}</label>
                            <input type="text" class="form-control" placeholder="Pilihan_a" name="pilihan_a" value="{{ old('pilihan_a') }}" required> 
                        </div>    
                        <div class="m-3">
                            <label for="pilihan_b" class="pb-2 fw-bold"><i class="bi bi-arrow-right-square-fill"></i> {{ __('Pilihan B') }}</label>
                            <input type="text" class="form-control" placeholder="Pilihan_b" name="pilihan_b" value="{{ old('pilihan_b') }}" required>
                        </div>
                        <div class="m-3">
                            <label for="pilihan_c" class="pb-2 fw-bold"><i class="bi bi-arrow-right-square-fill"></i> {{ __('Pilihan C') }}</label>
                            <input type="text" class="form-control" placeholder="Pilihan_c" name="pilihan_c" value="{{ old('pilihan_C') }}" required>
                        </div> 
                        <div class="m-3">
                            <label for="pilihan_d" class="pb-2 fw-bold"><i class="bi bi-arrow-right-square-fill"></i> {{ __('Pilihan D') }}</label>
                            <input type="text" class="form-control" placeholder="Pilihan_d" name="pilihan_d" value="{{ old('pilihan_d') }}" required>
                        </div> 
                        <div class="m-3">
                            <label for="jawaban" class="mb-2 btn btn-success fw-bold"><i class="bi bi-bookmark-check-fill"></i> {{ __('Jawaban Benar') }}</label>
                            <input type="text" class="form-control" placeholder="Jawaban" name="jawaban" value="{{ old('jawaban') }}" required>
                        </div> 
                    </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" >SIMPAN</button>
                            <button type="reset" class="btn btn-warning">RESET</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div>


@endsection
