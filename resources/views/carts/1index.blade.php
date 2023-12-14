@extends('layouts.app')
@section('title')
    Keranjang
@endsection
@section('content')
    <!-- Cart Area Start -->
    <div class="cart-main-area pt-100px pb-100px">
        <div class="container">
            <h3 class="cart-page-title">Item keranjang Anda</h3>
            <div class="row">
                @if ($carts->count() == 0)
                    <div class="empty-text-contant text-center">
                        <i class="icon-handbag"></i>
                        <h1>Tidak ada item lagi di keranjang Anda</h1>
                        <a class="empty-cart-btn" href="{{ route('produk.index') }}">
                            <i class="ion-ios-arrow-left"> </i> Lanjutkan Belanja
                        </a>
                    </div>
                @else
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <form action="{{ route('cart.updatecart') }}" method="post" id="update-cart">
                            @csrf
                            <div class="table-content table-responsive cart-table-content">
                                <table id="datatable">
                                    <thead>
                                        <tr>
                                            <th>Gambar</th>
                                            <th>Nama Produk</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Subtotal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($carts as $cart)
                                            <input style="display: none" type="text" name="product_id[]"
                                                value="{{ $cart->product_id }}">
                                            <tr>
                                                <td class="product-thumbnail">
                                                    {{-- <a href="#"><img class="img-responsive ml-15px"
                                                            src="{{ asset('storage/product/images/' . $cart->product->thumbnail->foto) }}"
                                                            alt="" /></a> --}}
                                                </td>
                                                <td class="product-name"><a href="#">{{ $cart->product->name }}</a>
                                                </td>
                                                <td class="product-price-cart"><span class="amount">Rp
                                                        {{ number_format($cart->product->price, 2) }}</span></td>
                                                <td class="product-quantity">
                                                    <div class="cart-plus-minus">
                                                        <input class="cart-plus-minus-box" type="text" name="quantity[]"
                                                            value="{{ $cart->quantity }}" />
                                                    </div>
                                                </td>
                                                <td class="product-subtotal">Rp
                                                    {{ number_format($cart->product->price * $cart->quantity, 2) }}</td>
                                                <td class="product-remove">
                                                    {{-- <a href="#"><i class="icon-pencil"></i></a> --}}
                                                    <a onclick="destroy({{ $cart->id }})"><i class="icon-close"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </form>
                        <form method="post" id="destroy">
                            @csrf
                        </form>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-shiping-update">
                                        <a href="{{ route('produk.index') }}">Lanjutkan Belanja</a>
                                    </div>
                                    <div class="cart-clear">
                                        <button type="button" onclick="updateCart()">Perbarui Keranjang Belanja</button>
                                        <a style="color: white" onclick="btnDestroyall()">Kosongkan
                                            Keranjang
                                            Belanja</a>
                                    </div>
                                    <form action="{{ route('cart.destroyall') }}" method="get" id="destroyall">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 mb-lm-30px">
                            </div>
                            <div class="col-lg-4 col-md-6 mb-lm-30px">
                            </div>
                            <div class="col-lg-4 col-md-12 mt-md-30px">
                                <div class="grand-totall">
                                    <div class="title-wrap">
                                        <h4 class="cart-bottom-title section-bg-gary-cart">Keranjang Total</h4>
                                    </div>
                                    <input type="hidden" id="total" value="{{ $carts->sum('total') }}">
                                    <form action="{{ route('purchase.store') }}" method="post" id="form-checkout"
                                        target="_blank">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <h5>Total products <span>Rp {{ number_format($carts->sum('total'), 2) }}</span>
                                        </h5>
                                        <div class="total-shipping">
                                            <h5>Pengiriman</h5>
                                            <ul>
                                                <li><input checked type="radio" name="type_pengiriman" value="20000" />
                                                    Standard
                                                    <span>Rp
                                                        {{ number_format(20000, 2) }}</span>
                                                </li>
                                                <li><input type="radio" name="type_pengiriman" value="40000" />
                                                    Express
                                                    <span>Rp
                                                        {{ number_format(40000, 2) }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <h4 class="grand-totall-title" id="grand_total">Total <span>Rp </span></h4>
                                        <a style="color: white"
                                            onclick="document.getElementById('form-checkout').submit();">Checkout</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Cart Area End -->
@endsection
@section('scripts')
    <script src="{{ asset('/js/cart/index.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
@endsection
