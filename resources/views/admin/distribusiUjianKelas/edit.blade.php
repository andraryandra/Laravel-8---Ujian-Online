@extends('layouts.appAdmin')
@section('title', 'Edit Distribusi Ujian Kelas')
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

    <div class="mb-3">
        <a href="{{ url('/distribusiUjianKelas') }}" class="btn btn-success py-3"> <i class="bi bi-box-arrow-left"></i> Kembali</a>
    </div>



        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="font-weight-bold text-primary">DataTable </h6>
                 <p class="">Fitur pada bagian Category ini berfungsi untuk menambahkan Kategori Ujian yang dimana sesuai dengan mata Ujian SMP / SMA / SMK.</p>
            </div>

             <div class="card-body">
                <form action="/distribusiUjianKelas/update" method="post">
                    @csrf
                        <div class="m-3" hidden>
                            <label for="id" class="pb-2 fw-bold" >{{ __('ID Distribusi Ujian') }}</label>
                            <input type="hidden" class="form-control" placeholder="id" name="id" value="{{ $DisujianKelas->id ?? "" }}" required>
                        </div>
                        <div class="form-group m-3" hidden>
                            <label for="id_sekolah_asal" class="pb-2 fw-bold fs-5"><i class="bi bi-building"></i> Sekolah</label>
                            <select class="form-select form-select-lg py-2" name="id_sekolah_asal" id="id_sekolah_asal">
                                <option value="{{ $DisujianKelas->id_sekolah_asal ?? ""}}">{{ $DisujianKelas->sekolah->name_sekolah ?? ""}}</option>
                            </select>
                        </div>

                        <div class="form-group m-3">
                            <label for="id_kelas" class="pb-2 fw-bold fs-5"><i class="bi bi-shop-window"></i> {{ __("Kelas") }}</label>
                            <select class="form-select py-2" name="id_kelas" id="id_kelas">
                                <option value="">Pilih Kelas</option>
                                @if ($DisujianKelas->id_kelas == '7')
                                    <option value="7" selected>7</option>
                                @else
                                    <option value="7">7</option>
                                @endif
                                @if ($DisujianKelas->id_kelas == '8')
                                    <option value="8" selected>8</option>
                                @else
                                    <option value="8">8</option>
                                @endif
                                @if ($DisujianKelas->id_kelas == '9')
                                    <option value="9" selected>9</option>
                                @else
                                    <option value="9">9</option>
                                @endif
                            </select>
                        </div>

                        <div class="form-group m-3">
                            <label for="id_category" class="pb-2 fw-bold fs-5"><i class="bi bi-shop-window"></i> {{ __("Category Pelajaran") }}</label>
                            <select class="form-select py-2" name="id_category" id="id_category">
                                <option value="">Pilih Category</option>
                                @foreach ($categori as $id => $categories)
                                    @if ($DisujianKelas->id_category == $id)
                                        <option value="{{ $id }}" selected>{{ $categories }}</option>
                                    @else
                                        <option value="{{ $id }}">{{ $categories }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group m-3">
                            <label for="id_category_ujian" class="pb-2 fw-bold fs-5"><i class="bi bi-shop-window"></i> {{ __("Category Ujian") }}</label>
                            <select class="form-select py-2" name="id_category_ujian" id="id_category_ujian">
                                <option value="">Pilih Category</option>
                                @foreach ($categoryUjians as $id => $categoryUjian)
                                    @if ($DisujianKelas->id_category_ujian == $id)
                                        <option value="{{ $id }}" selected>{{ $categoryUjian }}</option>
                                    @else
                                        <option value="{{ $id }}">{{ $categoryUjian }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group m-3">
                            <label for="status" class="pb-2 fw-bold fs-5"><i class="bi bi-shop-window"></i> {{ __("Status") }}</label>
                            <select class="form-select py-2" name="status" id="status">
                                <option value="">Pilih Status</option>
                                @if ($DisujianKelas->status == '1')
                                    <option value="1" selected>Aktif</option>
                                @else
                                    <option value="1">Aktif</option>
                                @endif
                                @if ($DisujianKelas->status == '0')
                                    <option value="0" selected>Tidak Aktif</option>
                                @else
                                    <option value="0">Tidak Aktif</option>
                                @endif
                            </select>
                        </div>

                        <div class="m-3">
                            <button type="submit" class="btn btn-primary fs-5 shadow mb-5"><i class="bi bi-check-circle"></i> SIMPAN</button><hr>
                            <button type="reset" class="btn btn-warning fs-5 fst-italic fw-bold shadow" style="float: right;"><i class="bi bi-info-circle-fill"></i> Kembalikan Data Awal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


@endsection
