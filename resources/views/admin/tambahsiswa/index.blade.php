@extends('layouts.appAdmin')
@section('title', 'Siswa')
@section('siswaAdmin')

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

    <!-- Content Row -->
    <div class="row">
       <!-- Earnings (Monthly) Card Example -->
       <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Jumlah Data Siswa">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            {{ __("Siswa") }}
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $siswaAdminCount }}</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-success" role="progressbar"
                                        style="width: {{ $siswaAdminCount }}%" aria-valuenow="50" aria-valuemin="0"
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
                <p class="">Fitur pada bagian Tambah Siswa ini berfungsi untuk menambahkan Siswa yang dimana sesuai dengan Data Sekolah SMP / SMA / SMK.</p>
            </div>
            <div class="m-3">
                <button type="button" class="btn btn-primary  m-1 p-3 shadow" data-bs-toggle="modal" data-bs-target="#createSiswa">
                <i class="bi bi-folder-plus fa-1x"></i> 
                    Create Siswa
                </button>

                <button type="button" class="btn btn-success  m-1 p-3 shadow" data-bs-toggle="modal" data-bs-target="#importSiswa">
                    <i class="bi bi-file-earmark-spreadsheet-fill"></i>  
                    Import Excel
                </button>

                <button class="btn btn-danger  m-1 p-3 shadow delete_all" data-url="{{ url('/siswaDeleteAll') }}">
                    <i class="bi bi-trash-fill"></i> 
                    Delete All Selected
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive ">
                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="5%" class="text-center">
                                    <input type="checkbox" class="p-5" id="master" /> 
                                </th>
                                <th width="">No</th>
                                <th width="">Status</th>
                                <th width="">Nama</th>
                                <th width="">Kelas</th>
                                <th width="">Gender</th>
                                <th width="">Sekolah</th>
                                <th class="text-center" width="">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                        @endphp
                        @foreach ($siswaAdmins as $sd)
                        <tr id="tr_{{ $sd->id }}">
                            <td class="text-center">
                                <input type="checkbox" class="sub_chk" data-id="{{$sd->id}}">
                            </td>
                            <td class="fw-bold">{{ $no++ }}</td>
                            <td class="fw-bold bg-primary text-white">{{ $sd->role }}</td>
                            <td class="text-capitalize">{{ $sd->name }}</td>
                            <td>{{ $sd->kelas->name_kelas }}</td>
                            <td>{{ $sd->jk }}</td>
                            <td>{{ $sd->sekolah_asal }}</td>
                            <td class="text-center">
                                <a href="/siswa-show-{{ $sd->id }}" class="btn btn-info text-white p-2 shadow-sm m-2 show-confirm" data-bs-toggle="tooltip" data-bs-placement="top" title="Show"> <i class="bi bi-eye-fill"></i></a>
                                <a href="/siswa-edit-{{ $sd->id }}" class="btn btn-warning text-white p-2 shadow-sm m-2 edit-confirm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"> <i class="bi bi-pencil-square"></i></a>
                                <a href="/siswa/delete/{{ $sd->id }}" class="btn btn-danger text-white p-2 shadow-sm m-2 delete-confirm" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"> <i class="bi bi-trash-fill"></i></a>   
                                </td> 
                            </tr> 
                            @endforeach                      
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    


    <!-- Import Category -->
    <div class="modal fade" id="importSiswa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title btn btn-success" id="staticBackdropLabel"><i class="bi bi-file-earmark-spreadsheet-fill"></i> Import Siswa Excel</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('importSiswa') }}" method="POST" enctype="multipart/form-data">
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
    
    <!-- Create Siswa -->
    <div class="modal fade" id="createSiswa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title btn btn-primary" id="staticBackdropLabel">
                    <i class="bi bi-folder-plus fa-1x"></i>
                   Create Siswa
                  </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/siswa/store" method="post">
                    @csrf
                    <div class="form-group m-3" hidden>
                        <label for="role" class="pb-2 fw-bold"><i class="bi bi-bookmarks-fill"></i> Role</label>
                        <select class="form-control py-2" name="role" id="role">
                            <option class="fw-bold" value="siswa">Siswa</option>
                        </select>
                    </div>
                    <div class="m-3">
                        <label for="name" class="pb-2 fw-bold"><i class="bi bi-person-fill"></i> {{ __('Nama Asli') }}</label>
                        <input type="text" class="form-control" placeholder="Nama Asli" name="name" value="{{ old('name') }}" required>
                    </div>

                    <div class="m-3">
                        <label for="username" class="pb-2 fw-bold"><i class="bi bi-bookmarks-fill"></i> {{ __('Username Account') }}</label>
                        <input type="text" class="form-control" placeholder="Username Account" name="username" value="{{ old('username') }}" required>
                    </div>
                    <div class="m-3">
                        <label for="password" class="pb-2 fw-bold"><i class="bi bi-bookmarks-fill"></i> {{ __('Password') }}</label>
                        <input type="password" class="form-control" placeholder="Password" name="password" value="{{ old('password') }}" required>
                    </div>
                    <div class="form-group m-3">
                        <label for="id_kelas" class="pb-2 fw-bold"><i class="bi bi-bookmarks-fill"></i> Kelas</label>
                        <select class="form-select py-2" name="id_kelas" id="id_kelas">
                            @forelse($kelas as $id => $kelases)
                                <option class=" 
                                @if($kelases >= '7-A' && $kelases <= '7-Z') bg-info text-white fw-bold 
                                @elseif($kelases >= '8-A' && $kelases <= '8-Z') bg-warning fw-bold
                                @elseif($kelases >= '9-A' && $kelases <= '9-Z') bg-success text-white fw-bold @endif" 
                                value="{{ $id }}">{{ $kelases }}</option>
                                @empty
                                    <option value="">No Data Kelas</option>
                                @endforelse
                        </select>
                    </div>
                    <div class="m-3">
                        <label for="no_induk" class="pb-2 fw-bold"><i class="bi bi-bookmarks-fill"></i> {{ __('NIK') }}</label>
                        <input type="text" class="form-control" placeholder="Nomer Induk Siswa" name="no_induk" value="{{ old('no_induk') }}" required>
                    </div>
                    <div class="m-3">
                        <label for="nisn" class="pb-2 fw-bold"><i class="bi bi-bookmarks-fill"></i> {{ __('NISN') }}</label>
                        <input type="text" class="form-control" placeholder="NISN" name="nisn" value="{{ old('nisn') }}" required>
                    </div>
                    <div class="form-group m-3">
                        <label for="jk" class="pb-2 fw-bold"><i class="bi bi-bookmarks-fill"></i> Jenis Kelamin</label>
                        <select class="form-select py-2" name="jk" id="jk">
                            <option class="fw-bold" value="L">Laki-Laki</option>
                            <option class="fw-bold" value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group m-3" >
                        <label for="sekolah_asal" class="pb-2 fw-bold"><i class="bi bi-bookmarks-fill"></i> Sekolah</label>
                        <select class="form-control py-2" name="sekolah_asal" id="sekolah_asal">
                            <option class="fw-bold" value="SMP NEGERI 1 LOHBENER">SMP NEGERI 1 LOHBENER</option>
                        </select>
                    </div>
                    
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">SIMPAN</button>
                <button type="reset" class="btn btn-warning">RESET</button>
            </div>
            </form>
        </div>
        </div>
    </div>


@endsection
