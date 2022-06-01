@extends('layouts.appAdmin')
@section('title', 'Edit Kelas')
@section('kelas')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between ">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/home') }}">{{ __("Dashboard") }}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ __("Kelas") }}</li>
            </ol>
          </nav>
    </div>
    <div class="mb-3">
        <a href="{{ url('/kelas') }}" class="btn btn-success py-3"> <i class="bi bi-box-arrow-left"></i> Kembali</a>
    </div>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="font-weight-bold text-primary">DataTable </h6>
                <p class="">Fitur pada bagian Users - Kelas ini berfungsi untuk mengedit Kelas Ujian yang dimana sesuai dengan kelasnya masing-masing Ujian SMP / SMA / SMK.</p>
            </div>

             <div class="card-body">
                <form action="/kelas/update" method="post">
                    @csrf
                        <div class="m-3">
                            <label for="id" class="pb-2 fw-bold" hidden >{{ __('ID Kelas') }}</label>
                            <input type="hidden" class="form-control" placeholder="id" name="id" value="{{ $kelas->id }}" required>
                        </div>

                        @if($kelas->id_wali == null)
                        <div class="form-group m-3 ">
                            <label for="id_wali" class="fw-bold "><i class="bi bi-bookmarks-fill"></i> Wali Kelas</label><br>
                            <select class="form-select form-select-lg text-capitalize" data-style="btn-success" name="id_wali" id="id_wali">
                                <option disabled value="">Pilih Wali Kelas</option>
                                @foreach($guruAdmin as $id => $guruAdmins)
                                <option value="{{ $id }}" {{ $id == $kelas->id_wali ? 'selected' : '' }}>{{ $guruAdmins }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="m-3">
                            <label for="id_wali" class="pb-2 fw-bold alert alert-danger">{{ __('Wali Kelas - Isi Data Sekarang !!') }}</label>
                            <input type="text" class="form-control alert alert-danger" placeholder="Wali Kelas" name="id_wali" value="{{ $kelas->id_wali }}" required>
                        </div> --}}
                        @else
                        <div class="form-group m-3 ">
                            <label for="id_wali" class="fw-bold "><i class="bi bi-bookmarks-fill"></i> Wali Kelas</label><br>
                            <select class="form-select form-select-lg text-capitalize" data-style="btn-success" name="id_wali" id="id_wali">
                                <option disabled value="">Pilih Wali Kelas</option>
                                @foreach($guruAdmin as $id => $guruAdmins)
                                <option value="{{ $id }}" {{ $id == $kelas->id_wali ? 'selected' : '' }}>{{ $guruAdmins }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        <div class="form-group m-3" hidden>
                            <label for="id_sekolah_asal" class="pb-2 fw-bold fs-5"><i class="bi bi-building"></i> Sekolah</label>
                            <select class="form-select form-select-lg py-2" name="id_sekolah_asal" id="id_sekolah_asal">
                                <option value="{{ $kelas->id_sekolah_asal ?? ""}}">{{ $kelas->sekolah->name_sekolah ?? ""}}</option>
                            </select>
                        </div>

                        <div class="m-3">
                            <label for="name_kelas" class="pb-2 fw-bold">{{ __('Name Kelas') }}</label>
                            <input type="text" class="form-control" placeholder="Name Kelas" name="name_kelas" value="{{ $kelas->name_kelas }}">
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
