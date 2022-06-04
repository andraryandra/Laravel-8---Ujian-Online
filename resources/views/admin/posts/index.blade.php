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
                                    <th class="text-center">
                                        <input type="checkbox" class="p-5" id="master" />
                                    </th>
                                    <th class="">No</th>
                                    <th class="" width="20%">Category</th>
                                    <th class="" width="50%">Soal Ujian</th>
                                    <th class="text-center">Jawaban Benar</th>
                                    {{-- <th class="text-center">Sekolah</th> --}}
                                    <th class="text-center w-25">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp

                                @foreach ($posts as $post)
                                <tr id="tr_{{ $post->id }}">
                                     <td class="text-center">
                                        <input type="checkbox" class="sub_chk" data-id="{{$post->id }}">
                                    </td>
                                    <td class="text-start fw-bold">{{ $no++ }}</td>
                                    {{-- <td class="@if($post->category == false ?? 'Database Not Found!' ) text-white bg-danger text-center fw-bold @endif">{{ $post->category->name_category ?? "Silahkan klik edit dan sesuaikan data Category"}}</td> --}}
                                    @if($post->category == false ?? 'Database Not Found!' )
                                        <td class="text-white bg-danger text-center fw-bold">
                                            <a href="/posts-edit-{{ $post->id }}" class="btn btn-warning text-white p-2 shadow-sm m-2 edit-confirm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"> <i class="bi bi-pencil-square"></i> Silahkan klik edit dan sesuaikan data Category</a>
                                        </td>
                                    @else
                                    <td class="">{{ $post->category->name_category ?? "Silahkan klik edit dan sesuaikan data Category"}}</td>
                                    @endif
                                    <td class="">{!! $post->soal_ujian ?? ""!!}</td>
                                    <td class="text-white text-center fw-bold fs-5 bg-success">{{ $post->jawaban ?? ""}}</td>
                                    {{-- <td>{{ $post->sekolah->name_sekolah }}</td> --}}
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

    </div>

{{-- Import Posts Ujian --}}
    @include('admin.posts.importposts')

    {{-- Create Post Ujian --}}
    @include('admin.posts.create')

@endsection
