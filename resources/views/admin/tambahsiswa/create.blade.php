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
                    <label for="name" class="pb-2 fw-bold fs-5"><i class="bi bi-person"></i> {{ __('Nama Asli') }}</label>
                    <input type="text" class="form-control" placeholder="Nama Asli" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="form-group m-3">
                    <label for="id_kelas" class="pb-2 fw-bold fs-5"><i class="bi bi-shop-window"></i> Kelas</label>
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
                    <label for="no_induk" class="pb-2 fw-bold fs-5"><i class="bi bi-card-text"></i> {{ __('NIK') }}</label>
                    <input type="text" class="form-control" placeholder="Nomer Induk Siswa" name="no_induk" value="{{ old('no_induk') }}" required>
                </div>
                <div class="m-3">
                    <label for="nisn" class="pb-2 fw-bold fs-5"><i class="bi bi-card-text"></i> {{ __('NISN') }}</label>
                    <input type="text" class="form-control" placeholder="NISN" name="nisn" value="{{ old('nisn') }}" required>
                </div>
                <div class="form-group m-3">
                    <label for="jk" class="pb-2 fs-5"><i class="bi bi-gender-ambiguous"></i> Jenis Kelamin</label>
                    <select class="form-select py-2" name="jk" id="jk">
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="form-group m-3" >
                    <label for="sekolah_asal" class="pb-2  fs-5"><i class="bi bi-building"></i> Sekolah</label>
                    <select class="form-select form-select-lg  py-2" name="sekolah_asal" id="sekolah_asal">
                        {{-- <option class="" value="">Pilih Sekolah...</option> --}}
                        @if(Auth::user()->role == 'admin' && Auth::user()->sekolah->name_sekolah)
                            <option class="fw-bold" value="{{ Auth::user()->sekolah->id }}">{{ Auth::user()->sekolah->name_sekolah }}</option>
                        @endif
                    </select>
                </div>
                <hr>
                <h4 class="fw-bold ml-3">Account Login Siswa</h4>
                <p class="form-text m-3 text-danger text-capitalize fst-italic">* Wajib diisi untuk account login siswa !</p>
                <hr>

                <div class="m-3">
                    <label for="username" class="pb-2 fw-bold fs-5"><i class="bi bi-person-check"></i> {{ __('Username') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Username" name="username" value="{{ old('username') }}" required>
                </div>
                <div class="m-3">
                    <label for="password" class="pb-2 fw-bold fs-5"><i class="bi bi-key"></i> {{ __('Password') }} <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" placeholder="Password" name="password" value="{{ old('password') }}" required>
                </div>

        </div>
        <div class="modal-footer float-start">
            <button type="submit" class="btn btn-primary fs-5 shadow"><i class="bi bi-check-circle"></i> SIMPAN</button>
            <button type="reset" class="btn btn-warning fs-5 fst-italic fw-bold shadow"><i class="bi bi-info-circle-fill"></i> Reset</button>
        </div>
        </form>
    </div>
    </div>
</div>
