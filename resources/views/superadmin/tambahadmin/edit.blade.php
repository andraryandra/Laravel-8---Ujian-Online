@extends('layouts.appAdmin')
@section('title', 'Edit Admin')
@section('admin')


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between ">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">{{ __("Dashboard") }}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ __("Admin Sekolah") }}</li>
            </ol>
          </nav>
    </div>

    <!-- Content Row -->
    <div class="row">
       <!-- Earnings (Monthly) Card Example -->
       <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Jumlah Data Admin Sekolah">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            {{ __("Admin Sekolah") }}
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $adminCount ?? '' }}</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-success" role="progressbar"
                                        style="width: {{ $adminCount ?? '' }}%" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-person-fill fa-2x text-gray-300"></i>
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
            <p class="">Fitur pada bagian Post ini berfungsi untuk mengedit Soal Ujian yang dimana sesuai dengan mata Ujian SMP / SMA / SMK.</p>
        </div>
        <div class="card-body">
            <form action="/admin/update" method="post">
                @csrf
                <div class="m-3" hidden>
                    <label for="id" class="pb-2 fw-bold">ID</label>
                    <input type="text" class="form-control" placeholder="id" name="id" value="{{ $admin->id }}" required >
                </div>

                <div class="m-3" hidden>
                    <label for="role" class="pb-2 fw-bold">Role</label>
                    <input type="text" class="form-control" placeholder="role" name="role" value="{{ $admin->role }}" required >
                </div>

                <div class="m-3">
                    <label for="name" class="pb-2 fw-bold mb-2 fs-5"><i class="bi bi-person"></i> {{ __('Name Asli') }}</label>
                    <input type="text" class="form-control text-capitalize" placeholder="Name" name="name" value="{{ $admin->name  }}" required>
                </div>
                <div class="form-group m-3" >
                    <label for="sekolah_asal" class="pb-2 fw-bold fs-5"><i class="bi bi-building"></i> Sekolah</label>
                    <select class="form-control" name="sekolah_asal" id="sekolah_asal" required>
                        <option value="" readonly >Pilih Sekolah...</option>
                        @forelse ($sekolahs as $id => $sekolah)
                            <option value="{{ $id }}" {{ $admin->sekolah_asal == $id ? 'selected' : '' }}>{{ $sekolah }}</option>
                        @empty
                            <option value="">Tidak ada data</option>
                        @endforelse
                    </select>
                </div>
                <hr class="m-3">
                <h4 class="fw-bold m-3">Account Login Guru</h4>
                <hr class="m-3">

                <div class="m-3">
                    <label for="username" class="pb-2 fw-bold fs-5"><i class="bi bi-person-check"></i> {{ __('Username Account') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Username Account" name="username" value="{{ $admin->username  }}">
                </div>
                <div class="m-3">
                    <label for="password" class="pb-2 fw-bold fs-5"><i class="bi bi-key"></i> {{ __('Password') }} <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" placeholder="Password" name="password" />
                    <p class="form-text fst-italic text-danger">--- Kosongkan jika tidak ingin mengubah password.</p>
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
