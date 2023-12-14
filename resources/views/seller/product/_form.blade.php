<div class="mb-4">
    <label class="form-label" for="one-ecom-product-name">Nama Produk</label>
    <input type="text" class="form-control " id="one-ecom-product-name" name="name" required
        value="{{ old('name', @$product->name) }}" placeholder="Masukan Nama ..">
</div>
<div class="mb-4">
    <label class="form-label" for="one-ecom-product-description-short">Deskripsi</label>
    <textarea class="form-control " placeholder="Masukan Deskripsi .." name="description" rows="4">{{ old('description', @$product->description) }}</textarea>
</div>
<div class="mb-4">
    <label class="form-label" for="one-ecom-product-category">Kategori</label>
    <select required class="js-example-basic-single" id="one-ecom-product-category" name="category_id"
        style="width: 100%;" data-placeholder="Pilih Kategori..">
        <option></option>
        @foreach ($categories as $category)
            <option @if (@$product->category_id == $category->id) selected @elseif (old('category_id') == $category->id) selected @endif
                value="{{ $category->id }}">
                {{ $category->name }}</option>
        @endforeach
    </select>
</div>
<div class="mb-4">
    <label class="form-label" for="one-ecom-product-name">Jenis</label>
    <input type="text" class="form-control " name="jenis" required value="{{ old('jenis', @$product->jenis) }}"
        placeholder="Masukan Jenis ..">
</div>
<div class="row mb-4">
    <div class="col-md-6">
        <label class="form-label" for="one-ecom-product-price">Harga Produk</label>
        <div class="input-group has-validation mb-3">
            <span class="input-group-text" id="product-price-addon">Rp</span>
            <input type="text" class="form-control  money text-end" placeholder="0,00" id="price" name="price"
                value="{{ old('price', @$product->price) }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <label class="form-label" for="one-ecom-product-stock">Stok</label>
        <input type="number" class="form-control " placeholder="0" id="one-ecom-product-stock" name="stok" required
            value="{{ old('stok', @$product->stok) }}">
    </div>
</div>
<div class="mb-4">
    <button type="submit" class="btn btn-primary">
        @if (@$product)
            Update
        @else
            Tambah
        @endif
    </button>
</div>
