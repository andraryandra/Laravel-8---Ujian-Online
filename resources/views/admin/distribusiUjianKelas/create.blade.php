<!-- Create Category Ujian -->
<div class="modal fade" id="createdistribusiUjianKelas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title btn btn-primary" id="staticBackdropLabel">
                <i class="bi bi-folder-plus fa-1x"></i>
                Create Distribusi Ujian Kelas
              </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/distribusiUjianKelas/store" method="post">
                @csrf
                <div class="form-group m-3" >
                    <label for="id_sekolah_asal" class="pb-2  fs-5"><i class="bi bi-building"></i> Sekolah</label>
                    <select class="form-select form-select-lg  py-2" name="id_sekolah_asal" id="id_sekolah_asal">
                        @if(Auth::user()->role == 'admin' && Auth::user()->sekolah->name_sekolah)
                            <option class="fw-bold" value="{{ Auth::user()->sekolah->id }}">{{ Auth::user()->sekolah->name_sekolah }}</option>
                        @endif
                    </select>
                </div>

                <div class="form-group m-3">
                    <label for="id_kelas" class="pb-2 fw-bold fs-5"><i class="bi bi-house-door-fill"></i> {{ __("Kelas") }}</label>
                    <select class="form-select py-2" name="id_kelas" id="id_kelas">
                        <option class="text-secondary" readonly="disabled" value="">Pilih Kelas</option>
                        <option value="7">Kelas 7</option>
                        <option value="8">Kelas 8</option>
                        <option value="9">Kelas 9</option>
                    </select>
                </div>

                <div class="form-group m-3">
                    <label for="id_category" class="pb-2 fw-bold fs-5"><i class="fas fa-clipboard-list"></i> {{ __("Category Pelajaran") }}</label>
                    <select class="form-select py-2" name="id_category" id="id_category">
                        <option class="text-secondary" readonly="disabled" >Pilih Category Pelajaran</option>
                        @forelse($categori as $id => $categories)
                        <option value="{{ $id }}">{{ $categories }}</option>
                        @empty
                        <option >No Category</option>
                        @endforelse
                    </select>
                </div>

                <div class="form-group m-3">
                    <label for="id_category_ujian" class="pb-2 fw-bold fs-5"><i class="fas fa-clipboard-list"></i> {{ __("Categori Ujian") }}</label>
                    <select class="form-select py-2" name="id_category_ujian" id="id_category_ujian">
                        <option class="text-secondary" readonly="disabled" >Pilih Category Ujian</option>
                        @forelse($categoryUjians as $id => $categoryUjian)
                        <option value="{{ $id }}">{{ $categoryUjian }}</option>
                        @empty
                        <option >No Category Ujian</option>
                        @endforelse
                    </select>
                </div>

                <div class="form-group m-3">
                    <label for="status" class="pb-2 fw-bold fs-5"><i class="bi bi-question-octagon-fill"></i> {{ __("Status") }}</label>
                    <select class="form-select py-2" name="status" id="status">
                        <option class="text-secondary" readonly="disabled" >Pilih Status</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                </div>



        <div class="modal-footer">
            <button type="submit" class="btn btn-primary fs-5 shadow"><i class="bi bi-check-circle"></i> SIMPAN</button>
            <button type="reset" class="btn btn-warning fs-5 shadow fst-italic fw-bold"><i class="bi bi-info-circle-fill"></i> RESET</button>
        </div>
        </form>
    </div>
    </div>
</div>
