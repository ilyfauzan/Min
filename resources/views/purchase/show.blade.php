@extends('layouts.app')
@section('title')
    Checkout
@endsection
@section('content')
    <!-- checkout area start -->
    <div class="checkout-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <form action="{{ route('purchase.checkout', $purchase->id) }}" method="post" id="submit-order">
                        @csrf
                        <input type="hidden" value="{{ $purchase->id }}" name="purchase_id">
                        <div class="billing-info-wrap">
                            <h3>Detail</h3>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20px">
                                        <label> Nama</label>
                                        <input type="text" value="{{ auth()->user()->name }}" disabled />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20px">
                                        <label>Alamat jalan</label>
                                        <input id="alamat" class="billing-address"
                                            placeholder="Nomor rumah dan nama jalan" type="text" name="jalan"
                                            required />
                                        <input placeholder="Apartemen, suite, unit dll." type="text"
                                            name="jalan_tambahan" />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20px">
                                        <label>Kota / Kecamatan</label>
                                        <input type="text" name="kecamatan" id="kecamatan" required />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20px">
                                        <label>Kabupaten</label>
                                        <input type="text" name="kabupaten" id="kabupaten" required />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20px">
                                        <label>Kode Pos</label>
                                        <input type="number" name="kode_pos" id="kode_pos" required />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20px">
                                        <label>No Telepon</label>
                                        <input type="text" value="{{ auth()->user()->no_telepon }}" disabled />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20px">
                                        <label>Email </label>
                                        <input type="text" value="{{ auth()->user()->email }}" />
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="checkout-account mb-30px">
                            <input class="checkout-toggle2 w-auto h-auto" type="checkbox" />
                            <label>Create an account?</label>
                        </div>
                        <div class="checkout-account-toggle open-toggle2 mb-30">
                            <input placeholder="Email address" type="email" />
                            <input placeholder="Password" type="password" />
                            <button class="btn-hover checkout-btn" type="submit">register</button>
                        </div> --}}
                            <div class="additional-info-wrap">
                                <div class="additional-info">
                                    <label> Note</label>
                                    <textarea placeholder="Catatan tentang pesanan Anda, mis. catatan khusus untuk pengiriman. " name="note"></textarea>
                                </div>
                            </div>
                            {{-- <div class="checkout-account mt-25">
                            <input class="checkout-toggle w-auto h-auto" type="checkbox" />
                            <label>Ship to a different address?</label>
                        </div>
                        <div class="different-address open-toggle mt-30px">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20px">
                                        <label>First Name</label>
                                        <input type="text" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20px">
                                        <label>Last Name</label>
                                        <input type="text" />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20px">
                                        <label>Company Name</label>
                                        <input type="text" />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-select mb-20px">
                                        <label>Country</label>
                                        <select>
                                            <option>Select a country</option>
                                            <option>Azerbaijan</option>
                                            <option>Bahamas</option>
                                            <option>Bahrain</option>
                                            <option>Bangladesh</option>
                                            <option>Barbados</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20px">
                                        <label>Street Address</label>
                                        <input class="billing-address" placeholder="House number and street name"
                                            type="text" />
                                        <input placeholder="Apartment, suite, unit etc." type="text" />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20px">
                                        <label>Town / City</label>
                                        <input type="text" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20px">
                                        <label>State / County</label>
                                        <input type="text" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20px">
                                        <label>Postcode / ZIP</label>
                                        <input type="text" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20px">
                                        <label>Phone</label>
                                        <input type="text" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20px">
                                        <label>Email Address</label>
                                        <input type="text" />
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        </div>
                    </form>
                </div>
                <div class="col-lg-5 mt-md-30px mt-lm-30px ">
                    <div class="your-order-area">
                        <h3>Pesanan Kamu</h3>
                        <div class="your-order-wrap gray-bg-4">
                            <div class="your-order-product-info">
                                <div class="your-order-top">
                                    <ul>
                                        <li>Produk</li>
                                        <li>Total</li>
                                    </ul>
                                </div>
                                <div class="your-order-middle">
                                    <ul>
                                        @foreach ($carts as $cart)
                                            <li>
                                                <span class="order-middle-left">{{ $cart->product->name }} X
                                                    {{ $cart->quantity }}</span>
                                                <span class="order-price">Rp
                                                    {{ number_format($cart->product->price * $cart->quantity, 2) }} </span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="your-order-bottom">
                                    <ul>
                                        <li class="your-order-shipping">Pengiriman</li>
                                        <li>Rp {{ number_format($purchase->type_delivery, 2) }}</li>
                                    </ul>
                                </div>
                                <div class="your-order-total">
                                    <ul>
                                        <li class="order-total">Total</li>
                                        <li>Rp {{ number_format($total, 2) }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="payment-method">
                                <div class="payment-accordion element-mrg">
                                    <div id="faq" class="panel-group">
                                        <div class="panel panel-default single-my-account m-0">
                                            <div class="panel-heading my-account-title">
                                                <h4 class="panel-title"><a data-bs-toggle="collapse" href="#my-account-1"
                                                        class="collapsed" aria-expanded="true">Bayar Ditempat</a>
                                                </h4>
                                            </div>
                                            <div id="my-account-1" class="panel-collapse collapse show"
                                                data-bs-parent="#faq">
                                                <div class="panel-body">
                                                    <p>Bayar saat barang sudah sampai pastikan alamat sudah benar !</p>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="panel panel-default single-my-account m-0">
                                            <div class="panel-heading my-account-title">
                                                <h4 class="panel-title"><a data-bs-toggle="collapse" href="#my-account-2"
                                                        aria-expanded="false" class="collapsed">Check payments</a></h4>
                                            </div>
                                            <div id="my-account-2" class="panel-collapse collapse" data-bs-parent="#faq">

                                                <div class="panel-body">
                                                    <p>Please send a check to Store Name, Store Street, Store Town, Store
                                                        State / County, Store Postcode.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default single-my-account m-0">
                                            <div class="panel-heading my-account-title">
                                                <h4 class="panel-title"><a data-bs-toggle="collapse"
                                                        href="#my-account-3">Cash on delivery</a></h4>
                                            </div>
                                            <div id="my-account-3" class="panel-collapse collapse" data-bs-parent="#faq">

                                                <div class="panel-body">
                                                    <p>Please send a check to Store Name, Store Street, Store Town, Store
                                                        State / County, Store Postcode.</p>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="Place-order mt-25">
                            <a class="btn-hover" onclick="btnCheckout()" href="#">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout area end -->
@endsection
@section('scripts')
    <script src="{{ asset('/js/purchase/show.js') }}"></script>
@endsection
