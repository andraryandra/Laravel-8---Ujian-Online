@extends('layouts.appAdmin')
@section('title', 'Edit Siswa')
@section('siswaAdmin')


<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between ">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">{{ __("Dashboard") }}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ __("Siswa") }}</li>
            </ol>
          </nav>
    </div>

    <div class="mb-3">
        <a href="/siswa" class="btn btn-success py-3"> <i class="bi bi-box-arrow-left"></i> Kembali</a>
    </div>



        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="font-weight-bold text-primary">DataTable </h6>
                <p class="">Fitur pada bagian Post ini berfungsi untuk menambahkan Soal Ujian yang dimana sesuai dengan mata Ujian SMP / SMA / SMK.</p>
            </div>

        @if($siswaAdmin->kelas == false ?? 'Database Not Found!' )
        <div class="alert alert-warning d-flex align-items-center m-3" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </svg>
            <div>
              Terdeteksi jika data Kelas tidak ada, silahkan untuk menghubungi pihak Admin !!
            </div>
          </div>
            {{-- <a href="{{ url('/categories') }}" class="btn btn-danger  m-1 p-3 shadow"><i class="bi bi-folder-plus fa-1x"></i> Klik Edit Now!</a> --}}
        @endif

            <div class="card-body">
                <form action="/siswa/update" method="post">
                    @csrf
                <div class="m-3" hidden>
                    <label for="id" class="pb-2 fw-bold">ID</label>
                    <input type="text" class="form-control" placeholder="id" name="id" value="{{ $siswaAdmin->id }}" required>
                </div>
                    <div class="form-group m-3">

                        <label for="id_kelas" class="pb-2 fw-bold  fs-5"><i class="bi bi-shop-window"></i> Kelas</label>
                        <select class="form-select form-select-lg mb-3 m" name="id_kelas" id="id_kelas">
                            <option disabled value="">Pilih Kelas ...</option>
                            @foreach($kelas as $id => $kelases)
                                <option class="
                                @if($kelases >= '7-A' && $kelases <= '7-Z') bg-info text-white
                                @elseif($kelases >= '8-A' && $kelases <= '8-Z') bg-warning
                                @elseif($kelases >= '9-A' && $kelases <= '9-Z') bg-success text-white  @endif"
                                value="{{ $id }}" {{ $siswaAdmin->id_kelas == $id ? 'selected' : '' }}>{{ $kelases }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="m-3">
                        <label for="name" class="pb-2 fw-bold mb-2 fs-5"><i class="bi bi-person"></i> {{ __('Name Asli') }}</label>
                        <input type="text" class="form-control" placeholder="Name" name="name" value="{{ $siswaAdmin->name ?? "" }}" required>
                    </div>
                    <div class="m-3">
                        <label for="no_induk" class="pb-2 fw-bold mb-2 fs-5"><i class="bi bi-card-text"></i> {{ __('NIK') }}</label>
                        <input type="text" class="form-control" placeholder="NIK" name="no_induk" value="{{ $siswaAdmin->no_induk ?? "" }}" required>
                    </div>
                    <div class="m-3">
                        <label for="nisn" class="pb-2 fw-bold mb-2 fs-5"><i class="bi bi-card-text"></i> {{ __('NISN') }}</label>
                        <input type="text" class="form-control" placeholder="NISN" name="nisn" value="{{ $siswaAdmin->nisn ?? "" }}" required>
                    </div>
                    <div class="form-group m-3">
                        <label for="jk" class="pb-2 fw-bold mb-2 fs-5"><i class="bi bi-gender-ambiguous"></i> {{ __('Jenis Kelamin') }}</label>
                        <select class="form-select form-select-lg mb-3" name="jk" id="jk" required>
                           @if ($siswaAdmin->jk == 'L')
                            <option  value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                            @else
                            <option value="P">Perempuan</option>
                            <option value="L">Laki-Laki</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group m-3" >
                        <label for="sekolah_asal" class="pb-2 fw-bold fs-5"><i class="bi bi-building"></i> Sekolah</label>
                        <select class="form-select form-select-lg py-2" name="sekolah_asal" id="sekolah_asal">
                                <option value="{{ Auth::user()->sekolah->id }}" selected>{{ Auth::user()->sekolah->name_sekolah }}</option>
                        </select>
                    </div>
                    <hr class="m-3">
                    <h4 class="fw-bold m-3">Account Login Siswa</h4>
                    <hr class="m-3">

                    <div class="m-3">
                        <label for="username" class="pb-2 fw-bold fs-5"><i class="bi bi-person-check"></i> {{ __('Username Account') }} <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Username Account" name="username" value="{{ $siswaAdmin->username ?? "" }}">
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
