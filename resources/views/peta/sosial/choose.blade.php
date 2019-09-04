<div class="modal fade" id="chooseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle" style="display: inline;">Pilih Kategori</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="chooseForm" class="" action="" method="" enctype="multipart/form-data">
        <input type="hidden" name="id" id="createId">
        <div class="modal-body">
          <div class="form-group">
              <select class="form-control" name="category" id="selectedCat" required>
                  <option value="" selected disabled > --- </option>
                  <option value="Rutilahu">Rutilahu</option>
                  <option value="Penyakit Menular">Penyakit Menular</option>
                  <option value="Angka Putus Sekolah">Angka Putus Sekolah</option>
                  <option value="Bencana Alam">Bencana Alam</option>
              </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button id="chooseCat" class="btn btn-primary">Create</button>
      </div>
      </form>
    </div>
  </div>
</div>