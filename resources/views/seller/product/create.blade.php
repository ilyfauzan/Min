@extends('admin.layouts.app', ['breadcrumbs' => 'Penjual', 'sub_breadcrumbs' => 'Daftar Produk'])
@section('style')
    <link href="{{ asset('velzon/assets/') }}/libs/dropzone/dropzone.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Detail Produk</h5>
                    </div>
                    <div class="card-body">

                        @include('seller.product._form')

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                @include('seller.product._form_photo')
            </div>
        </div>
    </form>
@endsection
@section('script')
    <!-- dropzone js -->
    <script src="{{ asset('velzon/assets/') }}/libs/dropzone/dropzone-min.js"></script>

    <script src="{{ asset('velzon/assets/') }}/js/pages/ecommerce-product-create.init.js"></script>
    <script>
        $("#add-foto").click(function() {
            newRowAdd =
                `<div   id="row" class="row mb-4">
                        <div class="input-group">
                            <input accept="image/*" class="form-control" name="gambar[]" type="file"
                               >
                            <button class="btn btn-danger" type="button" id="DeleteRow"><i
                                    class=" ri-delete-bin-3-line"></i></button>
                        </div>
                    </div>`;

            $('#newinput').append(newRowAdd);
        });
        $("body").on("click", "#DeleteRow", function() {
            $(this).parents("#row").remove();
        })
    </script>
@endsection
