<div class="mb-4">
    <label class="form-label" for="one-ecom-product-name">Nama Kategori</label>
    <input type="text" class="form-control" id="one-ecom-product-name" name="name" required
        value="{{ @$category->name }}">
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <button type="submit" class="btn btn-primary">{{ $submit }}</button>
</div>
