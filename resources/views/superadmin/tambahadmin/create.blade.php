<!-- Create Category -->
<div class="modal fade" id="createAdmin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title btn btn-primary" id="staticBackdropLabel">
                <i class="bi bi-folder-plus fa-1x"></i>
               Create Admin Sekolah
              </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/admin/store" method="post">
                @csrf

                <div class="form-group m-3" hidden>
                    <label for="role" class="pb-2 fw-bold"><i class="bi bi-bookmarks-fill"></i> Role</label>
                    <select class="form-control py-2" name="role" id="role">
                        <option class="fw-bold" value="admin">Admin Sekolah</option>
                    </select>
                </div>

                <div class="m-3">
                    <label for="name" class="pb-2 fw-bold fs-5"><i class="bi bi-person"></i> {{ __('Nama Asli') }}</label>
                    <input type="text" class="form-control text-capitalize" placeholder="Nama Asli" name="name" value="{{ old('name') }}" required>
                </div>

                <div class=" m-3" >
                    <label for="sekolah_asal" class="pb-2 fw-bold fs-5"><i class="bi bi-building"></i> Sekolah</label>
                    <select class="form-select form-select-lg text-capitalize py-2" name="sekolah_asal" id="sekolah_asal">
                        @forelse ($sekolahs as $id => $sekolah)
                        <option class="" value="{{ $id }}">{{ $sekolah }}</option>
                        @empty
                        <option class="fw-bold" value="">Tidak Ada Sekolah</option>
                        @endforelse
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
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary fs-5 shadow"><i class="bi bi-check-circle"></i> SIMPAN</button>
            <button type="reset" class="btn btn-warning fs-5 shadow fst-italic fw-bold"><i class="bi bi-info-circle-fill"></i> RESET</button>
        </div>
        </form>
    </div>
    </div>
</div>
