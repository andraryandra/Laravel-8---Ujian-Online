<!-- Create Post -->
<div class="modal fade" id="createPost" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title btn btn-primary" id="staticBackdropLabel">
                    <i class="bi bi-folder-plus fa-1x"></i>
                    Create Post
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/posts/store" method="post">
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
                        <label for="id_category" class="fw-bold "><i class="bi bi-bookmarks-fill"></i> Category</label><br>
                        <select class="form-control " data-style="btn-success" name="id_category" id="id_category">
                            @forelse($categori as $id => $categories)
                                <option value="{{ $id}}">{{ $categories}}</option>
                                @empty
                                    <option value="">No Category</option>
                                @endempty
                        </select>
                    </div>
                <div class="m-3">
                    <label for="soal_ujian" class="pb-2 fw-bold"><i class="bi bi-book-fill "></i> Create Soal Ujian</label>
                    <textarea name="soal_ujian" id="my-editor" cols="5" rows="5" class="form-control" required >{{ old('soal_ujian') }}</textarea>
                </div>
                <div class="m-3">
                    <label for="pilihan_a" class="pb-2 fw-bold"><i class="bi bi-arrow-right-square-fill"></i> {{ __('Pilihan A') }}</label>
                    <textarea class="form-control" name="pilihan_a" placeholder="Pilihan_A" required >{{ old('pilihan_a') }}</textarea>
                </div>
                <div class="m-3">
                    <label for="pilihan_b" class="pb-2 fw-bold"><i class="bi bi-arrow-right-square-fill"></i> {{ __('Pilihan B') }}</label>
                    <textarea class="form-control" name="pilihan_b" placeholder="Pilihan_B" required >{{ old('pilihan_b') }}</textarea>
                </div>
                <div class="m-3">
                    <label for="pilihan_c" class="pb-2 fw-bold"><i class="bi bi-arrow-right-square-fill"></i> {{ __('Pilihan C') }}</label>
                    <textarea class="form-control" name="pilihan_c" placeholder="Pilihan_C" required >{{ old('pilihan_c') }}</textarea>
                </div>
                <div class="m-3">
                    <label for="pilihan_d" class="pb-2 fw-bold"><i class="bi bi-arrow-right-square-fill"></i> {{ __('Pilihan D') }}</label>
                    <textarea class="form-control" name="pilihan_d" placeholder="Pilihan_D" required >{{ old('pilihan_d') }}</textarea>
                </div>
                {{-- <div class="m-3">
                    <label for="jawaban" class="mb-2 btn btn-success fw-bold"><i class="bi bi-bookmark-check-fill"></i> {{ __('Jawaban Benar') }}</label>
                    <input type="text" class="form-control" placeholder="Jawaban" name="jawaban" value="{{ old('jawaban') }}" required>
                </div>  --}}
                <div class="form-group m-3 ">
                    <label for="jawaban" class="fw-bold "><i class="bi bi-bookmark-check-fill"></i> Jawaban Benar</label><br>
                    <select class="form-select" name="jawaban" id="jawaban">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                </div>
            </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary fs-5 shadow "><i class="bi bi-check-circle"></i> SIMPAN</button>
                    <button type="reset" class="btn btn-warning fs-5 shadow fw-bold fst-italic"><i class="bi bi-info-circle-fill"></i> RESET</button>
                </div>
            </form>
        </div>
    </div>
</div>

