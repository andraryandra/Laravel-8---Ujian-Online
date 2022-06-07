<!-- Create Guru -->
<div class="modal fade" id="createGuru" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title btn btn-primary" id="staticBackdropLabel">
                <i class="bi bi-folder-plus fa-1x"></i>
               Create Guru
              </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/guru/store" method="post">
                @csrf
                <div class="form-group m-3" hidden>
                    <label for="role" class="pb-2 fw-bold"><i class="bi bi-bookmarks-fill"></i> Role</label>
                    <select class="form-control py-2" name="role" id="role">
                        <option class="fw-bold" value="guru">Guru</option>
                    </select>
                </div>
                <div class="m-3">
                    <label for="name" class="pb-2 fw-bold fs-5"><i class="bi bi-person"></i> {{ __('Nama Asli') }}</label>
                    <input type="text" class="form-control text-capitalize @error('name') is-invalid @enderror" placeholder="Nama Asli" name="name" value="{{ old('name') }}">
                 @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>Isi Form Name</strong>
                    </span>
                @enderror
                </div>
                <div class="m-3" hidden>
                    <label for="no_induk" class="pb-2 fw-bold fs-5"><i class="bi bi-card-text"></i> {{ __('NIK') }}</label>
                    <input type="text" class="form-control" placeholder="Nomer Induk Guru" name="no_induk" value="null">
                </div>
                <div class="m-3">
                    <label for="nisn" class="pb-2 fw-bold fs-5"><i class="bi bi-card-text"></i> {{ __('NISN') }}</label>
                    <input type="text" class="form-control @error('nisn') is-invalid @enderror" placeholder="NISN" name="nisn" value="{{ old('nisn') }}">
                    @error('nisn')
                    <span class="invalid-feedback" role="alert">
                        <strong>Isi Form Nisn</strong>
                    </span>
                @enderror
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
                        @if(Auth::user()->role == 'admin' &&  Auth::user()->sekolah->name_sekolah)
                            <option class="fw-bold" value="{{ Auth::user()->sekolah->id }}">{{ Auth::user()->sekolah->name_sekolah }}</option>
                        @endif
                    </select>
                </div>

                <hr>
                <h4 class="fw-bold ml-3">Account Login Guru</h4>
                <p class="form-text m-3 text-danger text-capitalize fst-italic">* Wajib diisi untuk account login guru !</p>
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
        <div class="modal-footer ">
            <button type="submit" class="btn btn-primary fs-5 shadow"><i class="bi bi-check-circle"></i> SIMPAN</button>
            <button type="reset" class="btn btn-warning fs-5 fst-italic fw-bold shadow"><i class="bi bi-info-circle-fill"></i> Reset</button>
        </div>
        </form>
    </div>
    </div>
</div>
