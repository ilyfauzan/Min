  <div class="card">
      <div class="card-header">
          <h5 class="card-title mb-0">Foto Produk</h5>
      </div>
      <div class="card-body">
          @if (@$photos)
              <table class="table table-bordered">
                  <thead>
                      <tr>
                          <th class="text-center">Gambar</th>
                          <th class="text-center">Foto Utama</th>
                          <th class="text-center">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($photos as $photo)
                          <tr>
                              <td> <img width="50" src="{{ asset('images/product/' . $photo->foto) }}" alt="">
                              </td>
                              <td class="text-center">
                                  @if ($photo->is_thumbnail)
                                      <i class="text-success bx bx-check-circle"></i>
                                  @else
                                      <i class=" text-danger bx bx-error-circle"></i>
                                  @endif
                              </td>
                              <td class="text-center">
                                  <a type="button" onclick="openModal({{ $photo->id }})">
                                      <i class="text danger bx bx-trash"></i>
                                  </a>

                              </td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
          @endif
          <div class="row mb-4">
              <div class="col-md-12">
                  <label for="one-profile-edit-avatar" class="form-label">Pilih Foto Utama</label>
                  <input accept="image/*" class="form-control  @error('foto') is-invalid @enderror" name="foto"
                      type="file">
                  @error('foto')
                      <span class="invalid-feedback" role="alert">
                          <strong>Tambahkan foto terlebih dahulu !</strong>
                      </span>
                  @enderror
              </div>
          </div>
          <div class="d-flex justify-content-between">
              <h5 class="card-title mb-0">Galeri Produk</h5>
              <button class="btn btn-sm btn-success" type="button" id="add-foto">Tambah Foto</button>
          </div>
          <div class="row mb-4">
              <div class="col-md-12">
                  <label for="one-profile-edit-avatar" class="form-label">Pilih Foto Produk</label>
                  <input accept="image/*" class="form-control" name="gambar[]" type="file">
              </div>
          </div>
          <div id="newinput"></div>
      </div>
  </div>
  <!-- end card -->
