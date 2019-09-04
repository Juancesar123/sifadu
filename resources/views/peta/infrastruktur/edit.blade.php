<div class="modal fade" id="editMarkerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle" style="display: inline;">Edit Titik</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editForm" class="" action="#" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        {{ method_field('put') }}

        <input type="hidden" name="id" id="editId">
        <div class="modal-body">
          <div class="form-group">
              <label for="">Nama</label>
              <input type="text" class="form-control" id="editName" name="name" placeholder="" required>
          </div>
          <input type="hidden" class="form-control" id="editFit" value="Data Infrastruktur" name="fitur" placeholder="">
          {{-- <div class="form-group">
              <label for="">Fitur</label>
              <input type="text" class="form-control" id="editFitur" value="Data Infrastruktur" name="fitur" placeholder="" required>
          </div> --}}
          <div class="form-group">
              <label for="">Kategori</label>
              <select class="form-control" name="category" id="editCat" required>
                {{-- <option value="" selected disabled> --- </option> --}}
                <option value="Jalan">Jalan</option>
                <option value="Irigasi">Irigasi</option>
              </select>
          </div>
          <div class="form-group">
              <label for="">Garis Koordinat</label>
              <input class="form-control" id="editLine" name="line" placeholder="" required readonly>
          </div>
          <button id="editSelectPoint" class="btn btn-primary">Select from map</button>
          <div class="form-group">
            <label for="">Keterangan</label>
            <textarea type="text" class="form-control" id="editDesc" name="description" rows="10"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" id="editSave" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>