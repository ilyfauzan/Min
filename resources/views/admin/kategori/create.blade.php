@extends('admin.layouts.app')
@section('content')
    <!-- Create Category -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title"> {{ @$category ? 'Edit' : 'Tambah' }} Kategori</h3>
        </div>
        <div class="block-content">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <form method="POST"
                        action="{{ @$category ? route('category.update', $category->id) : route('category.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @if (@$category)
                            @method('PUT')
                        @endif
                        <div class="mb-4">
                            <label class="form-label" for="one-ecom-product-name">Nama Kategori</label>
                            <input type="text" class="form-control" id="one-ecom-product-name" name="name" required
                                value="{{ @$category->name }}">
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-alt-primary">
                                @if (@$category)
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
    <!-- END Create Category -->
@endsection
