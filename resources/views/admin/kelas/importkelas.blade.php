<!-- Import Category -->
<div class="modal fade" id="importKelas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title btn btn-success" id="staticBackdropLabel"><i class="bi bi-file-earmark-spreadsheet-fill"></i> Import Categori Excel</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ url('importKelas') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row m-2">  
                    <input type="file" name="file" class="form-control" required>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-box-arrow-in-left"></i> Close</button>
          <button class="btn btn-success"><i class="bi bi-check-circle-fill"></i> Submit</button>
        </div>
    </form>
      </div>
    </div>
  </div>