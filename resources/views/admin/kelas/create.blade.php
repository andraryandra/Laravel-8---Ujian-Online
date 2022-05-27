 <!-- Create Category -->
 <div class="modal fade" id="createKelas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title btn btn-primary" id="staticBackdropLabel">
                <i class="bi bi-folder-plus fa-1x"></i>
               {{ __("Create Kelas") }}
              </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/kelas/store" method="post">
                @csrf
                <div class="form-group m-3" >
                    <label for="id_sekolah_asal" class="pb-2  fs-5"><i class="bi bi-building"></i> Sekolah</label>
                    <select class="form-select form-select-lg  py-2" name="id_sekolah_asal" id="id_sekolah_asal">
                        @if(Auth::user()->role == 'admin' && Auth::user()->sekolah->name_sekolah)
                            <option class="fw-bold" value="{{ Auth::user()->sekolah->id }}">{{ Auth::user()->sekolah->name_sekolah }}</option>
                        @endif
                    </select>
                </div>
                <div class="form-group m-3 ">
                    <label for="id_wali" class="fw-bold "><i class="bi bi-bookmarks-fill"></i> Wali Kelas</label><br>
                    <select class="form-select form-select-lg text-capitalize" data-style="btn-success" name="id_wali" id="id_wali">
                        <option disabled value="">Pilih Wali Kelas</option>
                        @forelse($guruAdmin as $id => $guruAdmins)
                            <option class="text-capitalize" value="{{ $id }}">{{ $guruAdmins }}</option>
                            @empty
                                <option value="">No Wali Kelas</option>
                            @endempty
                    </select>
                </div>

            <div class="m-3">
                <label for="name_kelas" class="pb-2 fw-bold"><i class="bi bi-bookmarks-fill"></i> {{ __('Kelas') }}</label>
                <input type="text" class="form-control" placeholder="Name Kelas" name="name_kelas" value="{{ old('name_kelas') }}" required>
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
