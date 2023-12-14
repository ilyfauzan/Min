    {{-- <div class="mb-4">
        <label class="form-label" for="one-ecom-product-name">Label Banner</label>
        <input type="text" class="form-control" id="one-ecom-product-name" name="label" required
            value="{{ @$banner->label }}">
    </div> --}}
    <div class="mb-4">
        <label class="form-label" for="one-ecom-product-name">Judul Banner</label>
        <input type="text" class="form-control" id="one-ecom-product-name" name="title" required
            value="{{ @$banner->title }}">
    </div>
    {{-- <div class="mb-4">
        <label class="form-label" for="one-ecom-product-name">URL</label>
        <input value="{{ @$banner->url }}" type="url" class="form-control" name="url" id="url"
            placeholder="https://example.com" size="30" required>
    </div> --}}
    <div class="mb-4">
        <label class="form-label" for="one-ecom-product-description-short">Deskripsi</label>
        <textarea class="form-control" id="one-ecom-product-description-short" name="description" rows="4">{{ @$banner->description }}</textarea>
    </div>
    @if (@$banner)
        <div class="row mb-4">
            <div class="col-md-6">
                <label for="one-profile-edit-avatar" class="form-label">Foto</label>
                <img src="{{ asset('images/banner/' . $banner->image) }}" alt="image">
            </div>
        </div>
    @endif
    <div class="row mb-4">
        <div class="col-md-6">
            <label for="one-profile-edit-avatar" class="form-label">Pilih Foto</label>
            <input accept="image/*" class="form-control" name="image" type="file" id="one-profile-edit-avatar">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <button type="submit" class="btn btn-primary">{{ $submit }}</button>
    </div>
