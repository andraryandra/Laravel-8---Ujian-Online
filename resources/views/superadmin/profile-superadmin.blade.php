{{-- <div class="row pt-1"> --}}
    <div class="col-6 mb-3">
      <h6 class="fw-bold">Nama </h6>
      <p class="text-muted text-capitalize">{{ Auth::user()->name ?? "Database not found!" }}</p>
    </div>
    <div class="col-6 mb-3">
      <h6 class="fw-bold">NIK </h6>
      <p class="text-muted">{{ Auth::user()->no_induk ?? "Database not found!" }}</p>
    </div>
    <div class="col-6 mb-3">
      <h6 class="fw-bold">NISN </h6>
      <p class="text-muted">{{ Auth::user()->nisn ?? "Database not found!" }}</p>
    </div>
    <div class="col-6 mb-3">
      <h6 class="fw-bold">Jenis Kelamin </h6>
      @if(Auth::user()->jk == "L")
      <p class="text-muted text-capitalize">Laki - laki</p>
      @elseif(Auth::user()->jk == "P")
      <p class="text-muted text-capitalize">Perempuan</p>
      @else
      <p class="text-muted text-capitalize">{{ Auth::User()->jk ?? "Database not found!" }}</p>
      @endif
    </div>
    <div class="col-6 mb-3">
      <h6 class="fw-bold">Sekolah </h6>
      <p class="text-muted text-uppercase">{{ Auth::User()->sekolah_asal ?? "Database not found!" }}</p>
    </div>
  {{-- </div> --}}
