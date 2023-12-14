@extends('layouts.app')
@section('title')
    Daftar Produk
@endsection
@section('content')
    <!-- Cart Area Start -->
    <div class="cart-main-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-shiping-update-wrapper">
                        <h3 class="cart-page-title">Daftar Produk {{ $store->name }}</h3>
                        <div class="cart-clear">
                            <a href="{{ route('produk.create') }}">Tambahkan Produk</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <form action="#">
                        <div class="table-content table-responsive general-datatable cart-table-content">
                            <table id="datatable">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Terjual</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td class="product-name"><a href="#">{{ $product->name }}</a></td>
                                            <td class="product-name"><a href="#">{{ $product->category->name }}</a>
                                            </td>
                                            <td> {{ number_format($product->price, 2) }}</td>
                                            <td> {{ number_format($product->stok) }}</td>
                                            <td class="product-subtotal">$70.00</td>
                                            <td class="product-remove">
                                                <a href="{{ route('produk.edit', $product->id) }}"><i
                                                        class="icon-pencil"></i></a>
                                                <a href="{{ route('produk.destroy', $product->id) }}"><i
                                                        class="icon-close"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Area End -->
@endsection
@section('scripts')
    <script src="{{ asset('/js/cart/index.js') }}"></script>
@endsection
