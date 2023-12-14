@extends('admin.layouts.app')
@section('content')
    <!-- Info Produk -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title"> {{ @$produk ? 'Edit' : 'Tambah' }} Produk</h3>
        </div>
        <div class="block-content">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <form method="POST" action="{{ @$produk ? route('produk.update', $produk->id) : route('produk.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @if (@$produk)
                            @method('PUT')
                        @endif
                        <div class="mb-4">
                            <label class="form-label" for="one-ecom-product-name">Nama Produk</label>
                            <input type="text" class="form-control" id="one-ecom-product-name" name="name" required
                                value="{{ @$produk->name }}">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="one-ecom-product-description-short">Deskripsi</label>
                            <textarea class="form-control" id="one-ecom-product-description-short" name="description" rows="4">{{ @$produk->description }}</textarea>
                        </div>
                        <div class="mb-4">
                            <!-- Select2 (.js-select2 class is initialized in Helpers.jqSelect2()) -->
                            <!-- For more info and examples you can check out https://github.com/select2/select2 -->
                            <label class="form-label" for="one-ecom-product-category">Kategori</label>
                            <select class="js-select2 form-select" id="one-ecom-product-category" name="category_id"
                                style="width: 100%;" data-placeholder="Pilih Satu..">
                                <option></option>
                                @foreach ($categories as $category)
                                    <option @if (@$produk->category_id == $category->id) selected @endif value="{{ $category->id }}">
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label" for="one-ecom-product-price">Harga Produk</label>
                                <input type="text" class="form-control rupiah" id="one-ecom-product-price" name="price"
                                    value="{{ @$produk->price ?? '' }}" required>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label" for="one-ecom-product-stock">Stok</label>
                                <input type="text" class="form-control" id="one-ecom-product-stock" name="stok"
                                    required value="{{ @$produk->stok ?? 0 }}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="one-profile-edit-avatar" class="form-label">Pilih Foto Thumbnail</label>
                                <input accept="image/*" class="form-control" name="foto" type="file"
                                    id="one-profile-edit-avatar">
                            </div>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-alt-primary">
                                @if (@$produk)
                                    Update
                                @else
                                    Create
                                @endif
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END Info -->

    <!-- Media -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Foto</h3>
            <button class="btn btn-success btn-sm" type="button" @if (@$produk) @else disabled @endif
                onclick="openModal()">Tambah Foto</button>
        </div>
        <div class="block-content block-content-full">
            <div class="row">
                @if (@$produk)
                    @foreach ($photos as $photo)
                        <div class="col-lg-4">
                            <a class="block block-rounded block-link-pop overflow-hidden">
                                <img class="img-fluid"
                                    src="{{ asset('/images/product/' . $produk->name . '/' . $photo->foto) }}"
                                    alt="Foto">
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- END Media -->

    <!-- Pop Out Block Modal -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal-block-popout"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-popout" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-transparent mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Tambah Foto</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <form method="POST"
                        action="{{ @$produk ? route('produk.update', @$produk->id) : route('produk.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @if (@$produk)
                            @method('PUT')
                        @endif
                        <div class="block-content fs-sm">
                            <div class="row mb-2">
                                <div class="col-sm-2">Foto 1</div>
                                <div class="col-sm-8"> <input accept="image/*" class="form-control form-control-sm"
                                        name="foto[]" type="file" id="one-profile-edit-avatar"></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-2">Foto 2</div>
                                <div class="col-sm-8"> <input accept="image/*" class="form-control form-control-sm"
                                        name="foto[]" type="file" id="one-profile-edit-avatar"></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-2">Foto 3</div>
                                <div class="col-sm-8"> <input accept="image/*" class="form-control form-control-sm"
                                        name="foto[]" type="file" id="one-profile-edit-avatar"></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-2">Foto 4</div>
                                <div class="col-sm-8"> <input accept="image/*" class="form-control form-control-sm"
                                        name="foto[]" type="file" id="one-profile-edit-avatar"></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-2">Foto 5</div>
                                <div class="col-sm-8"> <input accept="image/*" class="form-control form-control-sm"
                                        name="foto[]" type="file" id="one-profile-edit-avatar"></div>
                            </div>
                        </div>
                        <div class="block-content block-content-full text-end bg-body">
                            <button type="button" class="btn btn-sm btn-alt-secondary me-1"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END Pop Out Block Modal -->

    <script>
        function openModal() {
            $('#modal').modal('show');
        }
    </script>
@endsection
