@extends('layouts.appAdmin')
@section('title', 'Profile')
@section('profile')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between ">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">{{ __("Dashboard") }}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ __("Profile") }}</li>
            </ol>
          </nav>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="" width="100%">
            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Profile</button>
                        </li>
                        <li class="nav-item {{ Request::is('profile') ? "active" : "" }}" role="presentation">
                          <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Edit Profile</button>
                        </li>
                        <li class="nav-item {{ Request::is('profile') ? "active" : "" }}" role="presentation">
                          <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Information</button>
                        </li>
                      </ul>
                </div>
                  
                <div class="card-body ">
                        <div class="tab-content" id="pills-tabContent">
                          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            
                            <div class="container">
                              <div class="row d-flex justify-content-start align-items-start h-100">
                                {{-- <div class="col col-lg-6 mb-4 mb-lg-0"> --}}
                                  <div class="card mb-3" style="border-radius: .5rem; shadow">
                                    <div class="row g-0">
                                      <div class="col-md-4 gradient-custom text-center text-white shadow"
                                        style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                        <img src="img/undraw_profile.svg"
                                          alt="Avatar" class="img-fluid my-5 rounded-circle shadow-sm" style="width: 100%;" />
                                        <h2 class="text-capitalize fw-bold">{{ Auth::user()->name }}</h2>
                                        <h2 class="fw-bold">{{ Auth::user()->kelas->name_kelas ?? "" }}</h2>
                                        <h5 class="@if(Auth::user()->role == 'admin') badge badge-danger @elseif(Auth::user()->role == 'siswa') badge badge-primary @elseif(Auth::user()->role == 'guru') badge badge-warning @endif
                                         py-2 fs-5  mb-3 text-uppercase">- {{ Auth::user()->role ?? "" }} -</h5>
                                        {{-- <i class="far fa-edit mb-5"></i> --}}
                                      </div>
                                      <div class="col-md-8">
                                        <div class="card-body p-4">
                                          <h6 class="fw-bold text-primary"><i class="bi bi-info-circle-fill"></i> Profile</h6>
                                          <hr class="mt-0 mb-4">
                                          <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                              <h6 class="fw-bold">Nama </h6>
                                              <p class="text-muted text-capitalize">{{ Auth::user()->name ?? "" }}</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                              <h6 class="fw-bold">Kelas </h6>
                                              <p class="text-muted text-uppercase">{{ Auth::user()->kelas->name_kelas ?? "" }}</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                              <h6 class="fw-bold">NIK </h6>
                                              <p class="text-muted">10000000001</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                              <h6 class="fw-bold">NISN </h6>
                                              <p class="text-muted">10000000111</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                              <h6 class="fw-bold">Jenis Kelamin </h6>
                                              <p class="text-muted text-capitalize">Laki - laki</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                              <h6 class="fw-bold">Tempat, Tanggal Lahir </h6>
                                              <p class="text-muted text-capitalize">Indramayu, 21 Juni 2002</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                              <h6 class="fw-bold">Sekolah </h6>
                                              <p class="text-muted text-uppercase">SMP NEGERI 1 Karangampel</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                              <h6 class="fw-bold">Agama </h6>
                                              <p class="text-muted text-capitalize">Islam</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                              <h6 class="fw-bold">Alamat </h6>
                                              <p class="text-muted text-capitalize">Indramayu, Des. Karangampel G.6 Utara</p>
                                            </div>
                                          </div>
                                          <h6>Projects</h6>
                                          <hr class="mt-0 mb-4">
                                          <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                              <h6>Recent</h6>
                                              <p class="text-muted">Lorem ipsum</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                              <h6>Most Viewed</h6>
                                              <p class="text-muted">Dolor sit amet</p>
                                            </div>
                                          </div>
                                          <div class="d-flex justify-content-start">
                                            <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                            <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                            <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                {{-- </div> --}}
                              </div>
                            </div>

                          </div>
                          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, itaque.
                          </div>
                          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis incidunt temporibus, in corporis similique omnis!
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('styles')
<style>
    .gradient-custom {
/* fallback for old browsers */
background: #657bf6;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right bottom, rgb(0, 144, 240), rgb(133, 239, 253));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right bottom, rgb(101, 193, 246), rgb(133, 229, 253))
}
</style>
@endsection