<!-- Create Category Ujian -->
<div class="modal fade" id="createCategoriesUjian" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title btn btn-primary" id="staticBackdropLabel">
                <i class="bi bi-folder-plus fa-1x"></i>
               Create Category Ujian
              </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/categories-ujian/store" method="post">
                @csrf

            <div class="m-3">
                <label for="name_category_ujian" class="pb-2 fw-bold"><i class="bi bi-bookmarks-fill"></i> {{ __('Category Ujian') }}</label>
                <input type="text" class="form-control" placeholder="Name Category Ujian" name="name_category_ujian" value="{{ old('name_category_ujian') }}" required>
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