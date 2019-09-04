<div class="modal fade" id="createMarkerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle" style="display: inline;">Buat Titik Baru</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="createForm" class="" action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="id" id="createId">
        <div class="modal-body">
          <div class="form-group">
              <label for="">Nama</label>
              <input type="text" class="form-control" id="createName" name="name" placeholder="" required>
          </div>
          <input type="hidden" class="form-control" id="createFitur" value="Data Infrastruktur" name="fitur" placeholder="">
          {{-- <input type="hidden" class="form-control" id="createCat" value="Data Infrastruktur" name="category" placeholder=""> --}}
          <div class="form-group">
            <label for="">Kategori</label>
            <select class="form-control" name="category" id="createCat" required>
              <option value="" selected disabled> --- </option>
              <option value="Jalan">Jalan</option>
              <option value="Irigasi">Irigasi</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Garis Koordinat</label>
            <input class="form-control" id="createLine" name="line" required>
          </div>
          <button id="viewSelectPoint" class="btn btn-primary">Select from map</button>
          <div class="form-group">
            <label for="">Keterangan</label>
            <textarea type="text" class="form-control" id="createDesc" name="description" rows="10"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="createSave" class="btn btn-primary">Create</button>
      </div>
      </form>
    </div>
  </div>
</div>