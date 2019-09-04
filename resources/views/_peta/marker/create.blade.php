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
          <div class="form-group">
              <label for="">Kategori</label>
              <select class="form-control" name="category" id="createCat" required>
                  <option value="" selected disabled > --- </option>
                  <option coloricon="red" value="Kesehatan">Kesehatan</option>
                  <option coloricon="blue" value="Pendidikan">Pendidikan</option>
                  <option coloricon="green" value="Tempat Ibadah">Tempat Ibadah</option>
                  <option coloricon="yellow" value="Sarana Umum">Sarana Umum</option>
              </select>
          </div>
          <div class="form-group">
              <label for="">Latitude</label>
              <input class="form-control" id="createLat" name="lat" placeholder="" required>
          </div>
          <div class="form-group">
              <label for="">Longitude</label>
              <input class="form-control" id="createLng" name="lng" placeholder="" required>
          </div>
          <button id="viewSelectPoint" class="btn btn-primary">Select from map</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="createSave" class="btn btn-primary">Create</button>
      </div>
      </form>
    </div>
  </div>
</div>