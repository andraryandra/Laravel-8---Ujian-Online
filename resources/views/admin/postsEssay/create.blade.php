<!-- Create Post -->
<div class="modal fade" id="createPostEssay" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title btn btn-primary" id="staticBackdropLabel">
                    <i class="bi bi-folder-plus fa-1x"></i>
                    Create Post Essay
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/post-essay/store" method="post">
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
                        <select class="form-select form-select-lg " data-style="btn-success" name="id_category" id="id_category">
                            @forelse($categori as $id => $categories)
                                <option value="{{ $id}}">{{ $categories}}</option>
                                @empty
                                    <option value="">No Category</option>
                                @endempty
                        </select>
                    </div>
                <div class="m-3">
                    <label for="soal_ujian_essay" class="pb-2 fw-bold"><i class="bi bi-book-fill "></i> Create Soal Essay Ujian</label>
                    <textarea name="soal_ujian_essay" id="my-editor" cols="5" rows="5" placeholder="Isi Text Soal Essay Ujian..." class="form-control" required >{{ old('soal_ujian_essay') }}</textarea>
                </div><br>

                <div class="m-3">
                    <label for="jawaban_essay" class="fw-bold badge bg-success p-2" style="font-size: 16px;"><i class="bi bi-journal-check"></i> Jawaban Benar Guru</label>
                    <textarea name="jawaban_essay" id="jawaban_essay" cols="5" rows="5" placeholder="Isi Jawaban Guru..." class="form-control" required >{{ old('jawaban_essay') }}</textarea>
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



