  <div class="form mb-4">
      <label class="form-label" for="one-profile-edit-username">Nama Toko</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="one-profile-edit-username"
          name="name" placeholder="Masukan Nama Toko.." value="{{ old('name', @$store->name) }}">
      @error('name')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>
  <div class="form mb-4">
      <label class="form-label" for="one-profile-edit-name">Deskripsi Toko</label>
      <textarea class="form-control  @error('description') is-invalid @enderror" name="description"
          placeholder="Deskripsi Toko" required>{{ old('name', @$store->description) }}</textarea>
      @error('description')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>
  <div class="form mb-4">
      <label class="form-label" for="one-profile-edit-email">Alamat Toko</label>
      <textarea class="form-control  @error('address') is-invalid @enderror" name="address" placeholder="Alamat Toko"
          required>{{ old('name', @$store->address) }}</textarea>
      @error('address')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>
  <div class="form mb-4">
      <label class="form-label">Logo</label>
      <div class="form mb-4">
          @if (@$store->logo != null)
              <img class="mb-2" width="300" height="400" src="{{ asset('images/store/' . @$store->logo) }}"
                  alt="logo" />
              <br>
          @else
              <img class="img-avatar" src="{{ asset('admin') }}/assets/media/avatars/avatar13.jpg" alt="">
          @endif
      </div>
      <div class="form mb-4">
          <label for="one-profile-edit-avatar" class="form-label">Pilih Logo Baru</label>
          <input class="form-control  @error('logo') is-invalid @enderror" name="logo" accept="image/*"
              type="file" id="one-profile-edit-avatar">
          @error('logo')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
  </div>
  <div class="form mb-4">
      <button type="submit" class="btn btn-primary">
          @if (@$store)
              Buat Toko
          @else
              Create
          @endif
      </button>
  </div>
