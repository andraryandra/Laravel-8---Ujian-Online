@extends('layouts.appAdmin')
@section('title', 'Edit Post')

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
                <p class="">Fitur pada bagian Post ini berfungsi untuk menambahkan Soal Ujian yang dimana sesuai dengan mata Ujian SMP / SMA / SMK.</p>
            </div>

            {{-- <div class="m-3">
            @if($post->category == false ?? 'Database Not Found!' )
            <div class="alert alert-warning d-flex align-items-center m-3" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                  </svg>
                <div>
                  Terdeteksi jika data category tidak ada, silahkan untuk menghubungi pihak Admin !!
                </div>
              </div>
            @endif
            </div> --}}

            <div class="card-body">
                <form action="/post-essay/update" method="post">
                    @csrf
                <div class="m-3" hidden>
                    <label for="id" class="pb-2 fw-bold">ID</label>
                    <input type="text" class="form-control" placeholder="id" name="id" value="{{ $postsEssay->id }}" required>
                </div>
                <div class="form-group m-3" hidden>
                    <label for="id_sekolah_asal" class="pb-2 fw-bold fs-5"><i class="bi bi-building"></i> Sekolah</label>
                    <select class="form-select form-select-lg py-2" name="id_sekolah_asal" id="id_sekolah_asal">
                        <option value="{{ $postsEssay->id_sekolah_asal ?? ""}}">{{ $postsEssay->sekolah->name_sekolah ?? ""}}</option>
                    </select>
                </div>
                    <div class="form-group m-3">
                        <label for="id_category" class="pb-2 fw-bold mb-2 btn btn-info text-white"><i class="bi bi-bookmarks-fill"></i> {{ __('Category') }}</label>
                        <select class="form-select" name="id_category" id="id_category">
                            <option disabled="readonly">Pilih Category ...</option>
                            @foreach ($categori as $id => $categories)
                                                          {{-- Jika $id (Category) == $id (POST Category) maka 'Pilih' jika tidak Kosongkan --}}
                                <option value="{{ $id }}" {{ $id == $postsEssay->id_category ? 'selected' : '' }}>{{ $categories }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group m-3">
                        <label for="soal_ujian_essay" class="pb-2 fw-bold mb-2 btn btn-info text-white"><i class="bi bi-bookmark-check"></i> {{ __('soal_ujian_essay') }}</label>
                        <textarea name="soal_ujian_essay" id="my-editor" cols="5" rows="5" placeholder="Isi Text Soal Ujian..." class="form-control" required >{{ $postsEssay->soal_ujian_essay }}</textarea>
                    </div>

                    <div class="m-3">
                        <label for="jawaban_essay" class="fw-bold badge bg-success p-2" style="font-size: 16px;"><i class="bi bi-journal-check"></i> Jawaban Benar Guru</label>
                        <textarea name="jawaban_essay" id="jawaban_essay" cols="5" rows="5" placeholder="Isi Jawaban Guru..." class="form-control" required >{{ $postsEssay->jawaban_essay }}</textarea>
                    </div>

                    <div class="m-3 mt-4">
                        <button type="submit" class="btn btn-primary fs-5 shadow mb-5"><i class="bi bi-check-circle"></i> SIMPAN</button><hr>
                        <button type="reset" class="btn btn-warning fs-5 shadow fst-italic fw-bold" style="float: right;"><i class="bi bi-info-circle-fill"></i> Kembalikan Data Awal</button>
                    </div>
                </form>
            </div>
         </div>
    </div>

@endsection


